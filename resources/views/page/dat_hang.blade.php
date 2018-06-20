@section('pageTitle')
Đặt hàng
@endsection
@extends('master')
@section('content')
<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Đặt hàng</i></a>
	</div>
</div>
<div class="container">
	<div id="content">

		<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>
					<!-- @if(Auth::check()) -->
					<!-- <div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="name" value="{{Auth::user()->full_name}}" required>
					</div> -->
					
					<!-- <div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" value="{{Auth::user()->email}}" required>
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" value="{{Auth::user()->address}}" required>
					</div> -->


					<!-- <div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
					</div>
					@else 
					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" id="name" name="name" value="{{Auth::user()->full_name}}" required>
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" value="{{Auth::user()->email}}" required>
					</div> -->

					<!-- <div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" value="{{Auth::user()->address}}" required>
					</div>

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="phone" value="{{Auth::user()->phone}}" required>
					</div>
					@endif -->

					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes" name="notes"></textarea>
					</div>
					
				</div>
				<div class="col-sm-6">
					<div class="your-order">
						<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
						<div class="your-order-body" style="padding: 0px 10px">
							<div class="your-order-item">
								<div>
									<!--  one item	 -->
									@if(Session::has('cart'))									
									@foreach($product_cart as $product)								
										<div class="media">
											<div class="media-body">
												<img width="25%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-right" >
												<p class="font-large">{{$product['item']['name']}}</p>
												<!-- <span class="color-gray your-order-info">Color: Red</span> -->
												<span class="color-gray your-order-info">QTY</span>

												<!-- <button type="button" id="sub" class="sub">-</button> -->
												<input type="number" id="qty" name="qty" value="{{$product['qty']}}" min="1" max="100" />
												<!-- <button type="button" id="add" class="add">+</button> -->
												<span class="color-gray your-order-info-price"><span style="margin-right: 15px">Giá:</span> <?php $giagoc = $product['item']['unit_price']+(($product['item']['unit_price']*$product['item']['sale_price'])/100) ?>

													@if($product['item']['promotion_price'] ==0)
														{{number_format($giagoc)}} 

													@else {{number_format($giagoc*(100-$product['item']['promotion_price'])/100)}} 
													@endif đ</span>
											</div>
										</div>
										@endforeach
										@endif
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									@if(Session::has('cart'))
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black">{{number_format(Session('cart')->totalPrice)}} đ</h5></div>
									<div class="clearfix"></div>
									@endif
								</div>
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" value="SHIP" checked="checked" data-order_button_text="" name="payment_method">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											<strong style="text-decoration: underline;">Ghi chú :</strong>
											<p>Cửa hàng sẽ gửi hàng đến địa chỉ của bạn cung cấp. Chính vì thế bạn vui lòng ghi đúng địa chỉ nhận hàng vào phần "<strong>Ghi chú</strong>" bên cạnh . Khi được giao hàng bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng.</p>
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" value="ATM" data-order_button_text="" name="payment_method">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Hiện tại chức năng này đang được phát triển.
										</div>						
									</li>

								</ul>
							</div>

							<div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	<script>
		jQuery('.add').click(function () {
			if (jQuery(this).prev().val() < 3) {
				jQuery(this).prev().val(+jQuery(this).prev().val() + 1);
			}
		});
		jQuery('.sub').click(function () {
			if (jQuery(this).next().val() > 1) {
				if (jQuery(this).next().val() > 1) jQuery(this).next().val(+$(this).next().val() - 1);
			}
		});

	</script>
	@endsection