@section('pageTitle')
Search
@endsection
@extends('master')
@section('content')
<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Tìm kiếm</i></a>
	</div>
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space10">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<h3>Kết quả tìm kiếm</h3>
					<div class="beta-products-details">
						<p class="pull-left">Tìm thấy {{count($count_product)}} sản phẩm.</p>
					</div>
				</div>	
			</div>
			<div class="row content-main-product-new">
				<div class="col-sm-12">
					<div class="beta-products-list">					
						<div class="row">							
							@foreach($product as $new)
							<?php $giaban = (($new->unit_price) + (($new->unit_price)*($new->sale_price)/100)) ?>
							<?php $giakm = (($giaban*(100-$new->promotion_price))/100) ?>
							<div class="col-xs-12 col-sm-4 col-md-3">
								<div class="single-item">
									@if($new->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$new->id)}}"><img src="source/image/product/{{$new->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$new->name}}</p>
										<p class="single-item-price">
											@if($new->promotion_price == 0) 		
											<span class="flash-sale">{{number_format($giaban)}} đ</span>
											@else
											<span class="flash-del">{{number_format($giaban)}} đ</span>
											<span class="flash-sale">{{number_format($giakm)}} đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										@if(Auth::check())
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$new->id)}}"><i class="fa fa-shopping-cart"></i></a>
										@else 
										<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
										@endif
										<a class="beta-btn primary" href="{{route('chitietsanpham',$new->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-12">{{$product->links()}}</div>
			</div>
		</div>
	</div> <!-- .main-content -->
</div> <!-- #content -->

@endsection