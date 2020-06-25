 <?php
 session_start();
 ?>
 <?php 
$userid=0;
if (isset ( $_SESSION ["userid"] )) {
    // User is Authenticate    
    $userid=$_SESSION ["userid"];
    
} else {
    header ("location:login.php?purl=http://localhost/blockchain_client/student.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/material/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2019 06:06:08 GMT -->
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
        <link rel="stylesheet" type="text/css" href="atoconn/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
        <!-- Custom CSS -->
        <link href="atoconn/material/dist/css/style.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <?php
    include 'com/auth/config.php';
    include 'com/bean/student.php';
    include 'com/bean/block.php';
    include 'com/dao/studentDao.php';
    include 'com/dao/questionDao.php';
    include 'com/dao/mysql/studentDaoImpl.php';
    include 'com/dao/mysql/questionDaoImpl.php';
    include 'com/controller/studentcontroller.php';
    include 'com/controller/questioncontroller.php';
    ?>
    
    <?php
$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';
$block = new studentcontroller();
$b = $block->getblock();

$student = new studentcontroller();
$s = $student->getStudent();

?>
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
             <?php include 'header.php';?>
                                                <!-- ============================================================== -->
                                                <!-- End Topbar header -->
                                                <!-- ============================================================== -->
                                                <!-- ============================================================== -->
                                                <!-- Left Sidebar - style you can find in sidebar.scss  -->
                                                <!-- ============================================================== -->
                                                <?php include 'sidebar.php';?>
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
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    <h4 class="card-title">Student Information</h4>
    <div class="table-responsive m-t-40">
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                        // $qs=new questioncontroller();
                        $i = 1;
                        foreach ($b as $bl) {
                            $bb = $bl['block'];
                            ?>
                <tr>
                    <td><?php echo  $i++; ?></td>
                    <td><?php $temp = $block->my_decrypt($bb->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[1]);
                            ?></td>
                    <td><?php $temp = $block->my_decrypt($bb->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[3]);
                            ?></td>
                    <td><?php $temp = $block->my_decrypt($bb->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[2]);
                            ?></td>
                    <td><a href="student_details.php?sid=<?php $temp = $block->my_decrypt($bb->getEncrypted_data(), $key);
                            $str_arr = preg_split("/\####/", $temp);
                            print_r($str_arr[0]);
                            ?>" class = 'btn btn-sm btn-raise btn-primary' target="_blank" >View</a> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>


</div>
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
<!-- This is data table -->
<script src="atoconn/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="../../../../cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="../../../../cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="../../../../cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="../../../../cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
$(function() {
$('#myTable').DataTable();
$(function() {
var table = $('#example').DataTable({
"columnDefs": [{
"visible": false,
"targets": 2
}],
"order": [
[2, 'asc']
],
"displayLength": 25,
"drawCallback": function(settings) {
var api = this.api();
var rows = api.rows({
page: 'current'
}).nodes();
var last = null;
api.column(2, {
page: 'current'
}).data().each(function(group, i) {
if (last !== group) {
$(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
last = group;
}
});
}
});
// Order by the grouping
$('#example tbody').on('click', 'tr.group', function() {
var currentOrder = table.order()[0];
if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
table.order([2, 'desc']).draw();
} else {
table.order([2, 'asc']).draw();
}
});
});
});
$('#example23').DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
</script>
</body>

<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/material/table-data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 May 2019 06:06:08 GMT -->
</html>