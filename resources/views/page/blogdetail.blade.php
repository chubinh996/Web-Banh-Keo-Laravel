@section('pageTitle')
	Blog
@endsection
@extends('master')
@section('content')
<div class="container">
	@foreach($blogdetail as $bl)
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a href="{{route('blogall')}}"><i>Blog Candy Shop</i></a> >> <a><i>{{$bl->title}}</i></a>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-10 pull-left">
			
			<div class="blog-title-detail">
				<h1>{{$bl->title}}</h1>
			</div>
			<div class="image">
				<img class="img-responsive" src="source/image/blog/{{$bl->image}}" alt="">
			</div>
			<div class="content">
				{!!$bl->content!!}
			</div>
			
		</div>
		<div class="col-xs-12 col-sm-2 pull-right">
			<div class="banner-sidebar">
				<img class="img-responsive" src="source/image/banner-sidebar/banner-sidebar1.jpg" alt="">
			</div>
			<div class="banner-sidebar">
				<img class="img-responsive" src="source/image/banner-sidebar/banner-sidebar2.png" alt="">
			</div>
		</div>
	</div>
	@endforeach
	
</div>
@endsection