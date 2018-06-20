<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin/thongke/danhsach">Quản trị hệ thống</a>
    </div>
    <!-- /.navbar-header -->

    <div class="navbar-header">
        <a href="trang-chu" class="navbar-brand" target="_blank">Go Website</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown --> 

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href=""><i class="fa fa-user fa-fw"></i>Trang cá nhân</a></li>
                <li><a href="admin/user/sua/id"><i class="fa fa-gear fa-fw"></i>Cài đặt</a>
                </li>
                <li class="divider"></li>
                <li><a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    @include('admin.layout.menu')
</nav>