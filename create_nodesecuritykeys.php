<?php
include '../com/apl/auth/config.php';
include '../com/apl/beans/nodesecuritykey.php';
include '../com/apl/dao/nodesecuritykey/nodesecuritykeyDao.php';
include '../com/apl/dao/nodesecuritykey/mysql/nodesecuritykeyDaoImpl.php';
include '../com/apl/controller/nodesecuritykeycontroller.php';
$nsk = new nodesecuritykeyController();
$nsk->createnodesecuritykey();
//echo 'Nodesecuritykey created';
?>
