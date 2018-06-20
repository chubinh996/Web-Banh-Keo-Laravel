 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row" style="text-align: center;">
 			<h1>Thống kê</h1>
 		</div>
 		<div class="row"> 
 			<div class="col-xs-6">
 				<form action="admin/thongke/lietke" method="POST" enctype="multipart/form-data" class="form-horizontal">
 					<input type="hidden" name="_token" value="{{csrf_token()}}" />
 					<div class="form-group">
 						<label for="inputEmail3" class="col-sm-2 control-label">Từ ngày</label>
 						<div class="col-sm-10">
 							<input type="date" class="form-control" id="fromday" name="fromday" required>
 						</div>
 					</div>
 					<div class="form-group">
 						<label for="inputPassword3" class="col-sm-2 control-label">Đến ngày</label>
 						<div class="col-sm-10">
 							<input type="date" class="form-control" id="today" name="today" required>
 						</div>
 					</div>
 					<div class="form-group">
 						<div class="col-sm-offset-2 col-sm-10">
 							<button type="submit" class="btn btn-info">Xem thống kê</button>
 						</div>
 					</div>
 				</form>
 			</div>
 		</div>
 		<div class="row">
 			<table class="table table-striped table-responsive">
 				<thead>
 					<tr>
 						<th>Tổng sản phẩm bán được</th>
 						<th>Tổng thu nhập</th>
 						<th>Tổng tiền gốc</th>
 						<th>Tổng Lãi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<td><?php echo $date[0]->total; ?></td>
 						<td><?php echo number_format($date2[0]->totals); ?></td>
 						<td><?php echo number_format($date3[0]->totalss); ?></td>
 						<td><?php echo number_format($date2[0]->totals - $date3[0]->totalss); ?></td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 	<!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->

 @endsection