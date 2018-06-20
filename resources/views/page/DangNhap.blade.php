@section('pageTitle')
Đăng nhập
@endsection
@extends('master')
@section('content')

<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Đăng nhập</i></a>
	</div>
	<div id="content">
		<div class="row">
			<div class="col-sm-3">
				
			</div>
			<div class="col-sm-6">
				<form class="form-horizontal" action="{{route('dangnhap')}}" method="post" class="beta-form-checkout">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@if(Session::has('flag'))
					<div class="alert alert-{{Session::get('flag')}}">
						{{Session::get('message')}}
					</div>
					@endif
					<h4 class="col-sm-offset-2">Đăng nhập</h4>
					<div class="space20">&nbsp;</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="email">Email*</label>
						<div class="col-sm-10">
							<input class="form-control" type="email" id="email" name="email" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="password">Mật khẩu*</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" id="password" name="password" required>
						</div>
						
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
							<a href="{{route('dangky')}}" class="btn btn-success pull-right">Bạn chưa có tài khoản ?</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
