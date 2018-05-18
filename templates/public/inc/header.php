<?php require_once $_SERVER['DOCUMENT_ROOT'].'/hoian/library/ConnectDatabaseLibrary.php' ?>
<?php ob_start();?>
<?php session_start();?>

<!DOCTYPE html>
<html lang="vi">
<head>

<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="vi" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
<meta name="keywords" content="Ấn Tượng Hội An," />
<meta name="description" content="Ấn Tượng Hội An" />
<meta name="author" content="" />
<meta name="copyright" content="" />
<meta name="robots" content="noodp,index,follow" />
<meta name="DC.title" content="" />
<meta name="ICBM" content="" />
<meta name='revisit-after' content='1 days' />

<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '641061426224786');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=641061426224786&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code --><!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115741582-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115741582-1');
</script>

<meta property="og:type"   content="website" /> 
<meta property="og:title" content="Ấn Tượng Hội An" />

<meta property="og:image" content="https://hoianimpression.vn/thumb/600x315/3/upload/images/1525666728.jpg" />

<meta property="og:description" content="Ấn Tượng Hội An" />
<meta property="og:site_name" content="Ấn Tượng Hội An" />
<title>Ấn Tượng Hội An</title>
<!-- <script>var base_url = 'https://hoianimpression.vn';  </script> -->

<link rel="shortcut icon" type="image/ico" href="/hoian/templates/public/assets/img/hoian-icons.png" />
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=vietnamese" rel="stylesheet">
<script src="/hoian/templates/public/global/lang.json" type="text/javascript"></script>
<script src="/hoian/templates/public/assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="/hoian/templates/public/assets/js/countdown.js"></script>

<link href="/hoian/templates/public/assets/css/normalize.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/bootstrap/bootstrap.min.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/jquery.fancybox.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/owl.theme.default.min.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/owl.carousel.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/animate.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/nprogress.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/jquery.notify.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/fonts/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/fonts/animation.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/fonts/fontello.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/select2.min.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/css/rp-menu.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/plugins/jquery.bxslider.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/css/index.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/css/style.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/css/xx.css" type="text/css" rel="stylesheet" />
<link href="/hoian/templates/public/assets/css/contact.css" type="text/css" rel="stylesheet"/>
<link href="/hoian/templates/public/assets/css/event.css" type="text/css" rel="stylesheet"/>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TVZ75WW');</script>
<!-- End Google Tag Manager -->

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0; url=https://hoianimpression.vn/detect.html" />
	<script type="text/javascript">
	/* <![CDATA[ */
	window.top.location = 'https://hoianimpression.vn/detect.html';
	/* ]]> */
	</script>
<![endif]-->
<style>
footer {
    background: url(/hoian/templates/public/assets/img/bg-footer-mobile.png) #e5e5e5 no-repeat;
    background-size: 100%;
 }
</style>
</head>
<body class="status js-status index"  itemscope itemtype=http://schema.org/WebPage> 

		<a href="" class="back-to-top"><img src="/hoian/templates/public/assets/img/top.png"></a>
		
		<style>
header .top-search .dropdown button {
    padding: 7px 0 8px 0;
}
</style>
<header>
	<div class="rel">
    <div class=" container">
	
	<div class="header-content-menu">
		
			<div class="row">
				<div class="logo">
					<div class="top-logo pull-left visible-sm visible-xs">
						<a href="/hoian" title="Home"><img class="header img-responsive "  src="/hoian/templates/public/assets/img/logo-hoian-15.png" /></a>
					</div>
					<div class="top-logo hidden-sm hidden-xs">
						<a href="/hoian" title="Home"><img class="header img-responsive "  src="/hoian/templates/public/assets/img/logo-hoian-15.png" /></a>
					</div>
				
				<div class="clearfix"></div>
				
				
				</div>	
				<div class="right-of-header hidden-sm hidden-xs">
				<div class="col-md-7  col-sm-8 col-xs-12 " style="position:static">
					 
<nav class="hidden-xs hidden-sm">
<div>
	<ul id="main-nav">
		<li  class=" "	><a href="discover.html" title="Khám phá">Khám phá</a></li>
		<li  class=" "	><a href="event.html" title="Sự kiện">Sự kiện</a></li>
		<li><a href="http://booking.hoianimpression.vn/" title="Đặt vé">Đặt vé</a></li>
		<li  class=" "	><a href="map.html" title="Bản đồ">Bản đồ</a></li>
		<li  class=" "	><a href="contact.php" title="Liên hệ">Liên hệ</a></li>
	</ul>
	<div class="clearfix"></div>
</div>
	
	
</nav>

						<div class="clearfix"></div>

				</div>
				<div class="col-md-5 pull-right top-search">
					
					<div class="button_search">
    					<span class="rel">
    						<a class="dangky-dangnhap show-search-form" href="javascript:toggleSearch()"><img src="/hoian/templates/public/assets/img/icon-search.svg" style="width: 1em;"></a>
    						
    							<div id="sb-search" class="sb-search right5" style="padding: 0 15px;">
    									<form class="cform" name="searchForm" method="post" autocomplete="off">
    									
    											<input class="sb-search-input "  placeholder="Tìm kiếm ..."  type="text" value="" name="search" id="search">
    											<button type="submit"><i class="fa fa-search"></i></button>
    									
    									</form>
    								</div>
    						
    					</span>
    				</div>
					<div class="regis">
					<a href="login.php" target="_link" class="dangky-dangnhap">Đăng nhập</a>
					</div>
					<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle langua" type="button" data-toggle="dropdown">
						  Tiếng Việt						  
						  <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
							<li><a href="?com=ngonngu&lang=en">English</a></li><li><a href="?com=ngonngu&lang=jp">Japanese</a></li><li><a href="?com=ngonngu&lang=ko">Korean</a></li><li><a href="?com=ngonngu&lang=cn">Chinese</a></li>						  </ul>
					</div>
					<div class="clearfix"></div>

				</div>
				<div class="clearfix"></div>
				</div>
				
				
				
				<div class="clearfix"></div>
			</div>
			
				<div class="menu btn15 visible-xs visible-sm" data-menu="15" style='height: 50px;top: 13%;;right: 5px;width: 40px;'>
					<div class="icon"></div>
				 </div>
	
	</div><!-- end header-content-menu -->
	
                      
     </div>
     </div>
       
   <div id="responsive-menu">
	<div class="search-mobile">
		<form class="cform" name="searchForm" method="post" autocomplete="off">
		
				<input class="sb-search-input "  placeholder="Tìm kiếm ..."  type="text" value="" name="search" id="search">
				<button type="submit"><img src="/hoian/templates/public/assets/img/icon-search.svg" style="width: 1em;"></button>
		
		</form>
	</div>
	<div class='toggle-search toggle' data-for="content">
		<span>MENU</span><i class="fa fa-angle-down pull-right"></i><div class="clearfix"></div>
	</div>
	<div class="content"></div>	
	<div class="login-link">
		<a href="http://booking.hoianimpression.vn/relogin?redirect=/member/bookings" target="_blank">Đăng nhập</a>
		<!--<a href="http://booking.hoianimpression.vn/BookingSite/register" target="_blank">Đăng ký</a>-->
	</div>
	<div class='toggle-search toggle' data-for="lang">
		<span>Ngôn ngữ</span><i class="fa fa-angle-down pull-right"></i><div class="clearfix"></div>
	</div>
	<div class="lang">
		<ul>
	<li class="active"><a href="?com=ngonngu&lang=vi">Tiếng Việt</a></li><li class=""><a href="?com=ngonngu&lang=en">English</a></li><li class=""><a href="?com=ngonngu&lang=jp">Japanese</a></li><li class=""><a href="?com=ngonngu&lang=ko">Korean</a></li><li class=""><a href="?com=ngonngu&lang=cn">Chinese</a></li>		</ul>
		
	</div>	
	<div class="clearfix"></div>
</div>
	
</header>	