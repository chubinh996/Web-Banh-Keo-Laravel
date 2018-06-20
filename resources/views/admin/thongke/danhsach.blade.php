 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
 	<div class="container-fluid">
 		<div class="row">
 			<div class="col-lg-12">
 				<h1 class="page-header">Thống kê
 				</h1>
 			</div>
 			<div class="col-lg-12">
 				<a href="admin/theloai/danhsach">
 					<div class="col-lg-3">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Thể Loại</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/theloai.jpg" alt="" style="max-width: 100%">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								Có {{count($theloai)}} thể loại
 							</div>
 						</div>
 					</div>
 				</a>
 				<a href="admin/sanpham/danhsach">
 					<div class="col-lg-3">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Sản Phẩm</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/sanpham.png" alt="" style="max-width: 100%">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								Có {{count($sanpham)}} sản phẩm
 							</div>
 						</div>
 					</div>
 				</a>
 				<a href="admin/tintuc/danhsach">
 					<div class="col-lg-3">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Tin Tức</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/tintuc.jpg" alt="" style="max-width: 100%">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								Có {{count($tintuc)}} tin tức
 							</div>
 						</div>
 					</div>
 				</a>
 				<a href="admin/user/danhsach">
 					<div class="col-lg-3">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Khách Hàng</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/user.jpg" alt="" style="max-width: 100%">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								Có {{count($user)}} khách hàng
 							</div>
 						</div>
 					</div>
 				</a>
 			</div>
 			<div class="col-lg-12">
				<a href="admin/hoadon/danhsach">
 					<div class="col-lg-4">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Hóa Đơn</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/hoadon.jpg" alt="" style="max-width: 100%; width: 300px; height: 200px">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								Có {{count($hoadon)}} hóa đơn
 							</div>
 						</div>
 					</div>
 				</a>
 				<a href="admin/chitiethoadon/danhsach">
 					<div class="col-lg-4">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Chi Tiết Hóa Đơn</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/cthoadon.jpg" alt="" style="max-width: 100%">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								Có {{count($cthoadon)}} chi tiết hóa đơn
 							</div>
 						</div>
 					</div>
 				</a>
 				<a href="admin/thongke/lietke">
 					<div class="col-lg-4">
 						<div class="panel panel-info">
 							<div class="panel-heading" style="text-align: center;">
 								<h3>Thống Kê</h3>
 							</div>
 							<div class="panel-body" style="text-align: center; min-height: 220px; max-height: 220px">
 								<img src="source/image/thongke.jpg" alt="" style="max-width: 100%">
 							</div>
 							<div class="panel-footer" style="text-align: center;">
 								
 							</div>
 						</div>
 					</div>
 				</a>
 			</div>
 		</div>
 		<!-- /.row -->
 	</div>
 	<!-- /.container-fluid -->
 </div>
 <!-- /#page-wrapper -->

 @endsection