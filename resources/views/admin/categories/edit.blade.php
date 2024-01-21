@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.category.index')}}">Categories</a>
                            </li>
                            <li class="breadcrumb-item active">Edit category</li>

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
                    <form action="{{ route('backend.category.update', $category->id) }}" method="post" class="col-4">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="name" id="title" placeholder="category name" value="{{ $category->name }}">
                        </div>
                        @error('title')
                        <div class="text-danger mb-4">These fields must be filled out</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Update">
                    </form>

                </div>
            </div>
        </section>
    </div>
@endsection
