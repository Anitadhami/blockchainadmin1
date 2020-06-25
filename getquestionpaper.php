<?php
include '../com/auth/config.php';
include '../com/bean/distribute.php';
include '../com/bean/block.php';
include '../com/bean/Node.php';
include '../com/dao/getquestionpaperDao.php';
include '../com/dao/mysql/getquestionpaperDaoImpl.php';
include '../com/controller/getquestionpapercontroller.php';
$esn = new getquestionpapercontroller();
$esn->getquestionpaper();
//echo 'Exam Subject Node created';
// header("location:../display_questionpaper.php");

?>