
<?php
include '../com/auth/config.php';
include '../com/bean/certificate.php';
include '../com/bean/block.php';
include '../com/dao/studentDao.php';
// include '../com/dao/studentDao.php';
include '../com/dao/mysql/studentDaoImpl.php';
include '../com/controller/studentcontroller.php';



$s = new studentController();
$s->addCertificate();
//echo 'Student Registered';
?>
