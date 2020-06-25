<?php
/*
 * ATOCONN SYSTEM LABS PRIVATE LIMITED
 *
 * Vishwas_09
 *
 *
 *
 *
 */
class distributeDaoImpl implements distributeDao
{
    /* set the article object and set value */
    
    public function createdistribute($dp)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        $did = $this->getRowCount("distribute", $conn);
        //  $eid = $this->getRowCount("exam_admin", $conn);
        
        $sql = "INSERT INTO distribute( `did`, `exam_id`, `subject_id`,`node_id`, `created_by`,`created_date`)
                        VALUES (". $did .",". $dp->getExam_id().",". $dp->getSubject_id().",".$dp->getNode_id().",'". $dp->getCreated_by()."',now())";
        
        //echo $sql;
        
        //  echo $userid;
        // echo $eid;
        if (mysqli_query($conn, $sql)) {
            $sql1 = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date`FROM add_node";
            $result = mysqli_query($conn, $sql1);
            // echo $sql1;
            if (mysqli_num_rows ( $result ) > 0) {
                while ($row = mysqli_fetch_assoc ( $result )) {
                    $n=new Node();
                    $n->setNode_id( $row ["node_id"] );
                    
                  
                        //call the web service through ip address..................................................................
                        $result1 = array("status"=>"success");
                        $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/distributepaper.php";
                        //echo $url;
                        $data = array('exam_id' => $dp->getExam_id(),
                            'subject_id' => $dp->getSubject_id(),
                            'node_id' => $dp->getNode_id());
                        //echo "<br/>".implode(";", $data);
                        // use key 'http' even if you send the request to https://...
                        $options = array(
                            'http' => array(
                                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                                'method' => 'POST',
                                'content' => http_build_query($data)
                            )
                            
                        );
                        $context = stream_context_create($options);
                        $result1 = file_get_contents($url, false, $context);
                        if ($result1 === FALSE) { /* Handle error */ }
                        var_dump($result1);
                    
                    
                }
            }
            return $result1;
        }else {
            $result = array(
                "status" => "fail",
                "message" => "Error: " . $sql . "<br>" . mysqli_error($conn)
            );
            return $result;
        }
        mysqli_close($conn);
    }
    
    public function getRowCount($tablename, $con)
    {
        $id = 0;
        $query = "SELECT count(`id`) as count FROM " . $tablename;
        $result = mysqli_query($con, $query);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            if ($row = mysqli_fetch_assoc($result)) {
                $id = $row["count"];
                $id = $id + 1;
            }
        }
        return $id;
    }
    
    public function getdistribute()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $dist = array();
        $i = 0;
        
        $query = "SELECT `id`, `did`, `exam_id`, `subject_id`,`node_id`, `created_by`,`created_date` FROM `distribute`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $dp = new distribute();
                //$ea->setId( $row ['id']);
                $dp->setDid( $row ['did']);
                $dp->setExam_id( $row ['exam_id']);
                $dp->setSubject_id( $row ['subject_id']);
                $dp->setNode_id( $row ['node_id']);
                
                $dist[$i ++] = array(
                    "id" => $row["did"],
                    "distribute" => $dp
                );
            }
        }
        return $dist;
    }
    
    
}
?>
    


