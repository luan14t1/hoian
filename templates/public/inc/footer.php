	<footer>
	<div class="container">
		<div class="row footer-hoian hidden-sm hidden-xs">
				<div class="col-xs-12 col-md-7">
				<div class="logo">
					<a href=""><img src="/hoian/templates/public/assets/img/logo-hoian-15.png" alt="Logo" /></a>
				</div>
				<div class="slogan">
				© 2018 Website giới thiệu Hội An<br/>All rights reserved | Design by Quang & Luân				
				</div>
				</div>
				<div class="pull-right info">
				
					<div class="info_item"><i class="fa fa-map-marker"></i><div class="info_diachi">Phố cổ Hội An</div></div>
					<div class="info_item"><i class="fa fa-phone"></i>1900 100có </div>
					<div class="info_item"><i class="fa fa-facebook-official"></i>&nbsp;<a href="https://www.facebook.com/quangnk23496" target="_blank" title="facebook">antuonghoian</a></div>

					<!--<div class="info_item"><i class="fa fa-facebook-official"></i>&nbsp;<a href="antuonghoian" target="_blank" title="facebook">antuonghoian</a></div>-->
					<br/><br/>
					<a href="map.php" class="google-map">Google Map</a>
					
				
				</div>
				<div class="clearfix"></div>
		</div>
	</div>	
</footer>	
	
		

<script  defer="defer" src="/hoian/templates/public/assets/plugins/nprogress.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/plugins/wow.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/plugins/jquery.fancybox.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/plugins/owl.carousel.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/plugins/jquery.notify.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/plugins/select2.full.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/js/less-1.7.3.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/plugins/jquery.bxslider.min.js" type="text/javascript"></script>
<script  defer="defer" src="/hoian/templates/public/assets/js/script.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$(document).keydown(function(event) {
	    	    if (event.ctrlKey==true && (event.which == '61' || event.which == '107' || event.which == '173' || event.which == '109'  || event.which == '187'  || event.which == '189'  ) ) {
         alert('Disabling Zooming'); 
		event.preventDefault();
		// 107 Num Key  +
		//109 Num Key  -
		//173 Min Key  hyphen/underscor Hey
		// 61 Plus key  +/=
	     }
	});

	$(window).bind('mousewheel DOMMouseScroll', function (event) {
	       if (event.ctrlKey == true) {
           alert('disabling zooming'); 
		   event.preventDefault();
	       }
	});
});
</script>


<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TVZ75WW" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->


</body>
</html>
<?php ob_flush();?>