@section('pageTitle')
Chi tiết sản phẩm
@endsection
@extends('master')
@section('content')

<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Chi tiết</i></a> >> <a><i>{{$sanpham->name}}</i></a>
	</div>
</div>


<div class="container">
	<div id="content">
		<div class="row">
			<div class="col-sm-9">
				<?php $giaban = (($sanpham->unit_price) + (($sanpham->unit_price)*($sanpham->sale_price/100))) ?>
				<?php $giakm = ($giaban*(100-$sanpham->promotion_price)/100) ?>
				<div class="row">
					<div class="col-sm-4">
						<img src="source/image/product/{{$sanpham->image}}" alt="">
					</div>
					<div class="col-sm-8">
						<div class="single-item-body">
							<p class="single-item-title">{{$sanpham->name}}</p>
							<p class="single-item-price">
								@if($sanpham->promotion_price == 0) 		
								<span class="flash-sale">{{number_format($giaban)}} đ</span>
								@else
								<span class="flash-del">{{number_format($giaban)}} đ</span>
								<span class="flash-sale">{{number_format($giakm)}} đ</span>
								@endif
							</p>
							<p>Nguyên liệu:</p>
							<p>
								{!!$sanpham->short_description!!}
							</p>
						</div>
						<div class="clearfix"></div>
						<div class="space20">&nbsp;</div>
						<div class="space20">&nbsp;</div>

						
						<div class="single-item-options">
							
							<!-- <select class="wc-select" name="color">
								<option>Số lượng</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select> -->
							@if(Auth::check())
							<a class="add-to-cart pull-left" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
							@else 
							<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
							@endif

							<div class="clearfix"></div>
						</div>

						<a class="btn btn-primary pull-right" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//localhost%3A8088/Shop_DoAn_Laravel/public/chi-tiet-san-pham/2" target="_blank">Share Facebook</a>
					</div>
				</div>

				<div class="space40">&nbsp;</div>
				<div class="woocommerce-tabs">
					<ul class="tabs">
						<li><a href="#tab-description">Mô tả</a></li>
						<li><a href="#tab-reviews">Reviews</a></li>
						<li><a href="#tab-comments">Bình luận</a></li>
					</ul>

					<div class="panel" id="tab-description">
						<p>{!!$sanpham->description!!}</p>
					</div>
					<div class="panel" id="tab-reviews">
						<p>No Reviews</p>
					</div>
					<div class="panel" id="tab-comments">

						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
							js = d.createElement(s); js.id = id;
							js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
							fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>
						<div class="fb-comments" data-href="https://www.facebook.com/pages/%C4%90i%E1%BB%87n-tho%E1%BA%A1i-Th%C3%A0nh-%C4%90%E1%BA%A1t/609767402431528?ref=hl" data-width="560" data-numposts="10" data-colorscheme="light"></div>

					</div>
				</div>
				<div class="space50">&nbsp;</div>
				<div class="beta-products-list">
					<h4>Sản phẩm liên quan</h4>
					<br>
					<div class="row">
						@foreach($sp_tuongtu as $sptt)
						<div class="col-sm-4">
							<div class="single-item">
								@if($sptt->promotion_price != 0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

								@endif
								<div class="single-item-header">
									<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height="250px"></a>
								</div>
								<div class="single-item-body">
									<p class="single-item-title">{{$sptt->name}}</p>
									<p class="single-item-price">
										@if($sptt->promotion_price == 0) 		
										<span class="flash-sale">{{number_format($sptt->unit_price)}} đ</span>
										@else
										<span class="flash-del">{{number_format($sptt->unit_price)}} đ</span>
										<span class="flash-sale">{{number_format($sptt->unit_price*(100-$sptt->promotion_price)/100)}} đ</span>
										@endif
									</p>
								</div>
								<div class="single-item-caption">
									@if(Auth::check())
									<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
									@else 
									<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
									@endif
									<a class="beta-btn primary" href="{{route('chitietsanpham',$sptt->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div> <!-- .beta-products-list -->
			</div>
			<div class="col-sm-3 aside">
				<div class="widget">
					<h3 class="widget-title">Top bánh ngon</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($sp_ngon as $ngon)

							<div class="media beta-sales-item">
								<a class="pull-left" href="{{route('chitietsanpham',$ngon->id)}}"><img src="source/image/product/{{$ngon->image}}" alt=""></a>
								<div class="media-body">
									{{$ngon->name}}
									<span class="beta-sales-price">
										@if($ngon->promotion_price == 0) 		
										<span class="flash-sale">{{number_format($ngon->unit_price)}} đ</span>
										@else

										<span class="flash-sale">{{number_format($ngon->unit_price*(100-$ngon->promotion_price)/100)}} đ</span>
										@endif
									</span>
								</div>
							</div>						
							
							@endforeach
						</div>
					</div>
				</div> <!-- best sellers widget -->
				<div class="widget">
					<h3 class="widget-title">Loại bánh mới</h3>
					<div class="widget-body">
						<div class="beta-sales beta-lists">
							@foreach($new_product as $new)
							<div class="media beta-sales-item">
								<div>
									<a class="pull-left" href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt=""></a>
								</div>
								
								<div class="media-body">
									{{$new->name}} 
									<div class="clearfix"></div>
									<span class="beta-sales-price">
										@if($new->promotion_price == 0) 		
										<span class="flash-sale">{{number_format($new->unit_price)}} đ</span>
										@else
										
										<span class="flash-sale">{{number_format($new->unit_price*(100-$new->promotion_price)/100)}} đ</span>
										@endif
									</span>
								</div>
							</div>
							@endforeach
							
						</div>
					</div>
				</div> <!-- best sellers widget -->
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection