<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/header.php'; ?>

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

                        <section id="contact">

                            <div class="left-map">
                                <div class="map-contact">
                                    <div class="video-wrapper">
                                        <iframe src="https://hoianimpression.vn/map.php?info=1"></iframe>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-container container" style="">

                                <div class="left-form-contact pull-right hidden-sm hidden-xs">
                                    <div class="title">Liên hệ chúng tôi</div>
                                    <div class="fix-title">
                                        <div style="width:100%;">
                                            <div style="width:7%;float:left;">
                                                <strong>A:</strong>
                                            </div>

                                            <div style="width:92%;float:left;">Cồn Hến (200 Nguyễn Tri Phuơng rẽ trái), P.Cẩm Nam, TP.Hội An</div>
                                        </div>

                                        <div style="width:100%;">
                                            <div style="width:20%;float:left;">
                                                <strong>Hotline:</strong>
                                            </div>

                                            <div style="width:80%;float:left;">1900 636600 or 0904 6336600</div>
                                        </div>

                                        <div style="width:100%;">
                                            <div style="width:7%;float:left;">
                                                <strong>E:</strong>
                                            </div>

                                            <div style="width:92%;float:left;">info@hoianimpression.vn</div>

                                            <div style="width:92%;float:left;">
                                                <strong>Người liên lạc</strong>: Bà Đỗ Thị Hoà - Giám đốc truyền thông (Mobile:&nbsp;0906008368)</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>

                                            <div style="width:92%;float:left;">&nbsp;</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="right-form-contact hidden-sm hidden-xs">
                                    <?php if(isset($tb)) { ?>
                                    <div class="alert alert-block alert-danger fade in">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <?php  echo $tb?>
                                    </div>
                                    <?php }?>
                                    <div class="title">Thông tin liên hệ</div>

                                    <form method="post" name="frm">


                                        <div class="row-5">
                                            <div class="col-xs-12 col-md-4  col-5 inputx">

                                                <input name="fullname" type="text" required class="form-control" id="fullname" value="" placeholder="Họ tên" size="40" />

                                            </div>
                                            <div class="col-xs-12 col-md-4  col-5 inputx">

                                                <input name="phone" type="text" required class="form-control" id="phone" value="" placeholder="Điện thoại" size="40" />

                                            </div>

                                            <div class="col-xs-12 col-md-4 col-5 inputx">

                                                <input name="email" id="email" type="text" required class="form-control" value="" placeholder="Email" size="40" />

                                            </div>

                                            <div class="clearfix"></div>

                                        </div>



                                        <div class="clearfix"></div>

                                        <div class="inputx">
                                            <textarea placeholder="Tin nhắn" name="detail" class="form-control" id="detail" cols="35" rows="5" value=""></textarea>
                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="inputx">

                                            <input class="button" type="submit" value="Gửi" />
                                            <div class="clearfix"></div>
                                        </div>

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

<?php
            if(isset($_POST['submit'])){
              if( empty($_POST['fullname']) || empty($_POST['phone']) || empty($_POST['email']) ||  empty($_POST['detail']) ){
                  $tb="Nhập vào đầy đủ các trường!";
        }
        
        else {
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $detail = $_POST['detail'];
            
           
            $sql="INSERT INTO contact(fullname,phone,email,detail) VALUES('{$fullname}','{$phone}','{$email}','{$detail}')";
            $query = $conn->query($sql);
            if($query){
                header('location: /hoian/contact');
            } 
            else $tb = "Lỗi Thêm thất bại";     
        }
    }
    ?>

<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/footer.php'; ?>