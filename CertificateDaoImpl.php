<?php


class CertificateDaoImpl implements CertificateDao
{

public function addCertificate($img,$b,$ceid)
{
    $con = new Connection();
    $conn = $con->getConnection(); 
    //$prid = $this->getRowCount("property_dev_details", $conn);
    //$cid = $this->getRowCount("certificate", $conn);
    $sql = "INSERT INTO `certificate`( `certificate_id`, `student_id`, `node_id`, `title`, `url`, `created_by`, `created_date`)
        VALUES (".$ceid.",".$img->getStudent_id().",".$img->getNode_id().",'".$img->getTitle()."','".$img->getUrl()."','".$img->getCreated_by()."',now())";
         //echo $sql;
    
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
                    $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/addCertificate.php";
                }
                //echo $url;
                $data = array('block_id' => $b->getBlock_id(),
                    'hash_of_blockid' => $b->getHash_of_blockid(),
                    'id_of_previousblock' => $b->getId_Of_previousblock(),
                    'hash_of_previousblock' => $b->getHash_of_previousblock(),
                    'encrypted_data' => $b->getEncrypted_data(),
                    'hash_of_data' => $b->getHash_of_data(),
                    'related_node' =>$img->getNode_id(),
                    'related_db' => $b->getRelated_db(),
                    'related_id'=>$img->getStudent_id());
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
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
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

public function getCertificate($sid,$conn)
{
    $cer=array();
    $i=0;
    $sql = "SELECT `id`,  `certificate_id`, `student_id`, `title`, `url`, `created_by`, `created_date` FROM `certificate` WHERE `student_id`=".$sid ;
    //         echo $sql;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $img=new Certificate();
            $img->setCertificate_id($row["certificate_id"]);
            $img->setStudent_id($row["student_id"]);
            $img->setTitle($row["title"]);
            $img->setUrl($row["url"]);
            $cer[$i++]=$img;
        }
    }
    return $cer;
}

}