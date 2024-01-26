@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Main page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">main page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->


                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$users}}</h3>

                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa-solid fa-users-gear"></i>
                            </div>
                        </div>
                    </div>


                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$categories}}</h3>

                                <p>Category</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa fa-bars"></i>
                            </div>
                        </div>
                    </div>


                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$products}}</h3>

                                <p>Products</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa-solid fa-signs-post"></i>
                            </div>

                        </div>
                    </div>



                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$carts}}</h3>

                                <p>Carts</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fa-solid fa-tag"></i>
                            </div>
                        </div>
                    </div>




                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
