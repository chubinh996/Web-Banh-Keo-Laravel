<div id="header">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 pull-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())						
						<li><a href="">Chào bạn : {{Auth::user()->full_name}}</a></li>
						<li><a href="{{route('dangxuat')}}">Đăng xuất</a></li>
						<li><a href="{{route('dangky')}}">Đăng ký</a></li>
						@if(Auth::user()->quyen == 1)
						<li><a href="admin/thongke/danhsach">Quản trị</a></li>
						@endif						
						@else 
						<li><a href="{{route('dangnhap')}}">Đăng nhập</a></li>
						<li><a href="{{route('dangky')}}">Đăng ký</a></li>						
						@endif
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-top -->
	<div class="header-body">
		<div class="container beta-relative">
			<div class="pull-left mobile-logo">
				<a href="{{route('trangchu')}}" id="logo"><img src="source/assets/dest/images/logo2.jpg" width="200px" height="120px" alt=""></a>
			</div>
			<div class="pull-right beta-components space-left ov">
				<div class="beta-comp">
					<form role="search" method="get" id="searchform" action="{{route('search')}}">
						<input type="text" value="" name="search" id="search" placeholder="Nhập sản phẩm cần tìm..." />
						<button class="fa fa-search" type="submit" id="searchsubmit"></button>
					</form>
				</div>

				<div class="beta-comp">

					<div class="cart">
						<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (@if(Session::has('cart')) {{Session('cart')->totalQty}} @else trống @endif) <i class="fa fa-chevron-down"></i></div>
						@if(Session::has('cart'))
						<div class="beta-dropdown cart-body">
							
							@foreach($product_cart as $product)
							<?php //echo "<pre>"; print_r($product); ?>
								<div class="cart-item"> 
									<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>

											<span class="cart-item-amount">{{$product['qty']}}*<span></span>
											<?php $giagoc = $product['item']['unit_price']+(($product['item']['unit_price']*$product['item']['sale_price'])/100) ?>

											@if($product['item']['promotion_price'] ==0)
											{{number_format($giagoc)}} 

											@else {{number_format($giagoc*(100-$product['item']['promotion_price'])/100)}} 

										@endif đ</span>
									</div>
								</div>
							</div>
							@endforeach
							
							<div class="cart-caption">
								<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đ</span></div>
								<div class="clearfix"></div>

								<div class="center">
									<div class="space10">&nbsp;</div>
									<a href="{{route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
								</div>
							</div>
						</div>
						@endif
					</div> <!-- .cart -->

				</div>

			</div>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .header-body -->
	<div class="header-bottom" style="background-color: #fff;">
		<div class="container">
			<!-- <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
			<div class="visible-xs clearfix"></div>
			<nav class="main-menu">
				<ul class="l-inline ov">
					<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
					<li><a>Loại sản phẩm</a>
						<ul class="sub-menu">
							@foreach($loai_sp as $loai)
							<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
					<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
				</ul>
				<div class="clearfix"></div>
			</nav> -->
			<!-- <nav class="navbar navbar-default">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="{{route('trangchu')}}">Home</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Loại sản phẩm <span class="caret"></span></a>
							<ul class="sub-menu">
								@foreach($loai_sp as $loai)
								<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
								@endforeach
								<li>ff</li>
							</ul>
						</li>
						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
					</ul>
				</div>
			</nav> -->
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="{{route('trangchu')}}" style="color: #ff9c00 !important;">Home</a>
					</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Danh mục sản phẩm<span class="caret"></span></a>
								<ul class="dropdown-menu">
									@foreach($loai_sp as $loai)
									<li><a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a></li>
									<li role="separator" class="divider"></li>
									@endforeach
								</ul>
							</li>
							<li><a href="{{route('blogall')}}">Blog Candy Shop</a></li>
							<li><a href="#">Hướng dẫn mua hàng</a></li>
							<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
							<li><a href="{{route('lienhe')}}">Liên hệ</a></li>
							<li><a href="#">Khuyến mãi</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div> <!-- .container -->
	</div> <!-- .header-bottom -->
	</div> <!-- #header -->