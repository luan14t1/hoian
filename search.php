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
				<div class="form-group">
    				<input class="form-control" placeholder="Tìm kiếm ..."  type="text" id="search" name="search">
    			</div>
				</div><br/>
	            <div class="row" id="data">
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
<script type="text/javascript">
$(document).ready(function() {
$("#search").keyup(function(){
      var key = $("#search").val();
      $.ajax({
        url: 'searchController.php',
        type: 'post',
        data: {
            key: key
        },
        success: function( data ) {
            $("#data").html(data);
        }
        });
    })

});
</script>
<?php require_once $_SERVER['DOCUMENT_ROOT']. '/hoian/templates/public/inc/footer.php'; ?>
