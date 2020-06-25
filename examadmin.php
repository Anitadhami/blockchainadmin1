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
include '../com/auth/config1.php';
include '../com/bean/examadmin.php';
include '../com/bean/block.php';
include '../com/dao/examadminDao.php';
include '../com/dao/mysql/examadminDaoImpl.php';
include '../com/controller/examadmincontroller.php';
$ea = new examadminController();
$ea->createexamadmin($userid);
//echo 'Examadmin created';
header("location:../success.php?txt=Exam Added Successfully");
?>
