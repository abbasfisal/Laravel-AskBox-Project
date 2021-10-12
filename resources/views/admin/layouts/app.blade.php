<!DOCTYPE html>

<html lang="en">
@include('admin.layouts.partials._headTag')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- Navbar -->
@include('admin/layouts/partials/navbar')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('admin.layouts.partials._leftSideBar')

<!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            {{ isset($title) ? $title : 'not set title'}}
                        </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">

                    @yield('content')
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
@include('admin.layouts.partials._rightSideBar')
<!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('admin.layouts.partials._footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

@include('admin.layouts.partials._script')
</body>
</html>
