 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-12">
 				<h1 class="page-header">Sản phẩm
 					<small>Danh Sách</small>
 				</h1>
 			</div>
 			<!-- /.col-lg-12 -->
 			@if(session('thongbao'))
 			<div class="alert alert-success">
 				{{session('thongbao')}}
 			</div>
 			@endif
 			<table class="table table-striped table-bordered table-hover table-responsive" id="dataTables-example">
 				<thead>
 					<tr align="center">
 						<th>ID</th>
 						<th>Tên Sản Phẩm</th>
 						<th>Tên Thể Loại</th>
 						<th>Mô Tả Ngắn</th>
 						<th>Mô Tả</th>
 						<th>Gía nhập</th>
 						<th>Gía bán(%)</th>
 						<th>Gía Khuyến Mãi(%)</th>
 						<th>Ảnh</th>
 						<th>Sản Phẩm Mới</th>
 						<th>Delete</th>
 						<th>Edit</th>
 					</tr>
 				</thead>
 				<tbody>
 					@foreach($sanpham as $sp)
 					<tr class="odd gradeX" align="center">
 						<td>{{$sp->id}}</td>
 						<td>{{$sp->name}}</td>
 						<td>{{$sp->product_type->name}}</td>
 						<td>{{$sp->short_description}}</td>
 						<td>{{$sp->description}}</td>
 						<td>{{$sp->unit_price}}</td>
 						<td>{{$sp->sale_price}}</td>
 						<td>{{$sp->promotion_price}}</td>
 						<td><img src="source/image/product/{{$sp->image}}" width="100px"></td>
 						<td>{{$sp->new}}</td>
 						
 						<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/sanpham/xoa/{{$sp->id}}"> Delete</a></td>
 						<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham/sua/{{$sp->id}}">Edit</a></td>
 					</tr>
 					@endforeach
 				</tbody>
 			</table>
 		</div>
 		<!-- /.row -->
 	</div>
 	<!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->

 @endsection