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
                  News Table
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="panel-body">
                 <a class="btn green" href="/hoian/admin/news/add.php">
                 Add New <i class="fa fa-plus"></i></a>
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
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Picture</th>
                  <th>Detail</th>
                  <th>Function</th>
              </tr>
              </thead>
              <tbody>
                 <?php 
                   $sql = "SELECT * FROM new";
                   $query = $conn->query($sql);
                   $link = $query->num_rows ;
                   if($link > 0){
                     $i = 0;
                     while($arrNew = mysqli_fetch_assoc($query)){
                       $id_new = $arrNew['id_new']; 
                       $title = $arrNew['title'];                     
                       $id_cat = $arrNew['id_cat']; 
                       $picture = $arrNew['picture']; 
                       $detail = $arrNew['detail']; 
                       $i++;
                       $sql1 = "SELECT * FROM category WHERE id_cat = {$id_cat}";
                       $query1 = $conn->query($sql1);
                       $cat = mysqli_fetch_assoc($query1);
                       $name_cat = $cat['name'];
                ?>
              <tr class="gradeA">
                  <td><?php echo $i ?></td>
                  <td><?php echo $title ?></td>
                  <td><?php echo $name_cat ?></td>
                  <td><img src="/hoian/uploads/images/news/<?php echo $picture ?>" alt="<?php echo $title ?>" height="100" width="200"></td>
                  <td><?php echo $detail ?></td>
                  <td><a href="/hoian/admin/news/edit.php?idNew=<?php echo $id_new?>"><i class="fa fa-edit"></i>Edit</a> - <a href="/hoian/admin/news/delete.php?idNew=<?php echo $id_new?>" title="" onclick="return confirm('Bạn có chắc muốn xóa: <?=$title ?>!!!')"><i class="fa fa-minus-circle"></i>Delete</a></td>
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