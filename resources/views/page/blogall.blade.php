@section('pageTitle')
	Blog
@endsection
@extends('master')
@section('content')
<div class="container">
	<div class="breadcrumb">
		<a href="{{route('trangchu')}}"><i>Home</i></a> >> <a><i>Blog Candy Shop</i></a>
	</div>
	<div class="row all-blog">
		<div class="col-xs-12 col-sm-10 pull-left">
			<div class="row blog-content">
				@foreach($blogall as $bla)
				<div class="col-xs-12 col-sm-4 col-md-3 blog">
					<div class="content-blog">
						<a href="{{route('blogdetail',$bla->id)}}"><img src="source/image/blog/{{$bla->image}}" alt=""></a>
						<p class="title">{{$bla->title}}</p>
						<p class="short-description">{!!$bla->short_description!!}</p>
						<p><a href="{{route('blogdetail',$bla->id)}}"><i>Xem thêm</i></a></p>
					</div>
				</div>

				@endforeach
			</div>
			<div class="row">{{$blogall->links()}}</div>
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
</div>
@endsection