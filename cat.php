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
								// BƯỚC 2: TÌM TỔNG SỐ RECORDS
								$sql2 = "select count(id_new) as total from new where id_cat = '{$id_cat}' ";
    							$query2 = $conn->query($sql2);
								
								$row = mysqli_fetch_assoc($query2);
								$total_records = $row['total'];
						 
								// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
								$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
								$limit = 6;
						 
								// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
								// tổng số trang
								$total_page = ceil($total_records / $limit);
						 
								// Giới hạn current_page trong khoảng 1 đến total_page
								if ($current_page > $total_page){
									$current_page = $total_page;
								}
								else if ($current_page < 1){
									$current_page = 1;
								}
						 
								// Tìm Start
								$start = ($current_page - 1) * $limit;
								
								
								// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
								// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
								$sql3 = "SELECT * FROM new WHERE id_cat = '{$id_cat}' && status = 1 LIMIT $start, $limit";
								$query3 = $conn->query($sql3);
								$link = $query3->num_rows;
								if($link > 0){
									while ($row2 = mysqli_fetch_assoc($query3)){
										$id_new = $row2['id_new']; 
										$title = $row2['title'];                     										
										$picture = $row2['picture']; 
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
		<?php
			 if ($total_page > 1){
		?>
			<ul class="pagination">
           <?php 
            // PHẦN HIỂN THỊ PHÂN TRANG
            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
				//echo '<a href="cat.php?idCat='.($id_cat).'&page='.($current_page-1).'">Prev</a> | ';
				
			?>
			<li><a href="cat.php?idCat=<?php echo $id_cat?>&page=<?php echo $current_page-1?>">«</a></li>
			<?php
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
				   // echo '<span>'.$i.'</span> | ';
			?>
			<li class='active'><a href="#"><?php echo $i?></a></li>
			
			<?php
                }
                else{
					//echo '<a href="cat.php?idCat='.($id_cat).'&page='.$i.'">'.$i.'</a> | ';
					
			?>
			<li ><a href="cat.php?idCat=<?php echo $id_cat?>&page=<?php echo $i?>"><?php echo $i?></a></li>
			<?php
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1){
			   // echo '<a href="cat.php?idCat='.($id_cat).'&page='.($current_page+1).'">Next</a> | ';
			?>
			<li><a href="cat.php?idCat=<?php echo $id_cat?>&page=<?php echo $current_page+1?>" aria-label="Next">»</a></li>
			<?php
			}
		}
           ?>
		   </ul>
       

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