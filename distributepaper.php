<?php
include '../com/auth/config.php';
include '../com/bean/distribute.php';
include '../com/bean/Node.php';
include '../com/dao/distributeDao.php';
include '../com/dao/mysql/distributeDaoImpl.php';
include '../com/controller/distributecontroller.php';
$dp = new distributeController();
$dp->create_distribute();
//echo 'Nodesecuritykey created';
header("location:../success.php?txt=Paper Distributed Successfully");
?>