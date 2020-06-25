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
class studentDaoImpl implements studenteDao
{
    /* set the article object and set value */
    
    public function create_Student($s,$b,$sid)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        //$sid = $this->getRowCount("student_reg", $conn);
        //  $eid = $this->getRowCount("exam_admin", $conn);
        
        $sql = "INSERT INTO student_reg( `sid`, `sname`, `phone_no`,`email_id`, `dob`, `qualification`,`branch`,`class`,`address`, `created_by`,`created_date`)
                        VALUES (".$sid.",'".$s->getSname()."','".$s->getPhone_no()."','".$s->getEmail_id()."','".$s->getDob()."','". $s->getQualification()."','". $s->getBranch()."','".$s->getClass()."','".$s->getAddress()."','". $s->getCreated_by()."',now())";
        
        //echo $sql;
        
       //  echo $userid;
     //   echo $eid;
//         if (mysqli_query($conn, $sql)) {
            
//             $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
//                         VALUES ('".$b->getBlock_id()."','". $b->getHash_of_blockid() ."',' ',' ','".$b->getEncrypted_data()."',' ".$b->getHash_of_data()."','".$b->getRelated_node()."','".$b->getRelated_db()."','".$sid."')";
         
//             echo $sql;
            
            
            if (mysqli_query($conn, $sql)) {
                $sql1 = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date`FROM add_node";
            $result = mysqli_query($conn, $sql1);
            // echo $sql1;
            if (mysqli_num_rows ( $result ) > 0) {
                while ($row = mysqli_fetch_assoc ( $result )) {
                    
                    
                    //call the web service through ip address..................................................................
                    $result1 = array("status"=>"success");
                    $url="";
                    if($row["node_name"]=='University'){
                        $url = "http://".$row ["node_ip_address"]."/Examblockchainadmin/ws/studentreg.php";
                    }else{
                    $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/studentreg.php";
                    }
                    //echo $url;
                    $data = array('block_id' => $b->getBlock_id(),
                        'hash_of_blockid' => $b->getHash_of_blockid(),
                        'id_of_previousblock' => $b->getId_Of_previousblock(),
                        'hash_of_previousblock' => $b->getHash_of_previousblock(),
                        'encrypted_data' => $b->getEncrypted_data(),
                        'hash_of_data' => $b->getHash_of_data(),
                        'related_node' =>$b->getRelated_node(),
                        'related_db' => $b->getRelated_db(),
                        'related_id'=>$sid);
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
            } 
           else {
                return "Error: " . $sql . "<br>" . mysqli_error ( $conn );
            }
//         } else {
//             return "Error: " . $sql . "<br>" . mysqli_error ( $conn );
//         }
        
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
    
    public function createstudent($b)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        
        $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
                VALUES ('".$b->getBlock_id()."','". $b->getHash_of_blockid()."','".$b->getId_of_previousblock()."','".$b->getHash_of_previousblock()."','".$b->getEncrypted_data()."','".$b->getHash_of_data()."','".$b->getRelated_node()."','".$b->getRelated_db()."','".$b->getRelated_id()."')";
        
        //echo $sql;
        
        if (mysqli_query($conn, $sql)) {
            $result = array(
                "status" => "success"
            );
            return $result;
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error ( $conn );
        }
        mysqli_close ( $conn );
    }
    
    
    
    public function getStudent()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $ques = array();
        $i = 0;
        
        $query = "SELECT `id`, `sid`, `sname`, `phone_no`,`email_id`, `dob`, `qualification`,`branch`,`class`,`address`, `created_by`,`created_date` FROM `student_reg`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $s = new student();
                //$ea->setId( $row ['id']);
                $s->setSid( $row ['sid']);
                $s->setSname( $row ['sname']);
                $s->setPhone_no( $row ['phone_no']);
                $s->setEmail_id( $row ['email_id']);
                $s->setDob( $row ['dob']);
                $s->setQualification( $row ['qualification']);
                $s->setBranch( $row ['branch']);
                $s->setClass( $row ['class']);
                $s->setAddress( $row ['address']);
                
                $ques[$i ++] = array(
                    "id" => $row["sid"],
                    "studentreg" => $s
                );
            }
        }
        return $ques;
    }
    
    
    public function getblockStudentId($sid)
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
//         $bl = array();
//         $i = 0;
        
        $query = "SELECT `id`, `block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id` FROM `block` Where `related_db`='student_reg' and `related_id`=".$sid;
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            if ($row = mysqli_fetch_assoc($result)) {
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
                
                
//                 $bl[$i ++] = array(
//                     "id" => $row["block_id"],
//                     "block" => $blo
//                 );
            }
        }
        return $blo;
    }
    
    
    public function getnodeIP($userid,$sid)
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $get = array();
        $i=0;
        $blo = new Node();
        $b = new block();
        //             $bl = array();
        //             $i = 0;
        
        $query = "SELECT a.node_id,a.node_name,a.node_ip_address,a.status,b.related_node,b.related_db,b.related_id FROM `add_node` as a,`block` as b Where a.node_id=b.related_node and b.related_db='certificate' and b.related_id=".$sid;
        //echo $query;
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                //$ea->setId( $row ['id']);
                $blo->setNode_id( $row ['node_id']);
                $blo->setNode_name( $row ['node_name']);
                $blo->setNode_ip_address( $row ['node_ip_address']);
                $blo->setStatus( $row ['status']);
                
                $b->setRelated_node($row['related_node']);
                $b->setRelated_db($row['related_db']);
                $b->setRelated_id($row['related_id']);
                $blo->setBlock($b);
                
                
                $get[$i ++] = array(
                    "id" => $row["node_id"],
                    "node" => $blo
                );
            }
        }
        return $blo;
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
            }
        }
        return $bl;
    }
    
    public function addCertificate($b)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        
        $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
                VALUES ('".$b->getBlock_id()."','". $b->getHash_of_blockid()."','".$b->getId_of_previousblock()."','".$b->getHash_of_previousblock()."','".$b->getEncrypted_data()."','".$b->getHash_of_data()."','".$b->getRelated_node()."','".$b->getRelated_db()."','".$b->getRelated_id()."')";
        
        //echo $sql;
        
        if (mysqli_query($conn, $sql)) {
            $result = array(
                "status" => "success"
            );
            return $result;
        } else {
            return "Error: " . $sql . "<br>" . mysqli_error ( $conn );
        }
        mysqli_close ( $conn );
    }
}
?>
    


