<?php
include '../com/auth/config1.php';
include '../com/bean/examadmin.php';
include '../com/dao/examadminDao.php';
include '../com/dao/mysql/examadminDaoImpl.php';
include '../com/controller/examadminController.php';
$ea = new examadminController();
$ea->createexamadmin();
//echo 'Examadmin created';
?>
