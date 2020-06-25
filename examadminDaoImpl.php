<?php

class examadminDaoImpl implements examadminDao
{
    /* set the article object and set value */
    
    public function createexamadmin($ea,$b,$userid,$eid)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        
        $sql = "INSERT INTO exam_admin( `exam_id`, `exam_name`, `type`, `created_by`,`created_date`)
                VALUES (". $eid .",'". $ea->getExam_name() ."','". $ea->getType() ."','".$ea->getCreated_by()."',now())";
        
        //echo $sql;

        if (mysqli_query ( $conn, $sql )) {
            
            $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
                        VALUES ('".$b->getBlock_id()."','". $b->getHash_of_blockid() ."','".$b->getId_of_previousblock()."','".$b->getHash_of_previousblock()."','".$b->getEncrypted_data()."','".$b->getHash_of_data()."',".$userid.",'".$b->getRelated_db()."',".$eid.")";
            
           //echo $sql;
            
            if (mysqli_query($conn, $sql)) {
                $sql1 = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date`FROM add_node";
                $result = mysqli_query($conn, $sql1);
                // echo $sql1;
                if (mysqli_num_rows ( $result ) > 0) {
                    while ($row = mysqli_fetch_assoc ( $result )) {
                        
                        //call the web service through ip address..................................................................
                        $result1 = array("status"=>"success");
                        $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/exam_admin.php";
                        //echo $url;
                        $data = array('block_id' => $b->getBlock_id(),
                            'hash_of_blockid' => $b->getHash_of_blockid(),
                            'id_of_previousblock' => $b->getId_of_previousblock(),
                            'hash_of_previousblock' => $b->getHash_of_previousblock(),
                            'encrypted_data' => $b->getEncrypted_data(),
                            'hash_of_data' => $b->getHash_of_data(),
                            'related_node' =>$userid,
                            'related_db' => $b->getRelated_db(),
                            'related_id'=>$eid);
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
            } else {
                return "Error: " . $sql . "<br>" . mysqli_error ( $conn );
            }
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error ( $conn );
        }
        
        mysqli_close ( $conn );
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
    
    public function getexamadmin()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $examad = array();
        $i = 0;
        
        $query = "SELECT `id`, `exam_id`, `exam_name`, `type`, `created_by`,`created_date` FROM `exam_admin`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $ea = new examadmin();
                //$ea->setId( $row ['id']);
                $ea->setExam_id( $row ['exam_id']);
                $ea->setExam_name( $row ['exam_name']);
                $ea->setType( $row ['type']);
                
                $examad[$i ++] = array(
                    "id" => $row["exam_id"],
                    "examadmin" => $ea
                );
            }
        }
        return $examad;
    }
    
    
    
    public function getblock()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $bl = array();
        $i = 0;
        
        $query = "SELECT `id`, `block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id` FROM `block`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $blo = new block();
                //$ea->setId( $row ['id']);
                $blo->setBlock_id( $row ['block_id']);
                $blo->setHash_of_blockid( $row ['hash_of_blockid']);
                $blo->setId_of_previousblock( $row ['id_of_previousblock']);
                $blo->setHash_of_previousblock( $row ['hash_of_previousblock']);
                $blo->setEncrypted_data( $row ['encrypted_data']);
                $blo->setHash_of_data( $row ['hash_of_data']);
                $blo->setRelated_node( $row ['related_node']);
                $blo->setrelated_db( $row ['related_db']);
                $blo->setrelated_id( $row ['related_id']);
                
                
                $bl[$i ++] = array(
                    "id" => $row["block_id"],
                    "block" => $blo
                );
                
//                 echo $bl [0]['block_id'];
//                 echo sizeof($bl);
            }
        }
        return $bl;
    }
    
    
}
?>
    


