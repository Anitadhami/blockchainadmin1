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
class nodesecuritykeyDaoImpl implements nodesecuritykeyDao
{
    /* set the article object and set value */
    
    public function createnodesecuritykey($nsk)
    {
        $con = new Connection();
        $conn = $con->getConnection();
        //$nid = $this->getRowCount("node_security_key", $conn);
        
        $sql = "INSERT INTO node_security_key(`keyid`, `nodeid`, `algorithm`, `key_type`, `key_value`,`type`,`subtype`,`createdby`, `createddate`,`updatedby`,`updateddate`)
                        VALUES (". $nsk->getKeyid() .",". $nsk->getNodeid() .",'". $nsk->getAlgorithm() ."','". $nsk->getKey_type() ."','". $nsk->getKey_value() ."','".$nsk->getType()."','".$nsk->getSubtype()."','". $nsk->getCreatedby()."',now(),'". $nsk->getUpdatedby()."',now())";
        
         echo $sql;
        
        if (mysqli_query($conn, $sql)) {
            $result = array(
                "status" => "success"
            );
            return $result;
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
    
    public function getNodesecuritykey()
    {
        
        $con = new Connection();
        $conn = $con->getConnection();
        $nodeskey = array();
        $i = 0;
        
        $query = "SELECT `id`,`keyid`, `nodeid`, `algorithm`, `key_type`, `key_value`,'type','subtype',`createdby`, `createddate`,'updatedby','updateddate' FROM `node__security_key`";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $nsk = new Nodesecuritykey();
            $nsk->setKeyid( $row ['keyid']);
            $nsk->setNodeid( $row ['nodeid']);
            $nsk->setAlgorithm( $row ['algorithm']);
            $nsk->setKey__type( $row ['key_type']);
            $nsk->setKey_value( $row ['key_value']);
            $nsk->setType( $row ['type']);
            $nsk->setSubtype( $row ['subtype']);
                
            $nodeskey[$i ++] = array(
                    "keyid" => $row["keyid"],
                    "Nodesecuritykey" => $nsk
                );
            }
        }
        return $nodeskey;
    }
    
    
}
?>
    


