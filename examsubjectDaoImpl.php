<?php

class examsubjectDaoImpl implements examsubjectDao
{
    /* set the article object and set value */
    
    public function createexamsubject($sb,$b,$userid,$sid)
    {
        $con = new Connection();
        $conn = $con->getConnection();
       // $sid = $this->getRowCount("exam_subject", $conn);
        
        $sql = "INSERT INTO exam_subject( `paper_id`,`exam_id`, `sub_name`, `exam_date`, `created_by`,`created_date`)
                VALUES (". $sid .",". $sb->getExam_id() .",'". $sb->getSub_name() ."','". $sb->getExam_date() ."','".$sb->getCreated_by()."',now())";
        
      //echo $enc;
        
      if (mysqli_query ( $conn, $sql )) {
          
          $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
                  VALUES ('".$b->getBlock_id()."','". $b->getHash_of_blockid() ."','".$b->getId_of_previousblock()."','".$b->getHash_of_previousblock()."','".$b->getEncrypted_data()."','".$b->getHash_of_data()."',".$userid.",'".$b->getRelated_db()."',".$sid.")";
          
         // echo $sql;
          
          if (mysqli_query($conn, $sql)) {
              $sql1 = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date`FROM add_node";
              $result = mysqli_query($conn, $sql1);
              // echo $sql1;
              if (mysqli_num_rows ( $result ) > 0) {
                  while ($row = mysqli_fetch_assoc ( $result )) {
                     
                      
                      //call the web service through ip address..................................................................
                      $result1 = array("status"=>"success");
                      $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/exam_subject.php";
                      //echo $url;
                      $data = array('block_id' => $b->getBlock_id(),
                          'hash_of_blockid' => $b->getHash_of_blockid(),
                          'id_of_previousblock' => $b->getId_of_previousblock(),
                          'hash_of_previousblock' => $b->getHash_of_previousblock(),
                          'encrypted_data' => $b->getEncrypted_data(),
                          'hash_of_data' => $b->getHash_of_data(),
                          'related_node' =>$userid,
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
    
    public function getexamsubject()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $subad = array();
        $i = 0;
        
        $query = "SELECT `id`, `paper_id`,`exam_id`, `sub_name`,`exam_date`,  `created_by`,`created_date` FROM `exam_subject`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sb = new examsubject();
                //$ea->setId( $row ['id']);
                $sb->setPaper_id( $row ['paper_id']);
                $sb->setExam_id( $row ['exam_id']);
                $sb->setSub_name( $row ['sub_name']);
                $sb->setExam_date( $row ['exam_date']);
               
                
                $subad[$i ++] = array(
                    "id" => $row["paper_id"],
                    "examsubject" => $sb
                );
            }
        }
        return $subad;
    }
    
    
}
?>
    


