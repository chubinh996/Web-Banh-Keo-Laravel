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
		@if(Session::has('thanhcong'))
		<div class="alert alert-success">
			{{Session::get('thanhcong')}}
		</div>
		@endif
		<h3 style="margin-bottom: 20px"> Cảm ơn bạn đã tin tưởng và đặt hàng tại cửa hàng chúng tôi ! </h3>
		<a class="btn btn-success" href="{{route('trangchu')}}">Trang chủ</a>
	</div>
</div>

@endsection