@section('pageTitle')
Trang chủ
@endsection
@extends('master')
@section('content')

<!--slider-->
<div class="container">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">				
				<img src="source/image/slide/slide2.png" alt="Candy Shop">
			</div>
			<div class="item">				
				<img src="source/image/slide/slide1.png" alt="Candy Shop">
			</div>
			<div class="item">				
				<img src="source/image/slide/slide3.jpg" alt="Candy Shop">
			</div>
			<div class="item">				
				<img src="source/image/slide/slide4.jpg" alt="Candy Shop">
			</div>
		</div>
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="row">
		<div class="container">
			<div id="content" class="space-top-none">
				<div class="main-content">
					<div class="space10">&nbsp;</div>
					<!-- <div class="row banner-sale">
						<div class="col-xs-12">
							<div class="khuyenmai">
								<div class="label-khuyenmai">
									Sale up to 30%
								</div>
								<div>
									<i class="label-khuyenmai">Thời gian khuyến mãi còn : </i> <p id="khuyenmai"></p>
								</div>
							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-xs-12">	
							<img src="source/assets/dest/images/LoaiSP/Sanpham_moi.jpg" alt="">
						</div>
					</div>
					<div class="row content-main-product-new">
						<div class="col-sm-12">
							<div class="beta-products-list">						
								<div class="row">

									@foreach($new_product as $new)
									<?php $giaban = (($new->unit_price) + (($new->unit_price)*($new->sale_price)/100)) ?>
									<?php $giakm = (($giaban*(100-$new->promotion_price))/100) ?>
									<div class="col-xs-12 col-sm-4 col-md-3">
										<div class="single-item">
											@if($new->promotion_price != 0)
											<div class="ribbon-wrapper"><div class="ribbon sale">{{$new->promotion_price}} %</div></div>

											@endif
											<div class="single-item-header">
												<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$new->name}}</p>
												<p class="single-item-price">
											<!-- @if($new->promotion_price == 0) 		
											<span class="flash-sale">{{number_format($new->unit_price)}} đ</span>
											@else
											<span class="flash-del">{{number_format($new->unit_price)}} đ</span>
											<span class="flash-sale">{{number_format($new->unit_price*(100-$new->promotion_price)/100)}} đ</span>
											@endif -->
											
											@if($new->promotion_price == 0)
											<span class="flash-sale">{{ number_format($giaban) }} đ</span>
											@else 
											<span class="flash-del">{{ number_format($giaban) }} đ</span>
											<span class="flash-sale">{{ number_format($giakm) }} đ</span>
											@endif
											
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						
							@endforeach

						</div>
						<!-- <div class="row">{{$new_product->links()}}</div> -->
					</div> <!-- .beta-products-list -->
				</div>
			</div>
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-xs-12">	
					<img src="source/assets/dest/images/LoaiSP/Sanpham_hot.png" alt="">
				</div>
			</div>
			<div class="row content-main-product-sale">
				<div class="col-sm-12">
					<div class="beta-products-list">
						
						<div class="row">
							@foreach($sanpham_khuyenmai as $spkm)
							<?php $giabans = (($spkm->unit_price) + (($spkm->unit_price)*($spkm->sale_price)/100)) ?>
							<?php $giakms = (($giabans*(100-$spkm->promotion_price))/100) ?>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="single-item">
									@if($spkm->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">{{$spkm->promotion_price}} %</div></div>

									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$spkm->id)}}"><img src="source/image/product/{{$spkm->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$spkm->name}}</p> 
										<p class="single-item-price">
											<!-- <span class="flash-del">{{number_format($spkm->unit_price)}} đ</span>
												<span class="flash-sale">{{number_format($spkm->unit_price*(100-$spkm->promotion_price)/100)}} đ</span> -->
												@if($spkm->promotion_price == 0)
												<span class="flash-sale">{{number_format($giabans)}} đ</span>
												@else 
												<span class="flash-del">{{number_format($giabans)}} đ</span>
												<span class="flash-sale">{{number_format($giakms)}} đ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											@if(Auth::check())
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$spkm->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@else 
											<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
											@endif
											<a class="beta-btn primary" href="{{route('chitietsanpham',$spkm->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								
								@endforeach
							</div>	
							<!-- <div class="row">{{$sanpham_khuyenmai->links()}}</div>	 -->
						</div> <!-- .beta-products-list -->
					</div>				
				</div>
			</div>
		</div> <!-- end section with sidebar and main content -->
	</div> <!-- .main-content -->
</div>
</div> <!-- #content -->
</div>
<div class="container">
	<div class="blog-shop">
		<div class="row blog-title">
			<div class="col-xs-12">
				<div class="pull-left">
					<h3>BLOG CANDY SHOP</h3>
				</div>
				<div class="pull-right">
					<a href="{{route('blogall')}}">Xem tất cả</a>
				</div>
			</div>
		</div>
		<div class="row blog-content">
			@foreach($news as $tt)
			<div class="col-xs-12 col-sm-4 col-md-3">
				<div class="content-blog">
					<a href="{{route('blogdetail',$tt->id)}}"><img src="source/image/blog/{{$tt->image}}" alt=""></a>
					<p class="title">{{$tt->title}}</p>
					<p class="short-description">{!!$tt->short_description!!}</p>
					<p><a href="{{route('blogdetail',$tt->id)}}"><i>Xem thêm</i></a></p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
<script>

// Set the date we're counting down to
var countDownDate = new Date("Jan 1, 2019 18:00:00").getTime();
// Update the count down every 1 second
var x = setInterval(function() {
    // Get todays date and time
    var now = new Date().getTime();   
    // Find the distance between now an the count down date
    var distance = countDownDate - now;  
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);    
    // Output the result in an element with id="khuyenmai"
    document.getElementById("khuyenmai").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";    
    // If the count down is over, write some text 
    if (distance < 0) {
    	clearInterval(x);
    	document.getElementById("khuyenmai").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

<script>
	$('.slide_pros').owlCarousel({
		loop:true,
		margin:10,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:false
			},
			1000:{
				items:3,
				nav:true,
				loop:false
			}
		}
	})
</script>