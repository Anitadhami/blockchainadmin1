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
include '../com/bean/nodesecuritykey.php';
include '../com/dao/nodesecuritykeyDao.php';
include '../com/dao/mysql/nodesecuritykeyDaoImpl.php';
include '../com/controller/nodesecuritykeycontroller.php';
$nsk = new nodesecuritykeyController();
$nsk->createnodesecuritykey();
//echo 'Nodesecuritykey created';
?>
