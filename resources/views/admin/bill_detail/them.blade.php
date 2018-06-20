 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi Tiết Hóa Đơn
                    <small>Thêm</small>
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
                
                <form action="admin/chitiethoadon/them" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Id Hóa Đơn</label>
                        <input class="form-control" name="id_bill"  />
                    </div>
                    <div class="form-group">
                        <label>Id Sản Phẩm</label>
                        <input class="form-control" name="id_product"  />
                    </div>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input class="form-control" name="quantity"  />
                    </div>
                    <div class="form-group">
                        <label>Đơn Gía</label>
                        <input class="form-control" name="unit_price"  />
                    </div>
                    
                    <button type="submit" class="btn btn-default">Thêm</button>
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