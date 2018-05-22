<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>
<?php
  if(isset($_GET['idPhoto'])){
    $id_photo = $_GET['idPhoto'];
    $sql = "SELECT * FROM photo WHERE id_photo = '{$id_photo}'";
    $query = $conn->query($sql);
    $news = mysqli_fetch_assoc($query);
    $title = $news['title'];
    $picture = $news['picture'];
            if(isset($_POST['submit'])){
              if( empty($_POST['title']) ){
                  $tb="Nhập vào đầy đủ các trường!";
        }

        else {
            $title1 = $_POST['title'];
            if( empty($_FILES["picture"]["tmp_name"]) ){
                $sql2="UPDATE photo SET title = '{$title1}' WHERE id_photo = {$id_photo}";
            } else{
                $image_name = $_FILES['picture']['name'];
                $arname = explode('.',$image_name);
                $duoifile = end($arname);
                $file_name = 'PHOTO-'.time().'.'.$duoifile;
                $filetmp = $_FILES['picture']['tmp_name'];
                $filePath = $_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/photos/'.$file_name;
                $result = move_uploaded_file($filetmp,$filePath) or die("Upload không thành công"); //('đường dẫn tạm','đường dẫn lưu file');
                $sql2="UPDATE photo SET title = '{$title1}',picture = '{$file_name}' WHERE id_photo = {$id_photo}";
                unlink($_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/news/'.$picture);
            } 
            $query2 = $conn->query($sql2);
            if($query2){
              header('location: /hoian/admin/photos?msg=editsuccess');
              }
            else{ 
                  $tb = "Lỗi sửa thất bại";
                   header('location: /hoian/admin/photos?msg=editsuccess1');
               }
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
                              Sửa hình ảnh
                          </header>
                          <div class="panel-body">
                            <div class="col-lg-6">
                              <?php if(isset($tb)) { ?>
                              <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <?php echo $tb?>
                              </div>
                              <?php }?>
                              <form role="form" method="post" enctype = 'multipart/form-data'>
                                 <div class="form-group">
                                      <label for="">Tiêu đề</label>
                                      <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" value="<?php echo $title ?>">
                                  </div>
                                 
                                  <div class="form-group">
                                          <label class="control-label">Hình ảnh</label>
                                          <div class="">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="/hoian/uploads/images/photos/<?php echo $picture ?>" alt="<?php echo $title ?>">
                                                  </div>
                                                  <input type="file" name="picture" accept=".jpg, .jpeg, .png">
                                              </div>
                                          </div>
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