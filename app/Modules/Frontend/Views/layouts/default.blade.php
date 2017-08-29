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
		<meta name="format-detection" content="telephone=no">
		<title>Blog | Elite Blog</title>

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
		<link rel='stylesheet' id='animation.css-css'  href='{!!asset('public/assets/frontend')!!}/css/animation.css' type='text/css' media='all' />
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
		<script type='text/javascript' src='{!!asset('public/assets/frontend')!!}/js/flexslider/jquery.flexslider-min.js'></script>
		<script src="{!!asset('public/assets/frontend')!!}/js/jquery.easing.js"></script>
		<script src="{!!asset('public/assets/frontend')!!}/js/ParallaxScroll.js"></script>
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
			})
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
    </body>
</html>
