@section('pageTitle')
Loại sản phẩm
@endsection
@extends('master')
@section('content')

<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>{{$loaisp->name}}</i></a>
	</div>
</div>

<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-3">
					<ul class="aside-menu">
						@foreach($loai as $loai)
						<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
						@endforeach
					</ul>
					<div class="banner-loaisp">
						<img class="img-responsive" src="source/assets/dest/images/banner1.png" alt="">
					</div>
					<div class="banner-loaisp">
						<img class="img-responsive" src="source/assets/dest/images/banner2.png" alt="">
					</div>
				</div>
				<div class="col-sm-9">
					<div class="beta-products-list">
						<h4>Sản phẩm mới</h4>
						<div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm !</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							@foreach($sp_theoloai as $sp)
							
							<?php $giaban = (($sp->unit_price) + (($sp->unit_price)*($sp->sale_price)/100)) ?>
							<?php $giakm = (($giaban*(100-$sp->promotion_price))/100) ?>
							<div class="col-sm-4">
								<div class="single-item">
									@if($sp->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt="" height="250px"></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sp->name}}</p>
										<p class="single-item-price">
											@if($sp->promotion_price == 0) 		
											<span class="flash-sale">{{number_format($giaban)}} đ</span>
											@else
											<span class="flash-del">{{number_format($giaban)}} đ</span>
											<span class="flash-sale">{{number_format($giakm)}} đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										@if(Auth::check())
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
										@else 
										<a class="add-to-cart pull-left" href="{{route('dangnhap')}}"><i class="fa fa-shopping-cart"></i></a>
										@endif
										<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->

					<div class="space50">&nbsp;</div>

					<div class="beta-products-list">
						<h4>Sản phẩm khác</h4>
						<!-- <div class="beta-products-details">
							<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm !</p>
							<div class="clearfix"></div>
						</div> -->
						<div class="row">
							@foreach($sp_khac as $spk)
							
							<?php $giabans = (($spk->unit_price) + (($spk->unit_price)*($spk->sale_price/100))) ?>
							<?php $giakms = ($giabans*(100-$spk->promotion_price)/100) ?>
							<div class="col-sm-4">
								<div class="single-item">
									@if($spk->promotion_price != 0)
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									@endif
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$spk->id)}}"><img src="source/image/product/{{$spk->image}}" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$spk->name}}</p>
										<p class="single-item-price">
											@if($spk->promotion_price == 0) 		
											<span class="flash-sale">{{number_format($giabans)}} đ</span>
											@else
											<span class="flash-del">{{number_format($giabans)}} đ</span>
											<span class="flash-sale">{{number_format($giakm)}} đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$spk->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="{{route('chitietsanpham',$spk->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>

							</div>
							
							@endforeach
							<div class="row">{{$sp_khac->links()}}</div>
						</div>
						<div class="space40">&nbsp;</div>

					</div> <!-- .beta-products-list -->
				</div>
			</div> <!-- end section with sidebar and main content -->


		</div> <!-- .main-content -->
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection