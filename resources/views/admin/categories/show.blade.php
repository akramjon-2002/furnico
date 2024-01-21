@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$category->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Categories</a></li>
                            <li class="breadcrumb-item active">{{$category->name}}</li>
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
                    <div class="col-8">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{$category->id}}</td>

                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$category->name}}</td>

                                    </tr>
                                    <tr>
                                        <td>Created</td>
                                        <td>{{$category->created_at}}</td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
