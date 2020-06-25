<?php
/*
 * ATOCONN SYSTEM LABS PRIVATE LIMITED
 *
 *
 *Developer:- Suraj Mane
 *
 *
 *
 */
class getquestionpaperDaoImpl implements getquestionpaperDao
{
public function getquestionpaper($dp)
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $examad = array();
        $i = 0;
        //echo '$dp->getExam_id()..$dp->getSubject_id()..$dp->getNode_id()';
        $query = "SELECT `encrypted_data` FROM `block` where `block_id` LIKE '%".$dp->getExam_id()."#".$dp->getSubject_id()."#".$dp->getNode_id()."' and `related_db`='question'";
        //echo $query;
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $b = new block();
                //$ea->setId( $row ['id']);
                $b->setEncrypted_data( $row ['encrypted_data']);
//                 $ea->setExam_name( $row ['exam_name']);
//                 $ea->setType( $row ['type']);
                
                $examad[$i ++] = array(
                    "id" => $row["block_id"],
                    "block" => $b
                );
            }
        }
        return $examad;
    }
}
    