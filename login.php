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

    <title>Ấn tượng Hội An | Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/hoian/templates/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/hoian/templates/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/hoian/templates/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/hoian/templates/admin/css/style.css" rel="stylesheet">
    <link href="/hoian/templates/admin/css/style-responsive.css" rel="stylesheet" />

</head>
  <?php
  if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
       $tb = "Nhập username và password";
    }
    else
    {
     $username = $_POST['username'];
     $password = md5($_POST['password']);
     $sql = "SELECT * FROM user WHERE username = '{$username}' and password = '{$password}'";
     /*echo $sql; die();*/
     $query = $conn->query($sql);
     $user = mysqli_fetch_assoc($query);
     if($query->num_rows > 0){
      $_SESSION['user'] = $user; 
      header("Location: /hoian/admin?msg=loginsuccess");
     }else{
      $msg="Login thất bại! Sai username hoặc password!";
     }
    }
  }
?>
  <body class="login-body">

    <div class="container">
 
      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <?php if(isset($msg)) {?>
                    <div class="alert alert-danger" role="alert">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <?php echo $msg ?>
                              </div>
                          <?php }?>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <input type="password" class="form-control" placeholder="Password" name="password">
            
            <button class="btn btn-lg btn-login btn-block" type="submit" name="submit">Đăng nhập</button>
            
            <div style="margin-left: 42px; ">
                Quay lại trang chủ
                <a class="" href="/hoian">
                    Trang chủ
                </a>
            </div>

        </div>
      </form>

    </div>



    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/hoian/templates/admin/js/jquery.js"></script>
    <script src="/hoian/templates/admin/js/bootstrap.min.js"></script>


  </body>

</html>