
@section('pageTitle')
Đăng ký
@endsection
@extends('master')
@section('content')

<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Đăng ký</i></a>
	</div>
	<div id="content">
		
		<form action="{{route('dangky')}}" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-3"></div>
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}
					@endforeach
				</div>
				@endif
				@if(Session::has('thanhcong'))
				<div class="alert alert-success">
					{{Session::get('thanhcong')}}
				</div>
				@endif
				<div class="col-sm-6">
					<h4>Đăng ký</h4>
					<div class="space20">&nbsp;</div>

					
					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" required placeholder="Nhập email của bạn ...">
					</div>

					<div class="form-block">
						<label for="your_last_name">Họ và tên*</label>
						<input type="text" id="fullname" name="fullname" required placeholder="Nhập tên của bạn ...">
					</div>

					<div class="form-block">
						<label for="birthday">Ngày sinh*</label>
						<input type="date" id="birthday" name="birthday">
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="address" name="address" required placeholder="Nhập địa chỉ của bạn ...">
					</div>


					<div class="form-block">
						<label for="phone">Số điện thoại*</label>
						<input type="text" id="phone" name="phone" required placeholder="Nhập số điện thoại của bạn ...">
					</div>
					<div class="form-block">
						<label for="phone">Mật khẩu*</label>
						<input type="password" id="password" name="password" required placeholder="Nhập mật khẩu của bạn ...">
					</div>
					<div class="form-block">
						<label for="re_password">Nhập lại mật khẩu*</label>
						<input type="password" id="re_password" name="re_password" required>
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Đăng ký</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection