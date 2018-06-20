 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách Hàng
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
                
                <form action="admin/user/them" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Họ Và Tên</label>
                        <input class="form-control" name="full_name" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" name="password"  />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="phone" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address" />
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input class="form-control" name="birthday" type="date" />
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