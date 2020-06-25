<?php
/*
 * ATOCONN SYSTEM LABS PRIVATE LIMITED
 *
 *
 *
 *
 *
 *
 */
class examsubjectnodeDaoImpl implements examsubjectnodeDao
{
    /* set the article object and set value */
    
    public function createexamsubjectnode($esn)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        
        $sql = "INSERT INTO exam_subject_node( `exam_id`, `sub_id`, `node_id`, `created_by`,`created_date`)
                        VALUES (". $esn->getExam_id() .",". $esn->getSub_id() .",".$esn->getNode_id().",'".$esn->getCreated_by()."',now())";
        
        //echo $sql;
        
        if (mysqli_query($conn, $sql)) {
            $sql1 = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date`FROM add_node";
            $result = mysqli_query($conn, $sql1);
            // echo $sql1;
            if (mysqli_num_rows ( $result ) > 0) {
                while ($row = mysqli_fetch_assoc ( $result ))
                {
                    $n=new Node();
                   $n->setNode_id( $row ["node_id"] );
                    
                   if($esn->getNode_id()==$row ["node_id"]){
                    //call the web service through ip address..................................................................
                    $result1 = array("status"=>"success");
                    $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/examsubjectnode.php";
                    $data = array('exam_id' => $esn->getExam_id(),
                        'sub_id' => $esn->getSub_id(),
                        'node_id' => $esn->getNode_id());
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
    
    /* set the batch object and set value */
    
    public function getexamsubjectnode()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $subnd = array();
        $i = 0;
        
        $query = "SELECT `id`,`exam_id`, `sub_id`, `node_id`, `created_by`,`created_date` FROM `exam_subject_node`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sb = new examsubject();
                //$ea->setId( $row ['id']);
                $esn->setExam_id( $row ['exam_id']);
                $esn->setSub_id( $row ['sub_id']);                
                
                $subnd[$i ++] = array(
                    "id" => $row["node_id"],
                    "subnd" => $esn
                );
            }
        }
        return $subnd;
    }
    
    
}
?>
    


