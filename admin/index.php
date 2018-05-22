<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/top_bar.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/left_bar.php'; ?>
<?php
    $sql = "SELECT count(id_user) FROM user ";
    $query = $conn->query($sql);
    $user = mysqli_fetch_assoc($query);
    $n_user = $user['count(id_user)'];

    $sql2 = "SELECT count(id_new) FROM new ";
    $query2 = $conn->query($sql2);
    $new = mysqli_fetch_assoc($query2);
    $n_news = $new['count(id_new)'];

    $sql3 = "SELECT count(id_photo) FROM photo ";
    $query3 = $conn->query($sql3);
    $photo = mysqli_fetch_assoc($query3);
    $n_photo = $photo['count(id_photo)'];

    $sql4 = "SELECT count(id_contact) FROM contact ";
    $query4 = $conn->query($sql4);
    $contact = mysqli_fetch_assoc($query4);
    $n_contact = $contact['count(id_contact)'];
?>    
 <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
               <?php if(isset($_GET['msg'])) { ?>
                              <?php if($_GET['msg'] == "loginsuccess") { ?>
                              <div class="alert alert-success" role="alert">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
                                  Đăng nhập thành công 
                              </div>
                              <?php }?>
                  <?php }?>            
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                                  <?php echo $n_user?>
                              </h1>
                              <p>Users</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                              <?php echo $n_news?>
                              </h1>
                              <p>Bài viết</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                              <?php echo $n_photo?>
                              </h1>
                              <p>Hình ảnh</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                              <?php echo $n_contact?>
                              </h1>
                              <p>Liên hệ</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              
              
              <div class="row">
                  <div class="col-lg-8">
                      <!--timeline start-->
                      <section class="panel">
                          <div class="panel-body">
                                  <div class="text-center mbot30">
                                      <h3 class="timeline-title">Bài tập lớn môn Công nghệ Web</h3>
                                      
                                  </div>
                                  <div class="text-center mbot30">
                                        <p class="t-info">Đề tài</p>
                                      <p class="t-info">Website giới thiệu Hội An</p>
                                  </div>
                                  <div class="text-center mbot30">
                                        <p class="t-info">Sinh viên thực hiện</p>
                                      <p class="t-info">Trần Nguyễn Thành Luân - Nguyễn Khoa Quang</p>
                                  </div>
                                  <div class="text-center mbot30">
                                        <p class="t-info">Mã SV</p>
                                      <p class="t-info">102140026 - 102140036</p>
                                  </div>

                                  <div class="clearfix">&nbsp;</div>
                              </div>
                      </section>
                      <!--timeline end-->
                  </div>
                  <div class="col-lg-4">
                      <!--revenue start-->
                      <section class="panel">
                          <div class="revenue-head">
                              <span>
                                  <i class="fa fa-bar-chart-o"></i>
                              </span>
                              <h3>Phân công công việc</h3>
                              <span class="rev-combo pull-right">
                                 
                              </span>
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-lg-6 col-sm-6 text-center">
                                      <div class="easy-pie-chart">
                                          <div class="percentage" data-percent="50"><span>50</span>%</div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-6">
                                      <div class="chart-info chart-position">
                                          <span class="increase"></span>
                                          <span>Luân</span>
                                      </div>
                                      <div class="chart-info">
                                          <span class="decrease"></span>
                                          <span>Quang</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                      </section><br/><br/><br/><br/>
                      <!--revenue end--><br/><br/><br/><br/><br/>
                      <!--features carousel start-->
                      <br/><br/><br/><br/>
                      <!--features carousel end-->
                  </div><br/><br/><br/><br/>
              </div>
             
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/admin/inc/footer.php'; ?>