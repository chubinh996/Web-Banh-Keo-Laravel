 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-12">
 				<h1 class="page-header">Hóa Đơn

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
 				<form action="admin/hoadon/sua/{{$bills->id}}" method="POST">
 					<input type="hidden" name="_token" value="{{csrf_token()}}">

 					<div class="form-group">
 						<label>Id Khách Hàng</label>
 						<input class="form-control" name="id_customer" value="{{$bills->id_customer}}"/>
 					</div>
 					<div class="form-group">
 						<label>Tổng Tiền</label>
 						<input class="form-control" name="total" value="{{$bills->total}}" />
 					</div>
 					<div class="form-group">
 						<label>Ghi Chú</label>
 						<textarea name="note"  id="demo" class="form-control ckeditor" rows="2">{{$bills->note}}
 						</textarea>
 					</div>
 					<div class="form-group">
 						<label>Ngày Đặt</label>
 						<input class="form-control" type="date" name="date_order" value="{{$bills->created_at}}" />
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
 	</div>
 </div>
 <!-- /#page-wrapper -->

 @endsection