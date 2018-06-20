 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<table class="table table-striped table-responsive">
 				<caption style="text-align: center;"><h1>Thống Kê</h1></caption>
 				<thead>
 					<tr>
 						<th>Hóa Đơn</th>
 						<th>Tổng sản phẩm bán được</th>
 						<th>Tổng thu nhập</th>
 						<th>Tổng tiền gốc</th>
 						<th>Tổng Lãi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<td>Có {{count($hoadon)}} hóa đơn</td>
 						<td>{{$sumqty}}</td>
 						<td><?php echo number_format($orderss[0]->totals); ?></td>
 						<td><?php echo number_format($orders[0]->total); ?></td>
 						<td><?php echo number_format($orderss[0]->totals - $orders[0]->total); ?></td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 		<!-- /.row -->
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
 		<!-- <div class="row">
 			<table class="table table-striped table-responsive">
 				<thead>
 					<tr>
 						<th>Tổng sản phẩm bán được</th>
 						<th>Tổng thu nhập</th>
 						<th>Tổng tiền bỏ ra</th>
 						<th>Tổng Lãi</th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<td></td>
 						<td>data</td>
 						<td>data</td>
 						<td>data</td>
 					</tr>
 				</tbody>
 			</table>
 		</div> -->
 	</div>
 	<!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->

 @endsection