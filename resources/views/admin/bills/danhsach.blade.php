 @extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Hóa Đơn
					<small>Danh Sách</small>

				</h1>
			</div>
			<!-- /.col-lg-12 -->
			@if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif 
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>ID Khách Hàng</th>
						<th>Tổng Tiền</th>
						<th>Ghi Chú</th>
						<th>Ngày Đặt</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody>

					@foreach($bills as $b)
					<tr class="odd gradeX" align="center">
						<td>{{$b->id}}</td>
						<td>{{$b->id_customer}}</td>
						<td>{{$b->total}}</td>
						<td>{{$b->note}}</td>
						<td>{{$b->created_at}}</td>
						<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoa/{{$b->id}}"> Delete</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/hoadon/sua/{{$b->id}}">Edit</a></td>
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