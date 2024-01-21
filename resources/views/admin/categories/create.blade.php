@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Categories</a>
                            </li>
                            <li class="breadcrumb-item active">Create category</li>

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
                    <form action="{{route('backend.category.store')}}" method="post" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>

                            <input type="text" class="form-control" name="name" placeholder="category name">
                        </div>
                        @error('name')
                        <div class="text-danger mb-4">These fields must be filled out</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
