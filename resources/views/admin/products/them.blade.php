 @extends('admin.layout.index')

 @section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                
                <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="theloai">
                            @foreach($theloai as $tl)
                            <option value="{{$tl->id}}">{{$tl->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả Ngắn</label>
                        <textarea name="short_description" id="demo" class="form-control ckeditor" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea name="description"  id="demo" class="form-control ckeditor" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gía Nhập</label>
                        <input class="form-control" name="unit_price" />
                    </div>
                    <div class="form-group">
                        <label>Gía Bán</label>
                        <input class="form-control" name="sale_price" />
                    </div>
                    <div class="form-group">
                        <label>Gía Khuyến Mãi</label>
                        <input class="form-control" name="promotion_price" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input class="form-control" type="file" name="image" id="image" />
                    </div>
                    <div class="form-group">
                        <label>Sản phẩm mới</label>
                        <input class="form-control" name="new" />
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