 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-12">
 				<h1 class="page-header">Tin Tức
 					<small>{{$tintuc->name}}</small>
 				</h1>
 			</div>
 			<!-- /.col-lg-12 -->
 			<div class="col-lg-7" style="padding-bottom:120px">
 				<!-- đếm lỗi --> 
 				@if(count($errors) > 0)
 				<div class="alert alert-danger">
 					@foreach($errors->all() as $err)
 					{{$err}}<br>
 					@endforeach

 				</div>
 				@endif
 				<!-- //nếu có lỗi thì in thông báo  --><!-- lỗi -->
 				@if(session('thongbao'))
 				<div class="alert alert-success">
 					{{session('thongbao')}}
 				</div>
 				@endif
 				<form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
 					<input type="hidden" name="_token" value="{{csrf_token()}}">
 					<div class="form-group">
 						<label>Tiêu đề</label>
 						<input class="form-control" name="title" value="{{$tintuc->title}}" />
 					</div>
 					
 					<div class="form-group">
 						<label>Nội Dung</label>
 						<textarea name="content"  id="demo" class="form-control ckeditor" rows="2">{{$tintuc->content}}</textarea>
 					</div>

 					<div class="form-group">
 						<label>Mô Tả Ngắn</label>
 						<textarea name="short_description"  id="demo" class="form-control ckeditor" rows="2">{{$tintuc->short_description}}</textarea>
 					</div>
 										
 					<div class="form-group">
 						<label>Ảnh</label>
 						<p><img src="source/image/blog/{{$tintuc->image}}" width="100px"></p>
 						<input class="form-control" type="file" name="image" />
 					</div>
 					
 					<button type="submit" class="btn btn-default">Sửa</button>
 					<button type="reset" class="btn btn-default">Làm mới</button>
 					<form>
 					</div>
 				</div>
 				<!-- /.row -->
 			</div>
 			<!-- /.container-fluid -->
 		</div>
 		<!-- /#page-wrapper -->

 		@endsection