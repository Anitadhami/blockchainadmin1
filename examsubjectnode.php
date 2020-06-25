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
include '../com/bean/examsubjectnode.php';
include '../com/bean/Node.php';
include '../com/dao/examsubjectnodeDao.php';
include '../com/dao/mysql/examsubjectnodeDaoImpl.php';
include '../com/controller/examsubjectnodecontroller.php';
$esn = new examsubjectnodeController();
$esn->createexamsubjectnode();
//echo 'Exam Subject Node created';
header("location:../success.php?txt=Exam Subject Node Set Successfully");

?>
