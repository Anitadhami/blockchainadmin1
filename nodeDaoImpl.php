<?php
/*
 * Developer:- Suraj Mane
 * 
 * Date:- 8-7-2019
 * 
 * 
 */
class nodeDaoImpl implements NodeDao {
	

	
    public function addNode($node,$lo) {
	    $con = new Connection ();
	    $conn = $con->getConnection ();
	    $nid = $this->getRowCount ( "add_node", $conn );
	    
	    // $result = $this->createPerson($stud, $conn);
	    
	    $sql = "INSERT INTO add_node (node_id, node_name, node_ip_address, status,created_by,created_date)
VALUES (" . $nid . ",'" . $node->getNode_name() . "','".$node->getNode_ip_address()."','" . $node->getStatus () . " ','" . $node->getCreated_by () . " ',now())";
	    //echo  $sql;
	    $ip = $node->getNode_ip_address();
	    //echo "hello";
	    //echo $print;
	    
	    
	    if (mysqli_query ( $conn, $sql )) {
	        //  $parts = explode('/', $apt->getDate ());
	        // $date  = "$parts[2]-$parts[1]-$parts[0]";
	        //$lid=$this->getRowCount("login", $conn);
	        $sql = "INSERT INTO login (userid,email,password,ipaddr,pass_hash,createdBy,createdDate,updatedBy,updatedDate)
            VALUES (".$nid.",' ','".$lo->getPassword()."','".$ip."',' ','".$lo->getCreatedBy()."',now(),'".$lo->getUpdatedBy()."',now())";
	         //echo  $sql;
	        if (mysqli_query ( $conn, $sql )) {
	            //
	            $sql1 = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date`FROM add_node";
	            $result = mysqli_query($conn, $sql1);
	           // echo $sql1;
	            $localIp = gethostbyname(gethostname());
	            echo $localIp;
	            
	            if (mysqli_num_rows ( $result ) > 0) {
	                while ($row = mysqli_fetch_assoc ( $result )) {	  
	                    $n=new Node();
	                    $n->setNode_id( $row ["node_id"] );
	                    $n->setNode_name( $row ["node_name"] );
	                    $n->setNode_ip_address($row ["node_ip_address"] );
	                    $n->setStatus( $row ["status"] );
	   //call the web service through ip address..................................................................               
	                    $result1 = array("status"=>"success");
	                    $url = "http://".$row ["node_ip_address"]."/blockchain_client/ws/add_node.php";
	                    echo $url;
	                    $data = array('node_id' => $nid,
	                        'node_name' => $node->getNode_name(),
	                        'node_ip_address' =>$node->getNode_ip_address (),
	                        'status' => $node->getStatus (),
	                        'userid'=>$nid,
	                        'password'=>$lo->getPassword(),
	                        'ipaddr'=>$node->getNode_ip_address ());
	                    echo "<br/>".implode(";", $data);
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
	
	public function getRowCount($tablename, $con) {
		$id = 0;
		$query = "SELECT count(`node_id`) as count FROM " . $tablename;
		$result = mysqli_query ( $con, $query );
		if (mysqli_num_rows ( $result ) > 0) {
			// output data of each row
			if ($row = mysqli_fetch_assoc ( $result )) {
				$id = $row ["count"];
				$id = $id + 1;
			}
		}
		return $id;
	}
	
	public function getNode() {
		$con = new Connection();
		$conn = $con->getConnection();
		$get = array();
		$i = 0;
		$node = new Node();
		$query = "SELECT `id`,`node_id`,`node_name`,`node_ip_address`,`status`,`created_by`,`Created_date` FROM add_node";
		$result = mysqli_query ( $conn, $query );
		if (mysqli_num_rows ( $result ) > 0) {
			while ($row = mysqli_fetch_assoc ( $result )) {
			    $node = new Node();
				$node->setNode_id( $row ["node_id"] );
				$node->setNode_name( $row ["node_name"] );
				$node->setNode_ip_address($row ["node_ip_address"] );
				$node->setStatus( $row ["status"] );
				
				$get[$i ++] = array(
				    "id" => $row["node_id"],
				    "node" => $node
				    );
	
			}
		}
		return $get;
	}
}

?>
