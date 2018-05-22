<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/header.php'; ?>
<div class="xmove">
 
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
						<a itemprop='item' style='z-index:9' href='search.php'>
							<span itemprop='name'>Tìm kiếm</span>
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
				<div class="sb-search right5">
				<label for="">Nhập tiêu đề bài viết cần tìm:</label>
				<form class="" method="post" >
								
    				<input class="sb-search-input "  placeholder="Tìm kiếm ..."  type="text" value="" name="search" id="search">
    				<button type="submit"><i class="fa fa-search"></i></button>
    									
    			</form>
				</div><br/>

		<?php
        if(isset($_POST['submit'])){
            if( empty($_POST['search'])){
                $tb="Nhập vào từ khóa cần tìm!";
        		}

        	else {

		?>
		<div class="adv-table">
            <table  class="display table table-bordered table-striped" id="table">
              <thead>
              <tr>
                  <th>ID</th>
                  <th>Tiêu đề</th>
                  <th>Danh mục</th>
                  <th>Ngày đăng</th>
                  <th>Người đăng</th>
                  <th>Hình ảnh</th>
                  
              </tr>
              </thead>
              <tbody>

		<?php
			$key = $_POST['search'];
			$key2 = '%' + $key + '%';
            $sql = "SELECT * FROM new INNER JOIN category ON new.id_cat = category.id_cat INNER JOIN user ON new.id_user = user.id_user WHERE title LIKE '{$key2}' ";
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
                $name_cat = $arrNew['name'];                    
                $name_user = $arrNew['fullname'];
                $date = $arrNew['date'];
                $i++;
        
		?>
			<tr class="gradeA">
                  <td><?php echo $i ?></td>
                  <td><?php echo $title ?></td>
                  <td><?php echo $name_cat ?></td>
                  <td><?php echo $date ?></td>
                  <td><?php echo $name_user ?></td>
                  <td><img src="/hoian/uploads/images/news/<?php echo $picture ?>" alt="<?php echo $title ?>" height="80" width="180"></td>
                 
            </tr>
			<?php
                }
			}
		}}
        ?>

				
					
								<div class="clearfix"></div>


							</div>

						</div>

					</div>

				</div>
			</div>





			<div class="clearfix"></div>
		</div><br/><br/><br/><br/>
		<!--end page-wrapper-->
		<div class="clearfix"></div>
		<br/><br/><br/><br/>
		<div class="clearfix"></div>

	</div>
</div>

<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/footer.php'; ?>