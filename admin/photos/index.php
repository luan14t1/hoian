<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>

 <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">
                  Danh sách hình ảnh
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="panel-body">
                 <a class="btn green" href="/hoian/admin/photos/add.php">
                 Thêm hình ảnh <i class="fa fa-plus"></i></a>
              </button>
              <?php if(isset($_GET['msg'])) { ?>
                              <?php if($_GET['msg'] == "addsuccess") { ?>
                              <div class="alert alert-success" role="alert">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  Thêm thành công 
                              </div>
                              <?php }?>
                               <?php if($_GET['msg'] == "editsuccess") { ?>
                              <div class="alert alert-success" role="alert">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  Sửa thành công 
                              </div>
                              <?php }?>
                               <?php if($_GET['msg'] == "delsuccess") { ?>
                              <div class="alert alert-success" role="alert">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  Xóa thành công 
                              </div>
                              <?php }?>
                               <?php if($_GET['msg'] == "delerror") { ?>
                              <div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  Xóa thất bại
                              </div>
                              <?php }
                                  }
                              ?>
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="table">
              <thead>
              <tr>
                  <th>ID</th>
                  <th>Tiêu đề</th>
                  <th>Hình ảnh</th>
                  <th>Chức năng</th>
              </tr>
              </thead>
              <tbody>
                 <?php 
                   $sql = "SELECT * FROM photo";
                   $query = $conn->query($sql);
                   $link = $query->num_rows ;
                   if($link > 0){
                     while($arrNew = mysqli_fetch_assoc($query)){
                       $id_photo = $arrNew['id_photo']; 
                       $title = $arrNew['title'];                     
                       $picture = $arrNew['picture']; 
                ?>
              <tr class="gradeA">
                  <td><?php echo $id_photo ?></td>
                  <td><?php echo $title ?></td>
                  <td><img src="/hoian/uploads/images/photos/<?php echo $picture ?>" alt="<?php echo $title ?>" height="80" width="180"></td>
                  <td><a href="/hoian/admin/photos/edit.php?idPhoto=<?php echo $id_photo?>"><i class="fa fa-edit"></i>Sửa</a> - <a href="/hoian/admin/photos/delete.php?idPhoto=<?php echo $id_photo?>" title="" onclick="return confirm('Bạn có chắc muốn xóa: <?=$title ?>?')"><i class="fa fa-minus-circle"></i>Xóa</a></td>
              </tr>
              <?php
                }
              }
              ?>
              </tbody>
              </table>
              </div>
              </div>
               </div>
              </section>
              </div>
              </div>
            </section>
          </section>
          </section>
      </section>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/footer.php'; ?>