<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/header.php'; ?>
<div class="xmove">
<?php
  if(isset($_GET['idNews'])){
    $id_news = $_GET['idNews'];
    $sql = "SELECT * FROM new INNER JOIN category ON new.id_cat = category.id_cat INNER JOIN user ON new.id_user = user.id_user WHERE id_new = '{$id_news}'";
    $query = $conn->query($sql);
    $news = mysqli_fetch_assoc($query);
	$title = $news['title'];
	$id_cat = $news['id_cat'];
	$name_cat = $news['name'];
	$name_user = $news['fullname'];
	$piture = $news['picture'];
	$detail = $news['detail'];
	$date = $news['date'];
  }
?> 
	<div id="my-breadcrumbs" class="">
		<div class="container">
			<div class="row">
				<ul itemscope itemtype="http://schema.org/BreadcrumbList">
					<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
						<a itemprop='item' style='z-index:10' href='index.php'>
							<span itemprop='name'>Trang chủ</span>
						</a>
						<meta itemprop='position' content='1' />
						<span class='sperate'></span>
					</li>
					<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
						<a itemprop='item' style='z-index:9' href='cat.php?idCat=<?php echo $id_cat ?>'>
							<span itemprop='name'><?php echo $name_cat ?></span>
						</a>
						<meta itemprop='position' content='2' />
						<span class='sperate'></span>
					</li>
					<li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem'>
						<a itemprop='item' style='z-index:7' href='news.php?idNews=<?php echo $id_news ?>'>
							<span itemprop='name'><?php echo $title ?></span>
						</a>
						<meta itemprop='position' content='4' />
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
				
				<div class="container">
					<div class="row">
						<div class="left-event">
							<div class="news-content">
								<div class="event-content">
									
									<div class="header">
										<h1><?php echo $title ?></h1>
										<div class='clearfix'></div>
									</div>

									<div class="content">
										<?php echo $detail ?>
										<br />

										<div class="clearfix date_user">
											<img src="/hoian/templates/public/assets/img/icon-date.svg" />
											<span><?php echo $date ?></span>
											<img src="/hoian/templates/public/assets/img/icon-user.svg" />
											<span>Người đăng: <?php echo $name_user ?></span>
										</div>



										<div class="clearfix">
											<div style="max-height:50px;overflow:hidden;padding:0px 10px">
												<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53a83dd63e4b5e75"></script>
												<div class="addthis_native_toolbox"></div>
											</div>
										</div>

										<div class="clearfix comment-wrap visible-sm visible-xs">
											<div class="title">
												Bình luận </div>
											<div id="fb-root"></div>
											<script>(function (d, s, id) {
													var js, fjs = d.getElementsByTagName(s)[0];
													if (d.getElementById(id)) return;
													js = d.createElement(s); js.id = id;
													js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=580130358671180&version=v2.3";
													fjs.parentNode.insertBefore(js, fjs);
												}(document, 'script', 'facebook-jssdk'));</script>
											<div class="fb-comments" data-href="https://hoianimpression.vn:443/event/rat-nhieu-tam-huyet-da-duoc-don-vao-chuong-trinh-ky-uc-hoi-an-102.html"
											 data-order-by="reverse_time" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

										</div>

										<div class="other-event">
											<div class="title no-border">
												<span>Tin liên quan</span>
											</div>
											<div class="list">
												<div class="owl-carousel owl-other-event">												
													<?php 
														$sql2 = "SELECT * FROM new WHERE id_cat = '{$id_cat}' ORDER BY id_new DESC LIMIT 3";
														$query2 = $conn->query($sql2);
														$link2 = $query->num_rows ;
														if($link2 > 0){
															while($arrNew = mysqli_fetch_assoc($query2)){
															$id_news2 = $arrNew['id_new']; 
															$title2 = $arrNew['title'];                     										
															$picture2 = $arrNew['picture']; 					
													?>
													<div class="item">
														<div class="image">
															<a href="news.php?idNews=<?php echo $id_news2 ?>" title="<?php echo $title2 ?>">
																<img src="/hoian/uploads/images/news/<?php echo $picture2 ?>" class="img-max"
																 alt="<?php echo $picture2 ?>" />
															</a>
														</div>
														<div class="desc">
															<h3>
																<a href="news.php?idNews=<?php echo $id_news2 ?>" title="<?php echo $title2 ?>"><?php echo $title2 ?></a>
															</h3>											
														</div>
													</div>
													<?php
															}
														}
													?>
													
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<!-- end left-event -->
						<div class="right-event">
							<div class="title">
								Thể loại </div>
							<div class="recover-list-menu">
								<ul>
									<li >
										<a href="">
											<i class="fa fa-angle-right"></i>&nbsp; Tất cả</a>
									</li>
									<li class='active'>
										<a href="cat.php?idCat=<?php echo $id_cat ?>" title="<?php echo $name_cat ?>">
											<i class="fa fa-angle-right"></i></i>&nbsp; <?php echo $name_cat ?></a>
									</li>
									
								</ul>
							</div>
							<div class="clearfix"></div>
							<div class="comment-wrap">
								<div class="title">
									Bình luận </div>
								<div id="fb-root"></div>
								<script>(function (d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=580130358671180&version=v2.3";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));</script>
								<div class="fb-comments" data-href="https://hoianimpression.vn:443/news.php?idNews=<?php echo $id_news ?>"
								 data-order-by="reverse_time" data-width="100%" data-numposts="5" data-colorscheme="light"></div>

							</div>

						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- end container -->

			</div>

			<div class="clearfix"></div>
		</div>
		<!--end page-wrapper-->
		<div class="clearfix"></div>

		<div class="clearfix"></div>

	</div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/footer.php'; ?>