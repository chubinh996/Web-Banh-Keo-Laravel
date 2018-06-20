 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-12">
 				<h1 class="page-header">Tin Tức
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
 						<th>Tiêu đề</th>
 						<th>Nội dung</th>
 						<th>Mô Tả Ngắn</th>
 						<th>Ảnh</th>
 						
 						<th>Delete</th>
 						<th>Edit</th>
 					</tr>
 				</thead>
 				<tbody>
 					@foreach($tintuc as $tt)
 					<tr class="odd gradeX" align="center">
 						<td>{{$tt->id}}</td>
 						<td>{{$tt->title}}</td>
 						<td>{{$tt->content}}</td>
 						<td>{{$tt->short_description}}</td>					
 						<td><img src="source/image/blog/{{$tt->image}}" width="100px"></td>
						<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}"> Delete</a></td>
 						<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Edit</a></td>
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