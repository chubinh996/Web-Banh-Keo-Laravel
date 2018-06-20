 @extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Khách Hàng
					
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
				<form action="admin/user/sua/{{$user->id}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="form-group">
                        <label>Họ Và Tên</label>
                        <input class="form-control" name="full_name" value="{{$user->full_name}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" value="{{$user->email}}" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input class="form-control" type="password" name="password" value="{{$user->password}}" />
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input class="form-control" name="phone" value="{{$user->phone}}" />
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input class="form-control" name="address" value="{{$user->address}}" />
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input class="form-control" name="birthday" type="date" value="{{$user->birthday}}" />
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