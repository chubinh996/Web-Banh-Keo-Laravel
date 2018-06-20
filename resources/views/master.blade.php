<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>@yield('pageTitle') - Candy Shop</title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
	<link rel="stylesheet" title="style" href="source/assets/dest/css/owl/owl.carousel.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/owl/owl.theme.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/my-style.css">
	
</head>
<body>

	@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
	@include('footer')
	


	<!-- include js files -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	
	<!-- <script src="source/assets/dest/js/owl/jQuery.noConflict.js"></script> -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<!-- <script src="source/assets/dest/js/owl/owl.carousel.js"></script> -->
	<!-- <script src="source/assets/dest/js/owl/jquery-1.9.1.min.js"></script> -->
	<script src="source/assets/dest/js/custom2.js"></script>
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}}
				)
			jQuery("#owl-slide").owlCarousel({				
				autoPlay: 2000, 
				items : 3,
				itemsDesktop : [1199,3],
				itemsDesktopSmall : [979,3]
			});
		})
	</script>
</body>
</html>
