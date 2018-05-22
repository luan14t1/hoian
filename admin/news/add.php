<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>

<?php
            if(isset($_POST['submit'])){
              if( empty($_POST['title']) || empty($_POST['detail']) || ($_POST['id_cat']) == 0 ){
                  $tb="Nhập vào đầy đủ các trường!";
        }

        else {
            $title = $_POST['title'];
            $detail = $_POST['detail'];
            $id_cat = $_POST['id_cat'];
            $id_user = $userLogin['id_user'];
            $date = date('d/m/Y');
            if( empty($_FILES["picture"]["tmp_name"]) ){
                $file_name = "123";
            } else{
                $image_name = $_FILES['picture']['name'];
                $arname = explode('.',$image_name);
                $duoifile = end($arname);
                $file_name = 'NEWS-'.time().'.'.$duoifile;
                $filetmp = $_FILES['picture']['tmp_name'];
                $filePath = $_SERVER['DOCUMENT_ROOT'].'/hoian/uploads/images/news/'.$file_name;
                $result = move_uploaded_file($filetmp,$filePath) or die("Upload không thành công"); //('đường dẫn tạm','đường dẫn lưu file');
            } 
            $sql="INSERT INTO new(title,id_cat,picture,detail,id_user,date) VALUES('{$title}','{$id_cat}','{$file_name}','{$detail}' ,'{$id_user}','{$date}')";
            $query = $conn->query($sql);
            if($query){
              header('location: /hoian/admin/news?msg=addsuccess');
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
                              Add News Form
                          </header>
                          <div class="panel-body">
                            <div class="col-lg-6">
                              <?php if(isset($tb)) { ?>
                              <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  <?php  echo $tb ?>
                              </div>
                              <?php }?>
                              <form role="form" method="post" enctype = 'multipart/form-data'>
                                 <div class="form-group">
                                      <label for="">Title</label>
                                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Category</label>
                                      <select name="id_cat" class="form-control m-bot15">

                                        <option value="0">--Category---</option>
                                        <?php
                                          $sql = "SELECT * FROM category";
                                          $query = $conn->query($sql);
                                          while ($arrCat = mysqli_fetch_assoc($query)) {
                                            $id_cat = $arrCat['id_cat'];
                                            $name = $arrCat['name'];
                                        ?>
                                        <option value="<?php echo $id_cat ?>"><?php echo $name ?></option>
                                      <?php } ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Picture</label>
                                      <input type="file" name="picture" accept=".jpg, .jpeg, .png">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Detail</label>
                                      <textarea name="detail" id="detail" class="form-control" rows="10" placeholder="Enter Detail"></textarea>
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
<script type="text/javascript">
	var editor = CKEDITOR.replace('detail');
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/footer.php'; ?>
