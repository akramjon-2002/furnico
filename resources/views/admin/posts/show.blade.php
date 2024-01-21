@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{$post->title}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.post.index')}}">Posts</a></li>
                            <li class="breadcrumb-item active">{{$post->title}}</li>
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
                    <div class="col-8">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{$post->id}}</td>

                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{$post->title}}</td>

                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 150 ) }}</td>

                                    </tr>

                                   <tr>
                                       <td>Photo</td>
                                       <td>
                                           @if($post->photo_path)
                                               <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Post Image" style="max-width: 100px; max-height: 80px;">
                                           @else
                                               No Image
                                           @endif
                                       </td>
                                   </tr>

                                    <tr>
                                        <td>Created</td>
                                        <td>{{$post->created_at}}</td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>`


            </div>
        </section>
    </div>
@endsection
