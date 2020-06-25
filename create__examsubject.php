<?php
include '../com/auth/config1.php';
include '../com/bean/examsubject.php';
include '../com/dao/examsubjectDao.php';
include '../com/dao/mysql/examsubjectDaoImpl.php';
include '../com/controller/examsubjectcontroller.php';
$sb = new examsubjectController();
$sb->createexamsubject();
//echo 'Examadmin created';
?>
