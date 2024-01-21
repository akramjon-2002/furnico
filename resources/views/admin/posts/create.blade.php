@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.post.index')}}">Posts</a></li>
                            <li class="breadcrumb-item active">Create post</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('backend.post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Post name">
                            </div>
                            @error('title')
                            <div class="text-danger mb-4">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea id="summernote" name="content" class="form-control"></textarea>
                        </div>
                        @error('content')
                        <div class="text-danger mb-4">{{$message}}</div>
                        @enderror
                    </div>


                    {{--для фото--}}
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Add main photo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile"
                                               name="image" >
                                        <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger mb-4">{{$message}}</div>
                        @enderror
                    </div>
                    {{-- для фото --}}



                    {{--        для тега            --}}

                    <div class="col-md-1">
                        <div class="form-group ">
                            <input type="submit" class="btn btn-primary btn-block" value="Save">
                        </div>
                    </div>
                    </form>

                </div>


            </div>
    </div>
    </section>


    </div>
@endsection
