<?php
    include '../php/session.php';
    include '../../class/database_table.php';
    include '../../connection/connect.php';


    $users = new Database_Table('users');

    $user_id = $_SESSION['user_id'];

    if($user_id == '')
        header('../login.php');


  if(isset($_POST['submit'])){ 

    $data = $users->findData('id',$_SESSION['user_id']);
    $d = $data->fetch();
    if(! password_verify($_POST['c_password'],$d['password'])){
        $info = "!!!!Please enter valid correct password!!!!";
    }

     if($_POST['n_password'] != $_POST['cn_password']){
        $info = "!!!!!Please Confirm Your password!!!!!";
    }


    if(($_POST['n_password'] == $_POST['cn_password'])&&(password_verify($_POST['c_password'],$d['password']))){

    $values = [
        'id' => $d['id'],
        'password'=> password_hash($_POST['n_password'],PASSWORD_DEFAULT)
    ];

     $users->savedata($values,'id'); 
    $info = " Your Passowrd has been changed";
    }
   


}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Change Password</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <!-- menu profile quick info -->
                <div>
                    <?php include '../sections/profile.php';
                    ?>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <?php include '../sections/sidebar.php'?>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->

                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
            <div>
                <?php include '../sections/topNavigation.php'?> 
            </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">

                        <div class="clearfix"></div>

                         <?php if (isset($info)):?>
                    <div  class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span>
                    </button>
                    <strong><?php echo $info?></strong>
                    </div>
                    <?php endif;?>
                    <?php if (isset($success)):?>
                    <div  class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">??</span>
                    </button>
                    <strong><?php echo $success?></strong>
                    </div>
                 <?php endif;?>

                            <div>
                                <h2>Change Password<small></small></h2>
                            </div>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="changePassword.php">

                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="teller_code"> Current Password  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" type="Password"  name="c_password" required="true">
                                    </div>
                                </div>

                                 <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="teller_code"> New Password  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" type="Password"  name="n_password" required="true">
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="teller_code"> Confirm Password  <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" type="Password"  name="cn_password" required="true">
                                    </div>
                                </div>

                                </div>

                               

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="button">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <input type="submit" name="submit" class="btn btn-primary"> 
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br />
        </div>
        

        <!-- footer content -->
        <div>
            <?php include '../sections/footer.php';?>
        </div>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Chart.js -->
<script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<!-- gauge.js -->
<script src="../vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="../vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="../vendors/Flot/jquery.flot.js"></script>
<script src="../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../vendors/Flot/jquery.flot.time.js"></script>
<script src="../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="../vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="../vendors/moment/min/moment.min.js"></script>
<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Custom Theme Scripts -->
<script src="../js/custom.min.js"></script>

</body>
</html>
