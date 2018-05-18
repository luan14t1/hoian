/*progressively.init({
  delay: 50,
  throttle: 300,
 
});*/
var $ftime = 600;
$.fn.outerHTML = function() {
    var $t = $(this);
    if ($t[0].outerHTML !== undefined) {
        return $t[0].outerHTML;
    } else {
        var content = $t.wrap('<div/>').parent().html();
        $t.unwrap();
        return content;
    }
};
 new WOW().init();





function toggleSearch(){
	if($("#sb-search").is(":visible")){
		$("#sb-search").hide();
	}else{
		$("#sb-search").show();
	}
}


function initRpMenu(){
		
		$menu = $("#main-nav").clone();
		$menu.removeAttr("id");
		$menu.find(".no-index").remove();
		$("#responsive-menu .content").append($menu);
		$("#responsive-menu .content").append('<div class="clearfix"></div>');
		$menu = $("#responsive-menu .content ul");
		$menu.find("li").each(function(){
			if($(this).find("ul").length){
				$(this).addClass("has-child");
				$(this).find("a").first().append("<span class='toggle-menu'><i class='glyphicon glyphicon-menu-down'></i></span>");
			}
		})
		$("#responsive-menu .toggle-menu").click(function(){
				$(this).find("i").toggleClass("glyphicon-menu-down");
				$(this).find("i").toggleClass("glyphicon-menu-up");
			if(!$(this).hasClass("active")){
				$(this).parent().parent().find("ul").first().slideDown();
				$(this).addClass("active");
			}else{
				$(this).parent().parent().find("ul").first().slideUp();
				$(this).removeClass("active");
			}
			return false;
		})
		
		$(".menu.btn15").click(function(){
			
			
			$(this).toggleClass("open");
			
			
			if($(this).hasClass("open")){
				$(".nav-right").fadeOut();
				$("#responsive-menu").fadeIn();
				
			}else{
				$(".nav-right").fadeIn();
				$("#responsive-menu").fadeOut();
			}
			$(this).fadeIn(function(){
				$("html").toggleClass("fixed");
				
			});
			
		})
		return false;

	

		
}
function setRaty() {
    if ($(".raty").length) {
        $(".raty").each(function() {
            path = $(this).data("big") ? 'images_big' : 'images';
            $(this).raty({
                path: 'assets/plugins/raty/' + path,
                score: $(this).data("score"),
				half:true	
            });
        })
    }
}

function initAjax(options) {
    var defaults = {
        url: '',
        type: 'post',
        data: null,
        dataType: 'html',
        error: function(e) {
            console.log(e)
        },
        success: function() {
            return false;
        },
        beforeSend: function() {},
    };
    var options = $.extend({}, defaults, options);
    $.ajax({
        url: options.url,
        data: options.data,
        success: options.success,
        error: options.error,
        type: options.type,
        dataType: options.dataType,
    })
}



function checkImageError() {
    $("img.image-thumb").attr("onerror", "this.onerror=null;this.src='images/no_photo.png'");
    $("img.image-thumb").each(function() {
        d = new Date();
        $(this).attr("src", $(this).attr("src") + "?" + d.getTime());
    })
}

function initBackToTop() {
    $(window).scroll(function() {
        if ($(window).scrollTop() != 0) {
            $(".back-to-top").stop().animate({
                right: '25px',
                bottom: '25px'
            })
        } else {
            $(".back-to-top").stop().animate({
                right: '-60px',
                bottom: '-60px'
            });
        }
    });
    $(".back-to-top").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
}

function resetEmptyContent() {
    $(".empty-content").each(function() {
        $w = $(this).find("span").width() + 70;
        $(this).width($w);
    })
}

function initMenu() {
    $("#main-nav").css({
        "opacity": "0"
    });
    $("ul#main-nav li").css({
        overflow: "hidden"
    });
    $("ul#main-nav li *").attr("style", "");
    $w = 0;
    $sl = 0;
    $("#main-nav > li").each(function() {
        $(this).find("a").css({
            "padding-left": "0",
            "padding-right": "0"
        });
        $w += $(this).outerWidth();
        $sl++;
    })
    $win = $("nav #main-nav").width();
    $sprt = $win;
    $pad = (($sprt / $sl));
    $xx = 0;
    $("#main-nav > li > a").each(function() {
        $padx = (($pad - $(this).width()) / 2) - 5;
        $(this).css({
            "padding-left": $padx,
            "padding-right": $padx
        });
    })
    $("#main-nav").css({
        "opacity": "1"
    });
    setTimeout(function() {
        $(".s-child").parent().addClass("s");
        $(".title-link").click(function() {
            $(this).next().slideToggle();
            return false;
        })
        $("#main-nav  li.f").each(function() {
            if ($(this).find("ul").length) {
                $obj = $(this).find("ul").first();
                $w = $obj.find("li.t").first().find("a").width();
                $obj.find("li.t").each(function() {
                    if ($(this).find("a").width() > $w) {
                        console.log($(this).find("a").width());
                        $w = $(this).find("a").width();
                    }
                })
                $obj.css({
                    "width": $w + 20,
                    "display": "none",
                    "position": "absolute"
                });
            }
        });
        $("#main-nav  li.f").parent().addClass("x");
        $("#main-nav  li").each(function() {
            if ($(this).find("ul").length) {
                $obj = $(this).find("ul.x").first();
                $w = $obj.find("li.f").first().find("a").width();
                $obj.find("li.f").each(function() {
                    if ($(this).find("a").width() > $w) {
                        $w = $(this).find("a").width();
                    }
                })
                $obj.css({
                    "width": $w + 20,
                    "display": "none",
                    "position": "absolute"
                });
            }
        });
        $("#main-nav  li").css({
            overflow: "inherit"
        });
    }, 1000);
}

function setList() {
    $w = 0;
    $max = $(".container").width();
    var $stt = 0;
    $(".top-footer .menu ul li a").each(function() {
        $stt++;
        $w += $(this).width();
    })
    $pd = (($max - $w) / $stt) / 2;
    $(".top-footer .menu ul").width($max);
    $(".top-footer .menu ul li").css({
        "padding": "0 " + $pd + "px"
    });
}

function setCenterTitle() {
    setTimeout(function() {
        $(".global-title").each(function() {
            $core = $(this).find("h2");
            $core.css("padding", "0 30px");
            $core.removeClass("active");
            $core.css({
                float: "left",
                "margin": "auto"
            });
            $w = $core[0].clientWidth;
            $core.css({
                width: $w,
                "float": "none",
                "padding": 0
            });
            $core.addClass("active");
        })
    }, 200);
}

function initQuickView() {
    $(".quick-view-product").click(function() {
        $href = $(this).attr("href");
        $.fancybox({
            href: $href,
            type: "ajax",
            autoSize: false,
            width: 900,
            height: 900,
            afterShow: function() {
                initShowTooltip();
            }
        })
        return false;
    })
}

function initOpenFormMember() {
    $(".open_form").click(function() {
        if (!$("#form_member").length) {
            $("body").append("<div id='form_member' class=''></div>");
        }
        $.post(base_url + "/thanh-vien/open-form.html", {
            type: $(this).data("type")
        }, function(data) {
            $("#form_member").html(data);
            $("#form_member").append("<a href='' data-toggle='modal' id='tg_modal' data-target='#regestration'>bcddddddd</a>")
            $("#tg_modal").click();
            return false;
        });
        return false;
    })
}

function showMsg($type, $msg) {
    notify({
        type: $type,
        title: "Alert",
        message: $msg,
        position: {
            x: "right",
            y: "top"
        },
        icon: '<img src="assets/plugins/notify/images/paper_plane.png" />',
        size: "normal",
        overlay: false,
        closeBtn: true,
        overflowHide: false,
        spacing: 20,
        theme: "default",
        autoHide: true,
        delay: 2500,
        onShow: null,
        onClick: null,
        onHide: null,
        template: '<div class="notify"><div class="notify-text"></div></div>'
    });
}

function updateCart() {
    NProgress.start();
    $("#content-center").animate({
        opacity: ".9"
    });
    initAjax({
        url: "ajax/update-cart.html",
        data: $("#box-shopcart form").serialize(),
        success: function(data) {
            console.log(data);
            refreshCart();
        }
    })
}

function refreshCart() {
    $.post("gio-hang.html", function(data) {
        $("#box-shopcart").html(data);
        updateCartNumber();
        NProgress.done();
        $("#content-center").animate({
            opacity: 1
        });
        $('[data-toggle="tooltip"]').tooltip();
    })
}

function updateCartNumber() {
    $.post("ajax/get-cart-num.html", function(data) {
        $(".cart-num").html(data);
    })

}



	function setHeaderFixed(){
		
		//$("body").css({paddingTop:$("header").height()});
		$("header ").attr("data-height",$("header").height());
	
		
		function setFix(){
			
			$he = $("header ").data("height");
			if($(window).width() > 991){
			$w = $(window).scrollTop();
			if($w > $he){
				
				$("header ").addClass("fixed");
				
			}else{
				
				$("header ").removeClass("fixed");
				
			}
			
			}else{
					$("header ").removeClass("fixed");
			}
			
		}
		setFix();
		$(window).scroll(function(){
			setFix();
		})
	
}
function initXCarousel(){
		carousel = $(".owl-gallery-index");
		carousel.on('initialized.owl.carousel changed.owl.carousel', function(e) {
			if (!e.namespace)  {
			  return;
			}
			var carousel = e.relatedTarget;
			$('.slider-counter-1').text(carousel.relative(carousel.current()) + 1);
			$('.slider-counter-2').text(carousel.items().length);
		  }).owlCarousel({
			loop:true,
			margin:10,
			autoplay:false,
			nav:false,
			items:3,
			responsiveClass:true,
			responsive:{
				0:{
					items:3,
					margin:10,
				},
				768:{
					items:3,
					margin:20,
				},
				1000:{
					items:3,
					margin:20,
				}
			}
		})
		$(".right-gal-control,.left-gal-control").unbind("click");
		$(".right-gal-control").click(function(){
			
			 carousel.trigger('owl.next');
			 $(".owl-gallery-index .owl-next").trigger("click");
		})
		$(".left-gal-control").click(function(){
		
			 carousel.trigger('owl.prev');
			 $(".owl-gallery-index .owl-prev").trigger("click");
		})
}
function initIndex(){
	
	if($(".owl-gallery-index").length){
		setTimeout(function(){
			initXCarousel();
		},200);
		
	}
	
}


function initSearchForm(){
	$(".form-search,.cform").submit(function(){
							window.location.href="search.html/keyword="+$(this).find("input").val();
							return false;
						})
}
function initSlider(){
	if($("#camera_wrap_1").length){
	
		
		initDescSlider();
		$('#camera_wrap_1 ul').bxSlider({
			mode:'fade',
			auto:true,
			controls:false,
			pause:5000,
			pager:false,
			
			onSlideAfter: function () {
				initDescSlider();
			}
			
			
		});
		function initDescSlider(){
			$("#slider-camera-wrapper .slider-caption").css({opacity:0});
			
			$("#slider-camera-wrapper .slider-caption").each(function(){
				
				//$h = $(this).height();
				//$ph = $("#slider-camera-wrapper").height();
				//$per = ($ph - $h)/2;
				
				//$(this).css({top:$per+"px","opacity":1});
				$(this).css({"opacity":1});
				$(this).fadeIn();
			})
		}
	}
	
	if($("#camera_wrap_index").length){
	
		
		initDescSlider();
		$('#camera_wrap_1 ul').bxSlider({
			mode:'fade',
			auto:false,
			controls:false,
			pause:5000,
			pager:false,
			
			onSlideAfter: function () {
				initDescSlider();
			}
			
			
		});
		function initDescSlider(){
			$("#slider-camera-wrapper .slider-caption").css({opacity:0});
			
			$("#slider-camera-wrapper .slider-caption").each(function(){
				
				//$h = $(this).height();
				//$ph = $("#slider-camera-wrapper").height();
				//$per = ($ph - $h)/2;
				
				//$(this).css({top:$per+"px","opacity":1});
				$(this).css({"opacity":1});
				$(this).fadeIn();
			})
		}
	}
	
}
function initNewsletter(){
	
	$("#mail-form").submit(function(){
		$.ajax({
			url:"ajax/newsletter.html",
			data:{email:$(this).find("input").val()},
			type:"post",
			success:function(){
					alert("??ng ký nh?n b?n tin thành công!");
					$("#mail-form").trigger("reset");
			}
		})
		return false;
	})
}
function initVideoListCarousel(){
	if($(".video-list-carousel").length){
		$(".video-list-carousel").owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			responsiveClass:true,
			responsive:{
				0:{
					items:4,
					
				},
				600:{
					items:4,
				
				},
				1000:{
					items:5,
					
				}
			}
		})
		$(".video-list-carousel .item a").click(function(){
			$id = $(this).data("id");
			$target = $(".video-list-carousel-target").find("iframe");
			$target.attr("src","http://www.youtube.com/embed/"+$id+"?autoplay=1");
			return false;
		})
		
		$(".wrap-list-photo ul").bxSlider({
			
			captions: true,
			auto:true,
			pause:5000,
			pager:false,
		})
	}
}
function initLogo(){
	if( $("#flexiselDemo3").length){
	 $("#flexiselDemo3").flexisel({
				visibleItems:5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,            
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				
			});
	}
}
function initIndexHotline(){
	if($(".has-list-p").length){
		$(".has-list-p").each(function(){
			$w = $(this).find(".list").width()+10;
			$(this).find(".xhotline").width($w);
		})
	}
}
function initVideoController(){
	$("#video-control").change(function(){
		$("#iframe").attr("src","https://www.youtube.com/embed/"+$(this).val()+"?autoplay=1");								
	})
}
function initAdvanceSearch(){
	$("#adv-search").submit(function(){
		$url = "search.html/"+$(this).serialize();
		window.location.href=$url;
		return false;
	})
}
function initSendFeedBack(){
	$("#reg-form").submit(function(){
											$f = $(this);
											if(!$f.hasClass("sending")){
												$f.addClass("sending");
												$(this).find(".loading").animate({opacity:1});
												$.ajax({
													url:"ajax/send-email.html",
													data:$(this).serialize(),
													type:"post",
													success:function(data){
														alert("Gá»­i liÃªn há»‡ thÃ nh cÃ´ng");
														$f.trigger("reset");
														$f.removeClass("sending")
														$f.find(".loading").animate({opacity:0});
													}
												})
											}
											return false;
										})
}
function initMaxIndex(){
	if($(".owl-xmd").length){
		$(".owl-xmd").owlCarousel({
    loop:true,
    margin:30,
	autoplay:true,
	nav:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
          
        },
        600:{
            items:2,
            
        },
        1000:{
            items:4,
            
           
        }
    }
})
	}
}
function changeImageColor(){
	$(".showing-color .color-item").hover(function(){
		$i = $(this).data("img");
		
		$r = $(this).parents(".relative-image");
		$r.find(".color-item").removeClass("active");
		$(this).addClass("active");
		$target = $r.find("img.img-max");
		$target.addClass("loader");
		if(!$i){
			$i = $target.data("img-default"); 
		}
		$target.attr("src",$i);
		setTimeout(function(){
		$target.removeClass("loader");
		},500)
	})
}
function productFiter(){
	
	$(".size-box input:checked,.color-box input:checked").parents(".item").addClass("active");
	
	$("#product-search .item input").click(function(){
		$(this).parents(".item").toggleClass("active");
		if($(this).is(":checked")){
			$(this).attr("checked",true);
		}else{
			$(this).removeAttr("checked");
		}
		$("#form-filter").trigger("submit");
		
	})
	$("#product-search .price-line input[type=checkbox]").click(function(){
		
			$("#form-filter").trigger("submit");
		
		
	})
	$("#form-filter").submit(function(){
		$form = $(this);
		$("body").addClass("load");
		$url = $("#rel_url").val();
		filter = new Array();
		$(".color-box").find("input:checked").each(function(){
			filter.push($(this).val());
		})
		if(filter.length){
			$url+="&color="+filter.join(",");
		}
		
		filter = new Array();
		$(".price-box").find("input:checked").each(function(){
			filter.push($(this).val());
		})
		if(filter.length){
			$url+="&price="+filter.join(",");
		}
		
		filter = new Array();
		$(".size-box").find("input:checked").each(function(){
			filter.push($(this).val());
		})
		if(filter.length){
			$url+="&size="+filter.join(",");
		}
		
		$form.find("input[name=url]").val($url);
		NProgress.start();
		$.ajax({
			url:$("#rel_url").val(),
			data:$(this).serialize(),
			type:"post",
			dataType:"json",
			success:function(data){
				NProgress.done();
				$("body").removeClass("load");
				$("#product-wrap .row.inner").html(data.data);
				$("#product-wrap .paging-place").html(data.paging);
				changeImageColor();
				var stateObj = { status: "Change address bar" };
				history.pushState(stateObj, $(document).find("title").text(), $url);
			}
		})
		return false;
	})
	
}
function initPolling(){
	$("#polling-form .btn").click(function(){
		$("#polling-form").find(".action").val($(this).data("act"));
		$("#polling-form").trigger("submit");
		return false;
	})
	$("#polling-form").submit(function(){
		_error = false;
		$obj = $(this);
		$obj.find("button").attr({"disabled":"disabled"});
		$obj.find(".loading-spin").addClass("active");
		if($obj.find(".action").val()=="submit"){
			if(!$(this).find("input[type=radio]:checked").length){
				_error = true;
			}
		}
		if(_error){
			$obj.find("button").removeAttr("disabled");
			$obj.find(".loading-spin").removeClass("active");
			showMsg("error", _lang.error_poll);
		}else{
			NProgress.start();
			$.ajax({
				url:"ajax/polling.html",
				data:$(this).serialize(),
				type:"post",
				dataType:"json",
				success:function(data){
					$obj.find("button").removeAttr("disabled").fadeOut();
					$obj.find(".loading-spin").removeClass("active");
					$max = data[0].vote;
					$obj.find(".xline").fadeOut(500);
					setTimeout(function(){
						NProgress.done();
						total = 0;
						$.each(data,function(index,item){
							total+=parseFloat(item.vote);
							$obj.find(".poll-result .inner-result").append("<div class='poll-rs'><div class='poll-line' data-vote="+item.vote+" data-width='"+((item.vote/$max)*100)+"'></div><div class='name bold'>"+item.name+" </div><div class='name'>"+item.vote+" votes (<span class='percent'></span> %)</div></div>");
						})
						
						$(".inner-result .poll-line").each(function(){
							
							$(this).parent().find(".percent").html((Math.round(((parseFloat($(this).data("vote"))/total)*100) * 100) / 100));
							$(this).animate({width:$(this).data("width")+"%"},1500);
						})

					},500)
				}
			})
		}
		return false;
	})
}
function initVideoShow(){
	if($(".video-list.owl-carousel").length){
		$(".video-list.owl-carousel").owlCarousel({
        items:1,
		nav:true,
	
		navText:['<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>','<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>'],
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,

	})
}

}
function initAboutType2e(){
	if($("#production-capacity").length){
		$(".tab-control li").click(function(){
			$(".tab-control li").removeClass("active").removeClass("fadeInLeft");
			$(this).addClass("active");
			$tar = $(this).find("a").attr("href");
			
			$(".tab-manager .tab-content").addClass("fadeOutRight").removeClass("active");
			
			$(".tab-manager .tab-"+$tar).addClass("active fadeInLeft");
		
			return false;
		})
	}
}
function checkPageVisible(){
	
	$c = parseInt($(".current-paging").val());
	$t = parseInt($(".total-paging").val());
	if($t > 1 && $c < $t){
		$(".showing-page").show();
	}else{
		$(".showing-page").hide();
	}

}
function initPaging(checkPa){
	checkPageVisible();
	$(window).scroll(function(){
		
		if($(".paging-place").is(":visible")){
			if($(window).scrollTop() + 700 > $(".paging-place").offset().top){
				initAppendProduct();
				
			}
		}
	})
}
function initAppendProduct(){
		data = new Object();
		$(".product-filter select").each(function(){
			data[$(this).attr("name")] = $(this).val();
		})
		$total = parseInt($(".total-paging").val());
		$current = parseInt($(".current-paging").val());
		
		if($current < $total & !$("body").hasClass("load-paging")){
			$("body").addClass("load-paging");
			data.p = $current+1;
			$(".current-paging").val(data.p);
			$.ajax({
			url:current_url,
			data:data,
			type:"post",
			success:function(data){
				
				data = $("<div>"+data+"</div>");
				i=1;
				
				data.find(".item-product").each(function(){
						e = $(this);	
						
						$("#product-wrap .item-product").last().after(e.outerHTML());
						$("#product-wrap .item-product").last().delay(i*1000).hide().fadeIn();
						
				
					i++;
				})
				$("body").removeClass("load-paging");
				checkPageVisible();
			}
		})
		}
}
function productSearch(){
	$(document.body).on("change",".product-filter select",function(){
		data = new Object();
		$(".product-filter select").each(function(){
			data[$(this).attr("name")] = $(this).val();
		})
		
		$.ajax({
			url:current_url,
			data:data,
			type:"post",
			success:function(data){
				data = $("<div>"+data+"</div>");
				$("#product-wrap").html(data.find("#product-wrap").html());
				initPaging();
			}
		})
	});
	
}
$().ready(function() {
	initPaging();
	productSearch();
	initAboutType2e();
	initVideoShow();
	initPolling();
	productFiter();
	changeImageColor();
	initMaxIndex();
	initSendFeedBack();
	initAdvanceSearch();
	initVideoController();
	initIndexHotline();
	initLogo();
	initRpMenu();
	initVideoListCarousel();
	initSearchForm();
    
    setKeyPress();
	initIndex();
	initSlider();
	initNewsletter();
    //loadCus();
	//setHeaderFixed();
	setHeaderHotline();
})


function loadCus() {
    $("#email_sub").keyup(function() {
        loadCustomerInfo($(this));
    })
    $("#email_sub").change(function() {
        loadCustomerInfo($(this));
    })
}

function loadCustomerInfo($obj) {
    if ($("#user_id").val() == '') {
        if (validateEmail($obj.val())) {
            initAjax({
                url: "ajax/load-customer-info.html",
                data: {
                    email: $obj.val()
                },
                dataType: "json",
                success: function(data) {
                    if (data.stt) {
                        $.each(data.data, function($k, $v) {
                            $object = $("#form-payment ." + $k + "_");
                            if ($k == "district") {
                                loadDistrict($(".province_"), $('#district-list'), $v);
                            }
                            $object.val($v);
                        })
                    }
                }
            });
        }
    }
}

function loadDistrict($this, $object, $mid) {
    $id = $this.val();
    if ($id) {
        initAjax({
            url: "ajax/load-district.html",
            data: {
                id: $id
            },
            dataType: "json",
            success: function(data) {
                $object.find("option:not(:first)").remove();
                $.each(data, function(i, item) {
                    $str = '';
                    if ($mid > 0) {
                        if (item.districtid == $mid) {
                            $str = "selected";
                        }
                    }
                    $object.append("<option value='" + item.districtid + "' " + $str + ">" + (item.type + " " + item.name) + "</option>");
                })
            }
        })
    }
}

function deleteCart(id) {
    if (confirm(_lang.confirm_delete_product)) {
        NProgress.start();
        $("#content-center").animate({
            opacity: ".9"
        });
        initAjax({
            url: "ajax/delete-cart.html",
            data: {
                id: id
            },
            success: function(data) {
                refreshCart();
            }
        })
    }
}

function clearCart(id) {
    if (confirm("B?n có ch?c ch?n mu?n xóa t?t c? s?n ph?m?")) {
        NProgress.start();
        $("#content-center").animate({
            opacity: ".9"
        });
        initAjax({
            url: "ajax/clear-cart.html",
            success: function(data) {
                refreshCart();
            }
        })
    }
}

function clearCart() {
    if (confirm("B?n có mu?n xóa toàn b? s?n ph?m trong gi? hàng?")) {
        $(".box_containerlienhe .content").animate({
            opacity: 0.6
        });
        $.post("gio-hang/clear.html", function(data) {
            $(".box_containerlienhe .content").html(data);
            $(".box_containerlienhe .content").animate({
                opacity: 1
            });
            updateCartNumber();
        })
    }
}

function setKeyPress() {
    $('.product-qty').keypress(function(e) {
        if (e.which == '13') {
            $(this).parents("tr").find("td").last().find("a:first").click();
        }
    });
}

function smoothScrolling() {
    try {
        $.browserSelector();
        if ($("html").hasClass("chrome")) {
            $.smoothScroll();
        }
    } catch (err) {}
}

function initOpenFormMember() {
    $(".open_form").click(function() {
        if (!$("#form_member").length) {
            $("body").append("<div id='form_member' class=''></div>");
        }
        $.post(base_url + "/thanh-vien/open-form.html", {
            type: $(this).data("type")
        }, function(data) {
            $("#form_member").html(data);
            $("#form_member").append("<a href='' data-toggle='modal' id='tg_modal' data-target='#regestration'>bcddddddd</a>")
            $("#tg_modal").click();
            return false;
        });
        return false;
    })
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function initShowTooltip() {
    $('[data-toggle="tooltip"]').tooltip()
}
$().ready(function() {
	
	$("header .top-logo img").show();
	
	
	
	
	
	$(".global-title h1,.global-title h2,.global-title a,.title-global h1,.title-global h2,.title-global a").each(function(){
	//	$(this).html("<span>"+$(this).html()+"</span>");
	})
    setRaty();
    $("a[rel=fancybox],.fancybox").fancybox();
    //checkImageError();
    initBackToTop();
   // setList();
   // initOpenFormMember();
   // initMenu();
   // initQuickView();
   // initShowTooltip();
   // resetEmptyContent();
    $(window).resize(function() {
		//	$("body").css({paddingTop:$("header").height()});
		//setHeaderHotline();
	
     //   initMenu();
     //   setList();
     //   resetEmptyContent();
    })
})
function setHeaderHotline(){
	if($(window).width() > 767){
		$("header .hotline .inner").css({width:"auto","display":"block"});
	}else{
		$("header .hotline .inner").css({display:"inline-block","width":"auto"});
		$w = $("header .hotline .inner").outerWidth()+50;
		
		$("header .hotline .inner").css({width:$w,'margin':'auto',display:"inherit"});
	}
}
function doAddCartSimple($obj) {
    doAddCart($obj.parents(".item-product").data("name"), $obj.parents(".item-product").data("id"), 1, 0, 0);
    return false;
}




function downCart($o){
	$qty = parseInt($o.prev().val());
	if($qty == 1){
		$qty=2;
	}
	$qty--;
	$o.prev().val($qty).trigger("change");
}
function upCart($o){
	$qty = parseInt($o.next().val());
	$qty++;
	$o.next().val($qty).trigger("change");
}
function doAddCart($name, $id, $qty, $color, $size) {
    hideCartMini();
    NProgress.start();
    initAjax({
        url: "ajax/add-cart.html",
        data: {
            id: $id,
            qty: $qty,
            color: $color,
            size: $size
        },
        success: function(data) {
            $(".num-cart").html(data);
			
            showMsg("success", _lang.add_cart_success.replace("{name}",$name));
            NProgress.done();
			//window.location.href='gio-hang.html';
        }
    })
    return false;
}


$().ready(function() {
	$("select:not(.not-select2)").select2();
	
	$(".add-to-cart").click(function(){
		doAddCart($(this).data("name"), $(this).data("id"), 1,0,0);
		return false;
	})
    if ($(".product-bx").length) {
        $(".product-bx").bxSlider({
            minSlides: 4,
            maxSlides: 4,
            moveSlides: 1,
            slideWidth: $("#main-detail").width() / 4,
            pager: 0,
        })
    }
    if ($(".product-image-list #list-image").length) {
        $(".product-image-list #list-image").owlCarousel({
            items: 4,
            itemsDesktop: [1000, 4],
            itemsDesktopSmall: [900, 4],
            itemsTablet: [600, 4],
            itemsMobile: false,
            navigation: false
        });
    }
    $("#qty").change(function() {
        if (!parseInt($(this).val(), 10)) {
            $(this).val(1);
        }
        if (parseInt($(this).val()) < 1) {
            $(this).val(1);
        }
    })
   
    $(".tab-nav li").click(function() {
        $(this).find("a").click();
    })
    if ($("#img_01").length) {
        $("#img_01").elevateZoom({
            gallery: 'gal1',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: false,
            loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
        });
        $("#img_01").bind("click", function(e) {
            var ez = $('#img_01').data('elevateZoom');
            console.log(ez.getGalleryList());
            $.fancybox(ez.getGalleryList());
            return false;
        });
    }
})

function initDescHeight() {
    if ($("#product-detail").length) {
        $h = $("#product-detail .desc-place .wrap").height();
        if ($h > 200) {
            $("#product-detail .desc-place").css({
                "overflow-y": "scroll"
            });
        }
        $("#product-detail .desc-place").css({
            visibility: "visible"
        });
    }
}

function compareProduct($obj) {
    NProgress.start();
    $name = $obj.parents(".item-product").data("name");
    $id = $obj.parents(".item-product").data("id");
    showProductCompare(-200);
    initAjax({
        url: "ajax/add-compare.html",
        data: {
            id: $id
        },
        dataType: "json",
        success: function(data) {
            console.log(data);
            if (data.stt == 1) {
                showProductCompare(0);
            } else {
                showProductCompare(0);
                showMsg("error", "?ã có 4 s?n ph?m so sánh!");
            }
            NProgress.done();
            setTimeout(function() {
                showProductCompare(-200);
            }, 5000);
        }
    })
    return false;
}

function removeCompare($obj) {
    showProductCompare(-200);
    $.post("ajax/remove-compare.html", {
        id: $obj.data("id")
    }, function() {
        showProductCompare(0);
    })
}

function showProductCompare($px) {
    if ($px < 0) {
        $("#compare-product").animate({
            "right": $px + "px"
        });
    } else {
        $.post('ajax/get-compare.html', function(data) {
            $("#compare-product .inner").html(data);
            $("#compare-product").animate({
                "right": $px + "px"
            });
            updateCartNumber();
        })
    }
}
function showQuickview(id){
	$.fancybox(
	{
		href  : base_url+'/product/slug-'+id+".html",
		type :'ajax',
		afterShow:function(){
			addCart2();
			controlProductQty2();
			refreshImage2(image_default);
		}
	})
	return false;
}
function ShowNotify($msg, $type) {
    var t;
    $cls = "error";
    if ($type == 1) {
        $cls = "success";
    }
    if (!$("body").find(".alert-box-container").length) {
        $("body").append("<div class='alert-box-container'></div>");
    }
    $clss = Math.floor((Math.random() * 999999) + 1);
    $msg = "<div class='cl_" + $clss + " " + $cls + "-box alert-box' style='opacity:0'> <div class='msg'>" + $msg + "</div> <p><a class='toggle-alert' href='#'>Toggle</a></p> </div>";
    $(".alert-box-container").append($msg);
    $(".cl_" + $clss).animate({
        opacity: 1
    });
    setTimeout(function() {
        $(".alert-box-container .alert-box").first().slideUp(function() {
            $(".alert-box-container .alert-box").first().remove();
        })
    }, 2000);
    $(".alert-box-container .toggle-alert").click(function() {
        $(this).parents(".alert-box").slideUp(function() {
            $(this).parents(".alert-box").remove();
        });
        return false;
    });
}
function addWhishlist(id){
	$.ajax({
		url:"ajax/add-to-wish-list.html",
		data:{id:id},
		type:"post",
		success:function(data){
			 showMsg("success", _lang.add_wishlist_success.replace("{name}",data));
		}
	})
}
function initOpenFormMember() {
    $(".open_form").click(function() {
        if (!$("#form_member").length) {
            $("body").append("<div id='form_member' class=''></div>");
        }
        $.post(base_url + "/thanh-vien/open-form.html", {
            type: $(this).data("type")
        }, function(data) {
            $("#form_member").html(data);
            $("#form_member").append("<a href='' data-toggle='modal' id='tg_modal' data-target='#regestration'></a>")
            $("#tg_modal").click();
            return false;
        });
        return false;
    })
}

function intializePopover(option) {
    option = $.extend({
        ele: "",
        title: "L?i",
        content: "",
    }, option);
    option.ele.popover({
        'placement': 'top',
        title: option.title,
        content: option.content
    }).show();
    option.ele.popover('show')
    option.ele.click(function() {
        $(this).popover('hide');
    })
    $(document).on('click', function(event) {
        option.ele.popover('destroy')
    });
    option.ele.focus();
}
var $t;

function delorder_gh(id) {
    if (confirm("B?n có ch?c ch?n mu?n xóa s?n ph?m này?")) {
        NProgress.start();
        initAjax({
            url: "ajax/delete-cart.html",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                NProgress.done();
                updateCartNumber();
                $("#gio_hang_sp_" + id).animate({
                    height: 0,
                    opacity: 0
                }, function() {
                    $(this).remove();
                    $("#gio_hang_tong").html(data.total);
                    if (data.qty == 0) {
                        $(".empty-cart").removeClass("hide");
                        $(".cart-enter, p.total").hide();
                    }
                })
            }
        })
    }
    return false;
}

function showCartMini() {
    initAjax({
        url: "ajax/view-mini-cart.html",
        dataType: 'json',
        success: function(data) {
            clearTimeout($t);
            $("#cart_mini ul").html(data.data);
            $("#gio_hang_tong").html(data.total);
            $("#cart_mini").stop().animate({
                right: "0%"
            }, 1000);
            $(".mini-cart-title").fadeOut();
            $t = setTimeout(function() {
                $("#cart_mini").stop().animate({
                    right: "-370px"
                }, 1000, function() {
                    $(".mini-cart-title").fadeIn();
                });
            }, 6000);
        }
    })
}

function hideCartMini() {
    $("#cart_mini").animate({
        right: "-370px"
    }, 1000, function() {
        $(".mini-cart-title").fadeIn();
    });
}
$().ready(function() {
	$("#responsive-menu div.toggle").click(function(){
		$o = $("#responsive-menu ."+$(this).data("for"));
		$show = $o.is(":visible");
		$("#responsive-menu div.toggle").each(function(){
			$(this).next().not($o).slideUp();
		})
		if($o.is(":visible")){
			$o.slideUp();
		}else{
		$o.slideDown();
		}
	})
	
	
	$(".nav-right.mobile .item").click(function(){
		$(this).toggleClass("active");
	})
	$(".load-gallery-control a").click(function(){
		data = eval("_gallery_"+$(this).data("id"));
		console.log(data);
		gal = "";
		$.each(data,function(index,item){
			gal+='<div><a class="fancybox" rel="gallery" href="'+base_url+item+'"><img src="thumb/352x437/1/'+item+'" alt="Gallery" /></a></div>';
		})
		$("#gal_content").html('<div class="owl-carousel owl-gallery-index">'+gal+'</div>');
		$(".left-gal .control").remove();
		$(".load-gallery-control").after('<div class="control"><span class="pull-left left-gal-control"><i class="fa fa-angle-left fa-2x"></i></span><p class="counter_gallery"><span class="slider-counter-1">1</span><span class="counter_line">/</span><span class="slider-counter-2">7</span></p><span class="pull-right right-gal-control"><i class="fa fa-angle-right fa-2x"></i></span></div>');
				
		
			initXCarousel();
		
	})
	if($(".cen-block").length){
		$(".map-item").click(function(){
			$o=$(this);
			if($(this).hasClass("active")){
				$(this).find(".hide-map-content").fadeOut(function(){
					$o.removeClass("active");
				});
				
				return false;
			}
			$tar = $(".cen-block ul");
			if($(this).hasClass("item-calendar")){
				$tar = $(".event-block ul");
			}
			$index = $(this).find("span").html();
			$ftime = 0;
			$tar.find("a[data-index='"+$index+"']").trigger("click");
			
			/*$(".map-item").not($(this)).removeClass("active");
			$(".hide-map-content").fadeOut();
			if($(this).hasClass("active")){
				$(this).removeClass("active");
				
			}else{
				$(this).addClass("active");
				$(this).find(".hide-map-content").fadeIn();
			}*/
			
			
		})
		function clearTop(){
			$(".map-show").trigger("click");
			
		}
		$(".hide-map-content a").click(function(){
			window.location.href=$(this).attr("href");
		})
		$(".map-show").click(function(e){
			if($(e.target).parents(".wrap").length){
				return false;
			}
			
			 $(".map-show .top-popup").fadeOut(function(){
				 $(".map-show").removeClass("overlay");
				 $(".nav-right").fadeIn();
			 })
			
			 
			});
			
		$(".cen-block a,.event-block a").click(function(e){
			if(!$(this).data("link")){
				return false;
			}
			$pa = $("."+$(this).data("parent"));
			$tar2 =	$(this).data("target");
			$index = $(this).data("index");
			if($(window).width() > 768){
				
			$(".map-item").removeClass("active");
			$(".hide-map-content").fadeOut();
			$tar = $(".item-"+$tar2+"-"+$index);
			
				if($tar.is(":visible")){
					$tar.addClass("active");
					$tar.find(".hide-map-content").fadeIn();
				}
				if($ftime){
					$("body,html").animate({scrollTop:$(".map-show").offset().top},1000);
				}
			}else{
				
			$img = $(this).data("img");
			$link = $(this).data("link");
			$(".top-popup").remove();
			
			$(".nav-right").fadeOut();
			
			$name = $(".item-"+$tar2+"-"+$index).find(".title").html();
			$desc = $(".item-"+$tar2+"-"+$index).find(".mdesc").html();
			$view = $(".item-"+$tar2+"-"+$index).find(".view-more").html();
			$("body,html").animate({scrollTop:$(".map-show").offset().top},1000);
			
			setTimeout(function(){
				
				$(".map-show").append("<div class='top-popup "+$tar2+"' style='display:none'><div class='mx-image'><img src='assets/svg/close.svg' class='close-label' onclick='clearTop()' /><img src='"+$img+"' /><div class='wrap'><div class='relative'><span class='line'></span><span class='index-interval'>"+$index+"</span><div class='desc'><div class='title'>"+$name+"</div><div class='desc-inner'>"+$desc+"<div class='clearfix'></div>"+$view+"</div></div></div></div></div>");
				$(".map-show .top-popup").fadeIn(function(){
					$(".map-show .top-popup .desc").css({transform:"translate(0%,0px)",opacity:1});
					$(".map-show .top-popup").animate({width:"100%","left":0,'top':0,'height':'100%'},500,function(){
					setTimeout(function(){
					$(".map-show .top-popup .line").addClass("active");
					},700);
					})
					$(".top-popup .mx-image .desc .desc-inner a").click(function(){
						window.location.href=$(this).attr("href");
					})
				});
				
				
			},$ftime);
			
			
			
			//}
			}
			$ftime = 600;
			return false;
		})
		
		/*$(".event-block  a").click(function(){
			$(".map-item").removeClass("active");
			$(".hide-map-content").fadeOut();
			
			$tar = $(".item-calendar-"+$(this).data("for"));
			if($tar.is(":visible")){
			$tar.addClass("active");
			$tar.find(".hide-map-content").fadeIn();
			$("body,html").animate({scrollTop:$(".map-show").offset().top},1000);
			}
			return false;
		})*/
	}
	
	if($(".owl-event").length){
		setTimeout(function(){
		$(".owl-event").owlCarousel({
			loop:true,
			margin:10,
			autoplay:false,
			nav:true,						navText:['<span class="prev-o"><i class="fa fa-2x fa-angle-left"></i></span>','<span class="next-o"><i class="fa fa-2x fa-angle-right"></i></span>'],
			items:1,
			responsiveClass:true,
			
		})
		
		
		
		},100);
	}
	//$(".nav-right.mobile").click(function(){
	//	$("#amazingslider-1").data("object").slideRun(2, false);
	//	console.log("123");

	//})
	if($(".owl-other-event").length){
	
		setTimeout(function(){
		$(".owl-other-event").owlCarousel({
			loop:false,
			margin:10,
			autoplay:true,
			
			items:3,
			navText:['<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>','<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>'],
			responsiveClass:true,
			nav:false,
			 responsive:{
			0:{
				items:2,
				margin:10,
			  
			},
			600:{
				items:2,
				margin:20,
				
			},
			1000:{
				items:3,
				margin:30,
				
			   
			}
		}
			
		})
		
		
		
		},100);
	}
	if($(".owl-other-services").length){
	
		setTimeout(function(){
		$(".owl-other-services").owlCarousel({
			loop:false,
			margin:10,
			autoplay:true,
			dots:false,
			items:3,
			navText:['<i class="fa fa-angle-right fa-2x" aria-hidden="true"></i>','<i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>'],
			responsiveClass:true,
			nav:false,
			 responsive:{
			0:{
				items:2,
				margin:10,
			  nav:false,
			},
			600:{
				items:2,
				margin:20,
				nav:false,
			},
			1000:{
				items:4,
				margin:30,
				
			   nav:false,
			}
		}
			
		})
		
		
		
		},100);
	}
	
	if($(".owl-carousel-amazing").length){
	
		setTimeout(function(){
		$(".owl-carousel-amazing").owlCarousel({
			loop:false,
			margin:10,
			autoplay:false,
			nav:true,
			dots:false,
			navText:['<i class="fa fa-2x fa-angle-left"></i>','<i class="fa fa-2x fa-angle-right"></i>'],
			items:3,
			margin:10,
			responsiveClass:true,
			
		})
		$(".owl-carousel-amazing  li img").click(function(){
			$("#amazingslider-1").data("object").slideRun($(this).data("index"), false);
		})
		
		
		
		},100);
		
	}
	
	
	
	
    $("#cart_mini .close").click(function() {
        $("#cart_mini").animate({
            right: "-370px"
        }, 1000, function() {
            $(".mini-cart-title").fadeIn();
        });
    })
    $(".mini-cart-title").click(function() {
        showCartMini();
    })
})

var isMobile = window.matchMedia("only screen and (max-width: 760px)");

if (isMobile.matches) {
    $(".wow").addClass("xvisible");
}