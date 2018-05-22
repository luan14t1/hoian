<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>
<?php
  if(isset($_GET['idUser'])){
    $id_user = $_GET['idUser'];
    $sql = "SELECT * FROM user WHERE id_user = '{$id_user}'";
    $query = $conn->query($sql);
    $user = mysqli_fetch_assoc($query);
    $username = $user['username'];
    $fullname = $user['fullname'];
    $email = $user['email'];
    $role = $user['role'];
  }
            if(isset($_POST['submit'])){
              if( empty($_POST['username']) || empty($_POST['fullname']) || empty($_POST['email']) ){
                  $tb="Nhập vào đầy đủ các trường!";
        }
        
        else {
          if(isset($_GET['idUser'])){
            $id_user = $_GET['idUser'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            if ($role == 1) {
              $role = "ADMIN";
            }
            else 
              $role = "MOD";
            if(empty($password) && empty($repassword)){
              $sql="UPDATE user SET username = '{$username}' ,fullname = '{$fullname}' ,email = '{$email}' , role = '{$role}' WHERE id_user = '{$id_user}'";
               $query = $conn->query($sql);
                if($query){
                    header('location: /hoian/admin/user');
                } 
                else $tb = "Lỗi sửa thất bại";
            }
            else if($password == $repassword){
                $password = md5($_POST['password']);
                $sql="UPDATE user SET username = '{$username}',  password = '{$password}' ,fullname = '{$fullname}' ,email = '{$email}' , role = '{$role}' WHERE id_user = '{$id_user}'";
                $query = $conn->query($sql);
                if($query){
                    header('location: /hoian/admin/user?msg=editsuccess');
                } 
                else $tb = "Lỗi sửa thất bại";
            }
            else $tb = "Xác nhận mật khẩu chưa chính xác!";
        }
    }
  }
?>                    
<section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Edit user Form
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
                                      <input type="text" readonly="true" class="form-control" id="username" name="username" placeholder="Enter Username" value="<?php echo $username?>" >
                                  </div>
                                  <div class="form-group">
                                      <label for="">Email address</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo $email ?>">
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
                                      <label for="">Role</label>
                                      <select name="role" class="form-control m-bot15">
                                        <?php
                                          if($role == "ADMIN"){
                                        ?>
                                          <option value="1">ADMIN</option>
                                          <option value="2">MOD</option>
                                        <?php }else {?>
                                          <option value="2">MOD</option>
                                          <option value="1">ADMIN</option> 
                                        <?php } ?>
                                      </select>
                                  </div>
                                   <div class="form-group">
                                      <label for="">Fullname</label>
                                      <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Fullname" value="<?php echo $fullname?>">
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
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/footer.php'; ?>