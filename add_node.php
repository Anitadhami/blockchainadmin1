<?php 
session_start();
?>
<?php 
$userid=0;
if (isset ( $_SESSION ["userid"] )) {
    // User is Authenticate
    $userid=$_SESSION ["userid"];
    
} else {
    //header ("location:login.php?purl=http://localhost/Examblockchainadmin/examsubject.php");
}
?>
<?php
include '../com/auth/config.php';
include '../com/bean/Node.php';
include '../com/bean/Login.php';
include '../com/dao/NodeDao.php';
include '../com/dao/mysql/nodeDaoImpl.php';
include '../com/controller/NodeController.php';

$node = new NodeController();
$node->addNode();
?>