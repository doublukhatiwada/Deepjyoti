<?php
    include '../php/session.php';
    include '../../class/database_table.php';
    include '../../connection/connect.php';


    $clients = new Database_Table('clients');
    $images = new Database_Table('images');


    $i = '';
    $user_id = $_SESSION['user_id'];

    if($user_id == null)
        header('../login.php');

    
   if(isset($_GET['edit'])){ 
        $find_query = $clients->findData('id', $_GET['edit']);
        $data = $find_query->fetch(); 
        $images_get = $images->findData('id',$data['image_id']);
        $images_set = $images_get->fetch();
       if(isset($data['image_id'] ) == 0)
        $i = '';
        else
            $i = $data['image_id'];
    }
    else{
  }


  if(isset($_POST['submit'])){ 

     if($_FILES['image']['name']!=""){
    move_uploaded_file($_FILES['image']['tmp_name'], '../../images/clients/' . basename($_FILES['image']['name']));

    $images1 = [
        'image_name' => $_FILES['image']['name'],
        'image_type'=>"Client's Image",
        'id' => $i
    ];
   
     $images->savedata($images1,$i);

     $last_image = $images->findLastData();
     $l_i = $last_image->fetch(); 
     
   
    $values = [
        'id' => $_POST['id'],
        'fullname' => $_POST['full_name'], 
        'description' =>$_POST['description'],
        'company_id'=> $_SESSION['company_id'],
        'image_id'=>$l_i['id']
    ];
    }
    else{
        $values = [
        'id' => $_POST['id'],
        'fullname' => $_POST['full_name'], 
        'description' =>$_POST['description'],
        'company_id'=> $_SESSION['company_id']
    ];

    }

    $clients->savedata($values,'id');

    header('Location:../table/listClients.php');

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

    <title>Client Review Addition Form </title>

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
                            <div>
                            <?php if (isset($data['id'])):?>
                            <h2> <?php echo $data ['fullname'];?></h2>
                            <?php else:?>
                                 <h2>Add Client Review<small>of your company</small></h2>
                            <?php endif;?>
                            </div>
                               
                            <ul class="nav navbar-right panel_toolbox">
                               <?php if(isset($_GET['edit'])):?>
                                <li >
                                    <button style="border:none"  data-target="#error" data-toggle="modal"><img style="height: 30px; width:50px; float:right;margin-left:70%" src="../images/delete.png"></button>
                                </li>
                            <?php endif;?>
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                             <?php if(isset($data['id'])):?>
                            <div>
                               <a href="../../images/team/<?php echo $images_set['image_name']?>" target="_blank"> <img style="height: 150px; width:150px; float:right;margin-left:98%" src="../../images/clients/<?php echo $images_set['image_name']?>" alt="....Image is being loaded...."></a>
                            </div>
                        <?php endif;?>
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                 <input type="hidden" name="id" value="<?php if(isset($data['id'])) echo $data['id'];?>" />
                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="teller_code"> Full Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12" type="text" value="<?php if(isset($data['fullname'])) echo $data['fullname'];?>" name="full_name" required="true">
                                    </div>
                                </div>

                                  <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="teller_code"> Description <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="form-control col-md-7 col-xs-12" type="text"  name="description"><?php if(isset($data['description'])) echo $data['description'];?>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                           for="teller_code"> Photo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file"  class="form-control col-md-7 col-xs-12"  name="image">
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

          <!-- /page content -->
        <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p name="error">
                            Are you Sure?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <a href="../table/listClients.php?del=<?php echo $data['id']?>"><button type="button" class="btn btn-primary">Save changes</button></a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--         / modal-->
        

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
