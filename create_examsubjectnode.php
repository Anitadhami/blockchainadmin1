<?php
include '../com/auth/config1.php';
include '../com/bean/examsubjectnode.php';
include '../com/dao/examsubjectnodeDao.php';
include '../com/dao/mysql/examsubjectnodeDaoImpl.php';
include '../com/controller/examsubjectnodecontroller.php';
$esn = new examsubjectnodeController();
$esn->createexamsubjectnode();
//echo 'Exam Subject Node created';
?>
