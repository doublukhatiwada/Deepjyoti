<?php
  include 'connection/connect.php';
  include 'class/database_table.php';

  $info = 'log In';
 $users = new Database_Table('users'); 
 

if(isset($_POST['submit'])){
  $uname = $_POST['username'];
  $select_query= $users->findData('username',$uname);

 if($select_query->rowCount()>0){ 
  $row=$select_query->fetch(); 
   $_SESSION = [
    'user_id'=>$row['id'], 
    'username' => $_POST['username'], 
    'password' =>$_POST['password'], 
    'user_firstname'=>$row['first_name'],
    'company_id'=>$row['company_id']
  ];


    if( $_SESSION['username']==$row['username'] && password_verify($_SESSION['password'],$row['password'])&&($row['company_id']==1)){ 
      header('Location:/Deepjyoti/admin/form/addUsers.php');
    }
    elseif($_SESSION['username']==$row['username'] && password_verify($_SESSION['password'],$row['password'])){
      header("Location:/Deepjyoti/admin/form/addUsers.php?$row['company_id']");
    } 
    else
     $info " Cannot Log In. Incorrect Username or password";   
 }
else  $info = 'cannot log in . You are not a user.'; 
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DeepJyoti Group of Companies | Login </title>

    <!-- Bootstrap -->
    <link href="admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="admin/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login" style="background-image: url('admin/images/login.jpg');">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form>
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Company Name" name="company_id" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required=""  name="password" />
              </div>
              <div>
                  <button type="submit" name = "submit"class="btn btn-success">Login</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

          <!--     <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
 -->
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
    </div>
  </body>
</html>
