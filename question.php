<?php session_start();?>
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
include '../com/bean/question.php';
include '../com/bean/block.php';
include '../com/dao/questionDao.php';
include '../com/dao/mysql/questionDaoImpl.php';
include '../com/controller/questioncontroller.php';
$q = new questioncontroller();
//echo $userid;
$q->createquestion($userid);
//echo 'Question created';
//$user_id= $userid;

?>
