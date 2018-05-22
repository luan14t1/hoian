<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/header.php'; ?>
<div class="xmove">
<?php
  if(isset($_GET['idCat'])){
    $id_cat = $_GET['idCat'];
    $sql = "SELECT * FROM category WHERE id_cat = '{$id_cat}'";
    $query = $conn->query($sql);
    $category = mysqli_fetch_assoc($query);
    $name = $category['name'];
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
							<span itemprop='name'><?php echo $name ?></span>
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
				<div class="container">


					<div class="row hidden-sm hidden-xs">
						<div class="global-title event">
							<h1 class="tittle_event"><?php echo $name ?></h1>
						</div>
						<div class="recover-list">
							
						</div>
						<div class="list-discover">
							<div class="row">
								<br/>
								<div class="clearfix"></div>
								<?php 
									$sql = "SELECT * FROM new WHERE new.id_cat = '{$id_cat}' ";
									$query = $conn->query($sql);
									$link = $query->num_rows ;
									if($link > 0){
										$i = 0;
										while($arrNew = mysqli_fetch_assoc($query)){
										$id_new = $arrNew['id_new']; 
										$title = $arrNew['title'];                     										
										$picture = $arrNew['picture']; 						
										$i++;	
								?>
								<div class="col-md-4 col-xs-12">
									<div class="item-mini">
										<div class="img">
											<a href="news.php?idNews=<?php echo $id_new ?>" title="<?php echo $title ?>">
												<img src="/hoian/uploads/images/news/<?php echo $picture ?>" title="<?php echo $title ?>"/>
											</a>
										</div>
										<div class="desc">
											<h2>
												<a href="news.php?idNews=<?php echo $id_new ?>" title="<?php echo $title ?>"><?php echo $title ?></a>
											</h2>
										</div>
									</div>
								</div>
								<?php
                						}
             						}
             					 ?>
						
								<div class="clearfix"></div>


							</div>

						</div>

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