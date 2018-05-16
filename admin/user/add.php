<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Add user Form
                          </header>
                          <div class="panel-body">
                            <div class="col-lg-6">
                              <?php if(isset($tb)) { ?>
                              <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <?php  echo $tb?>
                              </div>
                              <?php }?>
                              <form role="form" method="post">
                                 <div class="form-group">
                                      <label for="">Username</label>
                                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Email address</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Password</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Re-Password</label>
                                      <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Re-Password">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Fullname</label>
                                      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname">
                                  </div>
                                  <button type="submit" class="btn btn-info" name="submit">Submit</button>
                                  <button type="reset" class="btn btn-info" name="reset">Reset</button>
                              </form>
                           </div>
                          </div>
                      </section>
                  </div>
                </div>
              </section>
            </section>
  <?php
            if(isset($_POST['submit'])){
              if( empty($_POST['username']) || empty($_POST['password']) || empty($_POST['repassword']) || empty($_POST['fullname']) || empty($_POST['email']) ){
                  $tb="Nhập vào đầy đủ các trường!";
        }
        
        else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            
            if($password == $repassword){
                $sql="INSERT INTO user(username,password,fullname,email) VALUES('{$username}','{$password}','{$fullname}','{$email}')";
                $query = $conn->query($sql);
                if($query){
                    header('location: /hoian/admin/user?msg=addsuccess');
                } 
                else $tb = "Lỗi Thêm thất bại";
            }

        }
    }
?>                    
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/footer.php'; ?>