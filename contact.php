<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/header.php'; ?>
<?php
        if(isset($_POST['submit'])){
            if( empty($_POST['fullname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['detail']) ){
                $tb="Nhập vào đầy đủ các trường!";
        }

        else {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $detail = $_POST['detail'];
            $date_send = date('d/m/Y');
            $sql="INSERT INTO contact(fullname, email, phone, detail, date_send) VALUES('{$fullname}', '{$email}', '{$phone}', '{$detail}', '{$date_send}')";
            $query = $conn->query($sql);
              if($query){
                  header('location: /hoian/contact.php?msg=addsuccess');
                   }
                  else $tb = "Lỗi Thêm thất bại";
            }

        }
?>
<div class="xmove">
    <div id="my-breadcrumbs" class="">
        <div class="container">
            <div class="row">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
                        <a itemprop='item' style='z-index:10' href='/hoian'>
                            <span itemprop='name'>Trang chủ</span>
                        </a>
                        <meta itemprop='position' content='1' />
                        <span class='sperate'></span>
                    </li>
                    <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
                        <a itemprop='item' style='z-index:9' href='contact.php'>
                            <span itemprop='name'>Liên hệ</span>
                        </a>
                        <meta itemprop='position' content='2' />
                        <span class='sperate'></span>
                    </li>
                </ul>
                <div class='clearfix'></div>
            </div>
        </div>
        <div class='clearfix'></div>
    </div>



    <div id="main-web-wrapper">

        <div id="page-wrapper">


            <div id="content-center">
                <div class="clearfix"></div>
                <div class="box_containerlienhe">
                    <div class="container">

                        <div class="row hidden-sm hidden-xs">
                            <div class="global-title">
                                <h1>Liên hệ</h1>
                            </div>
                        </div>
                    </div>
                    <div class="content">

                        <section id="contact"><br/>
                       
                            <div class="contact-container container" style="">

                                <div class="left-form-contact pull-right hidden-sm hidden-xs">
                                    <div class="title">Liên hệ chúng tôi</div>
                                    <div class="fix-title">
                                        <div style="width:100%;">
                                            <div style="width:50%;float:left;">
                                                <strong>Địa chỉ:</strong>
                                            </div>

                                            <div style="width:92%;float:left;"> Phố cổ Hội An</div>
                                        </div>

                                        <div style="width:100%;">
                                            <div style="width:50%;float:left;">
                                                <strong>Hotline:</strong>
                                            </div>

                                            <div style="width:80%;float:left;"> 1900 10000</div>
                                        </div>

                                        <div style="width:100%;">
                                            <div style="width:50%;float:left;">
                                                <strong>Email:</strong>
                                            </div>

                                            <div style="width:92%;float:left;"> info@14T1.com</div>

                                            <div style="width:92%;float:left;">
                                                <strong>Người liên lạc:</strong>
                                              </div>
                                              <div style="width:80%;float:left;"> Trần Nguyễn Thành Luân - Giám đốc truyền thông (Mobile:&nbsp;0906008368)</div>
                                                

                                            <div style="width:92%;float:left;">&nbsp;</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-form-contact hidden-sm hidden-xs">
                                
                                    <div class="title">Thông tin liên hệ</div>

                                    <div class="panel-body">
                                    <?php if(isset($_GET['msg'])) { ?>
                                    <?php if($_GET['msg'] == "addsuccess") { ?>
                                        <div class="alert alert-success" role="alert">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="fa fa-times"></i>
                                         </button>
                                        Gửi liên hệ thành công 
                                        </div>
                                    <?php } }?>
                            <div class="col-lg-12">
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
                                      <label for="">Họ và tên</label>
                                      <input type="text" class="form-control" required="required" id="fullname" name="fullname" placeholder="Nhập họ tên">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Email</label>
                                      <input type="email" class="form-control" required="required" id="email" name="email" placeholder="Nhập email">
                                  </div>
                                  <div class="form-group">
                                      <label for="">Số điện thoại</label>
                                      <input type="text" class="form-control" required="required" required="required" id="phone" name="phone" placeholder="Nhập số điện thoại">
                                  </div>
                                   <div class="form-group">
                                      <label for="">Tin nhắn</label>
                                      <textarea name="detail" id="detail" required="required" class="form-control" rows="10" placeholder="Nhập tin nhắn"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-info" name="submit">Gửi</button>
                                  <button type="reset" class="btn btn-info" name="reset">Nhập lại</button>
                              </form>
                           </div>
                                <div class="clearfix"></div>

                            </div>

                        </section>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <!--end page-wrapper-->
        <div class="clearfix"></div>

        <div class="clearfix"></div>

    </div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/footer.php'; ?>