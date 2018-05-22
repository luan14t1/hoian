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
                  Liên hệ
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
               <?php if(isset($_GET['msg'])) { ?>
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
             <div class="panel-body">
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="table">
              <thead>
              <tr>
                  <th><input id="checkAll" name="checkAll" type="checkbox" /><button id="btnDel" class="del btn btn-primary hidden" type="submit"><i class="fa fa-trash"></i>Trash</button></th>
                  <th>ID</th>
                  <th>Họ tên</th>
                  <th>Số điện thoại</th>
                  <th>Email</th>
                  <th>Ngày gửi</th>
                  <th>Tin nhắn</th>
                  <th>Chức năng</th>
              </tr>
              </thead>
              <tbody id="data">
                 <?php 
                   $sql = "SELECT * FROM contact";
                   $query = $conn->query($sql);
                   $link = $query->num_rows ;
                   if($link > 0){
                     $i = 0;
                     while($arrContact = mysqli_fetch_assoc($query)){
                       $id_contact = $arrContact['id_contact']; 
                       $fullname = $arrContact['fullname'];                     
                       $phone = $arrContact['phone']; 
                       $email = $arrContact['email'];
                       $detail = $arrContact['detail']; 
                       $date_send = $arrContact['date_send']; 
                       $i++;
                ?>
              <tr class="gradeX">
                  <td><input class="checkbox" name="ids" id="<?= $id_contact ?>" value="<?= $id_contact ?>" type="checkbox" /></td>
                  <td><?php echo $i ?></td>
                  <td><?php echo $fullname ?></td>
                  <td><?php echo $phone ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $date_send ?></td>
                  <td><?php echo $detail ?></td>
                  <td><a href="/hoian/admin/contact/delete.php?idContact=<?php echo $id_contact?>"title="" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-minus-circle"></i>Delete</a></td>
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
               </div>
              </section>
              </div>
              </div>
            </section>
          </section>
          </section>
      </section>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/footer.php'; ?>

<script type="text/javascript">
$(document).ready(function() {
    $('#checkAll').click(function(event) {
        if ($(this).prop('checked') == true){
            $('.checkbox').prop('checked', true);
        } else {
            $('.checkbox').prop('checked', false);
        }
    });
    $('input[type="checkbox"]').click(function(){
        
        var ids = [];
        $('input[name=ids]:checked').each ( function(i) {
            ids[i] = $(this).attr('id');
        });
        if (ids.length > 0) {
            $('.del').removeClass('hidden');
        }else{
            $('.del').addClass('hidden');
        }
    })  
    
    $('#btnDel').click(function(event) {
        var ids = [];
        $('input[name=ids]:checked').each ( function(i) {
            ids[i] = $(this).attr('id');
        });
        $.ajax({
            url: '/hoian/admin/contact/deleteAll.php',
            type: 'post',
            data: {
                ids: ids
            },
            success: function( data ) {
                $('.del').addClass('hidden')
                //alert("deleted success")
                $("#data").html(data);
            }
        });
    });
});
</script>