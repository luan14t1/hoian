<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>

<?php
            if(isset($_POST['submit'])){
              if( empty($_POST['title']) ){
                  $tb="Nhập vào đầy đủ các trường!";
        }

        else {
            $title = $_POST['title'];
            if( empty($_FILES["picture"]["tmp_name"]) ){
                $file_name = "123";
            } else{
                $image_name = $_FILES['picture']['name'];
                $arname = explode('.',$image_name);
                $duoifile = end($arname);
                $file_name = 'PHOTO-'.time().'.'.$duoifile;
                $filetmp = $_FILES['picture']['tmp_name'];
                $filePath = $_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/photos/'.$file_name;
                $result = move_uploaded_file($filetmp,$filePath) or die("Upload không thành công"); //('đường dẫn tạm','đường dẫn lưu file');
            } 
            $sql="INSERT INTO photo(title,picture) VALUES('{$title}','{$file_name}')";
            $query = $conn->query($sql);
            if($query){
              header('location: /hoian/admin/photos?msg=addsuccess');
              }
            else{ 
                  $tb = "Lỗi Thêm thất bại";
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
                              Thêm hình ảnh
                          </header>
                          <div class="panel-body">
                            <div class="col-lg-6">
                              <?php if(isset($tb)) { ?>
                              <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <?php echo $tb ?>
                              </div>
                              <?php }?>
                              <form role="form" method="post" enctype = 'multipart/form-data'>
                                 <div class="form-group">
                                      <label for="">Tiêu đề</label>
                                      <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề">
                                  </div>
                                
                                  <div class="form-group">
                                      <label>Picture</label>
                                      <input type="file" name="picture" accept=".jpg, .jpeg, .png">
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
