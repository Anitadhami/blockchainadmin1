<?php
include '../com/auth/config.php';
include '../com/bean/question.php';
include '../com/bean/block.php';
include '../com/dao/questionDao.php';
include '../com/dao/mysql/questionDaoImpl.php';
include '../com/controller/questioncontroller.php';
$q = new questioncontroller();
$q->create_question();

?>
