<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php session_start() ;?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/hoian/templates/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hoian/templates/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/hoian/templates/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/hoian/templates/admin/css/style.css" rel="stylesheet">
    <link href="/hoian/templates/admin/css/style-responsive.css" rel="stylesheet" />

</head>

  <body class="login-body">

    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
                <span style="margin-left: 75px; color: #0DC0E6; text-align: center"> <?php if(isset($tb)){ echo $tb;}  ?> </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit" name="submit">Sign in</button>
            <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="button">Submit</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/hoian/templates/admin/js/jquery.js"></script>
    <script src="/hoian/templates/admin/js/bootstrap.min.js"></script>


  </body>
<?php
  if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
       $tb = "Nhập username và password";
    }
    else
    {
     $username = $_POST['username'];
     $password = $_POST['password'];
     $sql = "SELECT * FROM user WHERE username = '{$username}' and password = '{$password}'";
     $query = $conn->query($sql);
     $user = mysqli_fetch_assoc($query);
     if($query->num_rows > 0){
      $_SESSION['user'] = $user; 
      header("Location: /hoian/admin?msg=loginsuccess");
     }else{
      $msg="Login thất bại!";
     }
    }
  }
?>
</html>