<?php
	$mobile_detect = new Mobile_Detect;
?>
<!DOCTYPE html>
<html lang="en-US" >
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="ILA ELITE- Học tiếng Anh tại Trung Tâm giảng dạy Anh ngữ hàng đầu Việt Nam với 100% giáo viên nước ngoài.">
	    <meta name="keywords" content="ILA, học tiếng Anh, khóa học tiếng anh, trung tâm anh ngữ, trung tâm tiếng anh, trung tâm anh ngữ cho trẻ em">
		<meta name="format-detection" content="telephone=no">
		<title>ILA ELITE</title>

		<style type="text/css">
		img.wp-smiley,
		img.emoji {
		display: inline !important;
		border: none !important;
		box-shadow: none !important;
		height: 1em !important;
		width: 1em !important;
		margin: 0 .07em !important;
		vertical-align: -0.1em !important;
		background: none !important;
		padding: 0 !important;
		}
		</style>

		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&subset=vietnamese" rel="stylesheet">
		<link rel='stylesheet' id='animation.css-css'  href='{!!asset('public/assets/frontend')!!}/css/animate.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='magnific-popup-css'  href='{!!asset('public/assets/frontend')!!}/css/magnific-popup.css' type='text/css' media='all' />
		<link rel='stylesheet' id='flexslider-css'  href='{!!asset('public/assets/frontend')!!}/js/flexslider/flexslider.css' type='text/css' media='all' />
		<link rel='stylesheet' id='tooltipster-css'  href='{!!asset('public/assets/frontend')!!}/css/tooltipster.css' type='text/css' media='all' />
		<link rel='stylesheet' id='supersized-css'  href='{!!asset('public/assets/frontend')!!}/css/supersized.css' type='text/css' media='all' />
		<link rel='stylesheet' id='odometer-theme-css'  href='{!!asset('public/assets/frontend')!!}/css/odometer-theme-minimal.css' type='text/css' media='all' />
		<link rel='stylesheet' id='screen-css-css'  href='{!!asset('public/assets/frontend')!!}/css/screen.css' type='text/css' media='all' />
		<link rel='stylesheet' id='fontawesome-css'  href='{!!asset('public/assets/frontend')!!}/css/font-awesome.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='responsive-css'  href='{!!asset('public/assets/frontend')!!}/css/grid.css' type='text/css' media='all' />
		@if(!$mobile_detect->isMobile())
		<link rel='stylesheet' id='responsive-css'  href='{!!asset('public/assets/frontend')!!}/css/custom/header.css' type='text/css' media='all' />
		@else
		<link rel='stylesheet' id='responsive-css'  href='{!!asset('public/assets/frontend')!!}/css/custom/header-mobile.css' type='text/css' media='all' />
		@endif
		<script type='text/javascript' src='{!!asset('public/assets/frontend')!!}/js/jquery-2.1.1.js'></script>
		<script type='text/javascript' src='{!!asset('public/assets/frontend')!!}/js/turn.js'></script>
		<script type='text/javascript' src='{!!asset('public/assets/frontend')!!}/js/flexslider/jquery.flexslider-min.js'></script>
		<script src="{!!asset('public/assets/frontend')!!}/js/jquery.easing.js"></script>
		<script src="{!!asset('public/assets/frontend')!!}/js/ParallaxScroll.js"></script>
		<link rel='stylesheet'   href='{!!asset('public/assets/frontend')!!}/js/remodal/remodal.css' type='text/css' media='all' />
		<link rel='stylesheet'   href='{!!asset('public/assets/frontend')!!}/js/remodal/remodal-default-theme.css' type='text/css' media='all' />
		<script src="{!!asset('public/assets/frontend')!!}/js/remodal/remodal.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#mobile_nav_icon').click(function() {
					$('body,html').animate({scrollTop:0},100);
					$('body').toggleClass('js_nav');
				});
				$('#close_mobile_menu').click(function() {
					$('body').removeClass('js_nav');
				});

				$('.sub-menu').hide();
				$('#mobile_main_menu li a').click(function(){
					var sub = $(this).parent('li').find('.sub-menu');
					if(sub.is(':hidden')){
						sub.stop().slideDown();
					}else{
						sub.stop().slideUp();
					}
					return false;
				})

				$('.wrap-slider').flexslider({
					animation: "slide",
					controlNav: true,
					directionNav: false
				})
				// MOBILE SIDEBAR TOGGLE
				$('.m-icons').click(function(){
					$('#side-menu').toggleClass('active');
				})
				/*LOAD MORE SIDE BAR*/
				$('.seemore').on('click', function(){
					var type_id = $(this).data('type');
					var this_p = $(this);
					$.ajax({
						url:'{{route("f.loadmore")}}',
						type: 'POST',
						data:{type_id : type_id, _token: $('meta[name="csrf-token"]').attr('content') },
						success: function(data){
							this_p.prev('.nav_side').html(data.rs);
							this_p.remove();
						}
					})
				})
				@if($mobile_detect->isMobile())
				/*NAVI TYPE*/
				$('.navi-type > li > a').click(function(){
					var sub_nav = $(this).parent().find('.sub-navi-type');
					if(sub_nav){
						$('.sub-navi-type').slideUp();
						if(sub_nav.is(':hidden')){
							sub_nav.stop().slideDown();
						}else{
							sub_nav.stop().slideUp();
						}
					}
					return false;
				})
				@endif

			})
		</script>
		<!-- GA -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-60129748-1', 'auto');
		  ga('send', 'pageview');

		</script>
		<link rel="canonical" href="index.html" />
	</head>
	<body>
        @include('Frontend::layouts.mobile-menu')

        <div id="wrapper">

            @if(!$mobile_detect->isMobile())
				@include('Frontend::layouts.header2')
            	@include('Frontend::layouts.banner2')
			@else
				@include('Frontend::layouts.mobile-menu2')
				@include('Frontend::layouts.banner-mobile')
			@endif

            @yield('content')
            <br class="clear"/>
        </div> <!-- end wrapper-->
		@yield('script')
    </body>
</html>
