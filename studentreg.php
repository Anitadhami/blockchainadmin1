
<?php
include '../com/auth/config.php';
include '../com/bean/student.php';
include '../com/bean/block.php';
include '../com/dao/studentDao.php';
// include '../com/dao/studentDao.php';
include '../com/dao/mysql/studentDaoImpl.php';
include '../com/controller/studentcontroller.php';



$s = new studentController();
$s->createstudent();
//echo 'Student Registered';
?>
