<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>
<?php
  if(isset($_GET['idNew'])){
    $id_new = $_GET['idNew'];
    $sql = "SELECT * FROM new WHERE id_new = '{$id_new}'";
    $query = $conn->query($sql);
    $news = mysqli_fetch_assoc($query);
    $title = $news['title'];
    $detail = $news['detail'];
    $picture = $news['picture'];
    $id_cat = $news['id_cat'];
            if(isset($_POST['submit'])){
              if( empty($_POST['title']) || empty($_POST['detail'])){
                  $tb="Nhập vào đầy đủ các trường!";
        }

        else {
            $title1 = $_POST['title'];
            $detail1 = $_POST['detail'];
            $id_cat1 = $_POST['id_cat'];
            $id_user = $userLogin['id_user'];
            if( empty($_FILES["picture"]["tmp_name"]) ){
                $sql2="UPDATE new SET title = '{$title1}',id_cat = '{$id_cat1}',detail = '{$detail1}',id_user = '{$id_user}' WHERE id_new = {$id_new}";
            } else{
                $image_name = $_FILES['picture']['name'];
                $arname = explode('.',$image_name);
                $duoifile = end($arname);
                $file_name = 'NEWS-'.time().'.'.$duoifile;
                $filetmp = $_FILES['picture']['tmp_name'];
                $filePath = $_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/news/'.$file_name;
                $result = move_uploaded_file($filetmp,$filePath) or die("Upload không thành công"); //('đường dẫn tạm','đường dẫn lưu file');
                $sql2="UPDATE new SET title = '{$title1}',id_cat = '{$id_cat1}',picture = '{$file_name}',detail = '{$detail1}',id_user = '{$id_user}' WHERE id_new = {$id_new}";
                unlink($_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/news/'.$picture);
            } 
            $query2 = $conn->query($sql2);
            if($query2){
              header('location: /hoian/admin/news?msg=editsuccess');
              }
            else{ 
                  $tb = "Lỗi sửa thất bại";
                   header('location: /hoian/admin/news?msg=editsuccess1');
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
                              Edit News Form
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
                              <form role="form" method="post" enctype = 'multipart/form-data'>
                                 <div class="form-group">
                                      <label for="">Title</label>
                                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="<?php echo $title ?>">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Category</label>
                                      <select name="id_cat" class="form-control m-bot15">
                                        <?php
                                          $sql1 = "SELECT * FROM category";
                                          $query1 = $conn->query($sql1);
                                          while ($arrCat = mysqli_fetch_assoc($query1)) {
                                            $id_cat1 = $arrCat['id_cat'];
                                            $name = $arrCat['name'];
                                            if($id_cat == $id_cat1){
                                        ?>
                                        <option value="<?php echo $id_cat ?>" selected="selected"><?php echo $name ?></option>
                                      <?php }else {?>
                                        <option value="<?php echo $id_cat ?>"><?php echo $name ?></option>   
                                      <?php 
                                           }
                                       } 
                                     ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                          <label class="control-label">Image</label>
                                          <div class="">
                                              <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="/hoian/uploads/images/news/<?php echo $picture ?>" alt="<?php echo $title ?>">
                                                  </div>
                                                  <input type="file" name="picture" accept=".jpg, .jpeg, .png">
                                              </div>
                                          </div>
                                      </div>
                                   <div class="form-group">
                                      <label for="">Detail</label>
                                      <textarea name="detail" class="form-control" rows="10" placeholder="Enter Detail"><?php echo $detail ?></textarea>
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