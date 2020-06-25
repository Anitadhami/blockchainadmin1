 <?php
 session_start();
 ?>
 <?php 
$userid=0;
if (isset ( $_SESSION ["userid"] )) {
    // User is Authenticate    
    $userid=$_SESSION ["userid"];
    
} else {
    header ("location:login.php?purl=http://localhost/blockchain_client/student_details.php");
}
 ?>
 <?php 
 include 'com/auth/config.php';
 include 'com/bean/student.php';
 include 'com/bean/Node.php';
 include 'com/bean/block.php';
 include 'com/dao/studentDao.php';
 include 'com/dao/questionDao.php';
 include 'com/dao/mysql/studentDaoImpl.php';
 include 'com/dao/mysql/questionDaoImpl.php';
 include 'com/controller/studentcontroller.php';
 include 'com/controller/questioncontroller.php';
 
 $sid = $_GET['sid'];
 ?>
 
 <?php
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
$block = new studentcontroller();
$b = $block->getblockStudentId($sid);

$ce = $block->getblockById($sid);

$nd = $block->getnodeIP($userid,$sid);
// $student = new studentcontroller();
// $s = $student->getStudent();

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/material/ui-user-card.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2019 06:05:48 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="atoconn/assets/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Popup CSS -->
    <link href="atoconn/assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="atoconn/material/dist/css/style.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="atoconn/material/dist/css/pages/user-card.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include 'header.php'?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'sidebar.php'?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Blockchain</h4>
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
 <div class="card">
<div class="card-body">
                <div class="row el-element-overlay">
                    <div class="col-md-12">
                        <h2 class="box-title">Student Details</h2><br>
                        <ul>
                        <li><h4 class="box-title"><strong>Name:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[1]);
                            ?></h4></li>
                        <li><h4 class="box-title"><strong>Email Id:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[3]);
                            ?></h4>
                        <li><h4 class="box-title"><strong>Phone Number:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[2]);
                            ?></h4>
                        <li><h4 class="box-title"><strong>Date Of Birth:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[4]);
                            ?></h4>
                        <li><h4 class="box-title"><strong>Qualification:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[5]);
                            ?></h4></li>
                       <li> <h4 class="box-title"><strong>Branch:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[6]);
                            ?></h4>
                        <li><h4 class="box-title"><strong>Address:</strong>&nbsp<?php $temp = $block->my_decrypt($b->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[8]);
                            ?></h4>
                            </ul>
                    </div>
                    
                    <br/><br/>
                    <hr>
                    
                    <div style="clear: both;"></div>
                    <div class="row" style="margin-top: 20px; ">
                    <?php 
                    foreach ($ce as $c){
                        $cc = $c["block"];
                    ?>
                    	<div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1">
                                    <img src="http://<?php echo $nd->getNode_ip_address(); ?>/blockchain_client/<?php $temp = $block->my_decrypt($cc->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[4]);
                            ?>"  style="width: 100%;height:350px" alt="user" />
                                    <div class="el-overlay scrl-up">
                                        <ul class="el-info">
                                            <li>
                                                <a class="btn default btn-outline image-popup-vertical-fit" 
                                                href="http://<?php echo $nd->getNode_ip_address(); ?>/blockchain_client/<?php $temp = $block->my_decrypt($cc->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[4]);
                            ?>">
                                                    <i class="icon-magnifier"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn default btn-outline" href="javascript:void(0);">
                                                    <i class="icon-link"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="box-title"><?php $temp = $block->my_decrypt($cc->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[3]);
                            ?></h4>
                                   
                                    <br/> </div>
                            </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    </div>
                    </div>
<!--                     <div class="col-lg-3 col-md-6"> -->
<!--                         <div class="card"> -->
<!--                             <div class="el-card-item"> -->
<!--                                 <div class="el-card-avatar el-overlay-1"> -->
<!--                                     <img src="atoconn/assets/images/users/2.jpg" alt="user" /> -->
<!--                                     <div class="el-overlay scrl-up"> -->
<!--                                         <ul class="el-info"> -->
<!--                                             <li> -->
<!--                                                 <a class="btn default btn-outline image-popup-vertical-fit" href="atoconn/assets/images/users/1.jpg"> -->
<!--                                                     <i class="icon-magnifier"></i> -->
<!--                                                 </a> -->
<!--                                             </li> -->
<!--                                             <li> -->
<!--                                                 <a class="btn default btn-outline" href="javascript:void(0);"> -->
<!--                                                     <i class="icon-link"></i> -->
<!--                                                 </a> -->
<!--                                             </li> -->
<!--                                         </ul> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                                 <div class="el-card-content"> -->
<!--                                     <h4 class="box-title">Genelia Deshmukh</h4> -->
<!--                                     <small>Managing Director</small> -->
<!--                                     <br/> </div> -->
<!--                             </div> -->
<!--                         </div> -->
<!--                     </div> -->
<!--                     <div class="col-lg-3 col-md-6"> -->
<!--                         <div class="card"> -->
<!--                             <div class="el-card-item"> -->
<!--                                 <div class="el-card-avatar el-overlay-1"> -->
<!--                                     <img src="atoconn/assets/images/users/3.jpg" alt="user" /> -->
<!--                                     <div class="el-overlay scrl-up"> -->
<!--                                         <ul class="el-info"> -->
<!--                                             <li> -->
<!--                                                 <a class="btn default btn-outline image-popup-vertical-fit" href="atoconn/assets/images/users/1.jpg"> -->
<!--                                                     <i class="icon-magnifier"></i> -->
<!--                                                 </a> -->
<!--                                             </li> -->
<!--                                             <li> -->
<!--                                                 <a class="btn default btn-outline" href="javascript:void(0);"> -->
<!--                                                     <i class="icon-link"></i> -->
<!--                                                 </a> -->
<!--                                             </li> -->
<!--                                         </ul> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                                 <div class="el-card-content"> -->
<!--                                     <h4 class="box-title">Genelia Deshmukh</h4> -->
<!--                                     <small>Managing Director</small> -->
<!--                                     <br/> </div> -->
<!--                             </div> -->
<!--                         </div> -->
<!--                     </div> -->
<!--                     <div class="col-lg-3 col-md-6"> -->
<!--                         <div class="card"> -->
<!--                             <div class="el-card-item"> -->
<!--                                 <div class="el-card-avatar el-overlay-1"> -->
<!--                                     <img src="atoconn/assets/images/users/4.jpg" alt="user" /> -->
<!--                                     <div class="el-overlay scrl-up"> -->
<!--                                         <ul class="el-info"> -->
<!--                                             <li> -->
<!--                                                 <a class="btn default btn-outline image-popup-vertical-fit" href="atoconn/assets/images/users/1.jpg"> -->
<!--                                                     <i class="icon-magnifier"></i> -->
<!--                                                 </a> -->
<!--                                             </li> -->
<!--                                             <li> -->
<!--                                                 <a class="btn default btn-outline" href="javascript:void(0);"> -->
<!--                                                     <i class="icon-link"></i> -->
<!--                                                 </a> -->
<!--                                             </li> -->
<!--                                         </ul> -->
<!--                                     </div> -->
<!--                                 </div> -->
<!--                                 <div class="el-card-content"> -->
<!--                                     <h4 class="box-title">Genelia Deshmukh</h4> -->
<!--                                     <small>Managing Director</small> -->
<!--                                     <br/> </div> -->
<!--                             </div> -->
<!--                         </div> -->
<!--                     </div> -->
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="atoconn/assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2019 Eliteadmin by themedesigner.in
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="atoconn/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="atoconn/assets/node_modules/popper/popper.min.js"></script>
    <script src="atoconn/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="atoconn/material/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="atoconn/material/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="atoconn/material/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="atoconn/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="atoconn/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="atoconn/material/dist/js/custom.min.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="atoconn/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="atoconn/assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/material/ui-user-card.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2019 06:05:48 GMT -->
</html>