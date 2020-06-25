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
include '../com/bean/examsubject.php';
include '../com/bean/block.php';
include '../com/dao/examsubjectDao.php';
include '../com/dao/mysql/examsubjectDaoImpl.php';
include '../com/controller/examsubjectcontroller.php';
$sb = new examsubjectController();
$sb->createexamsubject($userid);
//echo 'Examadmin created';
header("location:../success.php?txt=Exam Subject Added Successfully");
?>
