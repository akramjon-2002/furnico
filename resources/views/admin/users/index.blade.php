@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" >
                                        Users
                            </li>
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
                    </div>
                        <div class="col-12">

                        </div>
                       </div>


                <div class="row">
                    <div class="col-8">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Date</th>
                                        <th colspan="3" class="text-center">Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>
                                                @foreach($user->roles as $role)
                                                    {{ $role->name }}@if(!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>{{$user->created_at}}</td>
                                            <td><a href="{{route('backend.user.show', $user->id)}}"><i
                                                        class="nav-icon fa-regular fa-eye"></i></a>
                                            <td><a href="{{route('backend.user.edit', $user->id)}}"><i
                                                        class="nav-icon fa-solid fa-pen-fancy"></i></a>
                                            <td>
                                                <form action="{{route('backend.user.delete', $user->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="text-danger fa-solid fa-trash-can" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
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
