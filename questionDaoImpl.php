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
class questionDaoImpl implements questionDao
{
    /* set the article object and set value */
    //private $bid;
    
    
    public function createquestion($q,$b,$userid,$qid)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        //$qid = $this->getRowCount("question", $conn);
        
        $sql = "INSERT INTO question(`question_id`, `exam_id`,`subject_id`, `node_id`,`question`,`created_date`)
                        VALUES (". $qid .",". $q->getExam_id() .",". $q->getSubject_id() .",". $q->getNode_id() .",'". $q->getQuestion() ."',now())";
        echo $sql;
        echo $userid;
        echo $qid;
        if (mysqli_query ( $conn, $sql )) {
            
        $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
                        VALUES (".$userid."". $qid .",'". $b->getHash_of_blockid() ."',' ',' ','".$b->getEncrypted_data()."','".$b->getHash_of_data()."',' ',' ',' ')";
        
        
        echo $sql;
        
        if (mysqli_query($conn, $sql)) {
            $result = array(
                "status" => "success"
            );
            return $result;
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
    
    public function getquestion()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $ques = array();
        $i = 0;
        
        $query = "SELECT `id`,`question_id`, `exam_id`,`subject_id`, `node_id`,`question`,`created_date` FROM `question`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $q = new question();
                //$ea->setId( $row ['id']);
                $q->setQuestion_id( $row ['question_id']);
                $q->setExam_id( $row ['exam_id']);
                $q->setSubject_id( $row ['subject_id']);
                $q->setNode_id( $row ['node_id']);
                $q->setQuestion( $row ['question']);
               
            }
                
                
                $ques[$i ++] = array(
                    "id" => $row["question_id"],
                    "ques" => $q
                );
               
            }
            return $ques;
            
        }
        
        public function getblock()
        {
            
            $con = new Connection();
            $conn = $con->getConnection();
            $bl = array();
            $i = 0;
            
            $query = "SELECT `id`, `block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id` FROM `block` Where `related_db`='student_reg'";
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
        
        
        public function getblockById($sid)
        {
            
            $con = new Connection();
            $conn = $con->getConnection();
            $bl = array();
            $i = 0;
            
            $query = "SELECT `id`, `block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id` FROM `block` Where `related_db`='certificate' and `related_id`=".$sid;
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
        
        
        
        public function create_question($b)
        {
            $con = new Connection();
            $conn = $con->getConnection();
            
            $sql = "INSERT INTO block(`block_id`, `hash_of_blockid`,`id_of_previousblock`, `hash_of_previousblock`,`encrypted_data`,`hash_of_data`,`related_node`,`related_db`,`related_id`)
                VALUES ('".$b->getBlock_id()."','". $b->getHash_of_blockid()."','".$b->getId_of_previousblock()."','".$b->getHash_of_previousblock()."','".$b->getEncrypted_data()."','".$b->getHash_of_data()."','".$b->getRelated_node()."','".$b->getRelated_db()."','".$b->getRelated_id()."')";
            
            echo $sql;
            
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
    


