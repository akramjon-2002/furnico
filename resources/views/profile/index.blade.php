@extends('layouts.main')

@section('content')

<section style="background-color: #f8f9fa;">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('frontend.home')}}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Foydalanuvchi profili</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Shaxsiy malumotlar</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-3">
                                <p class="mb-0">To'liq ismi:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">@if(isset($user->name)) {{ $user->name }} @endif</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row mb-2">
                            <div class="col-sm-3">
                                <p class="mb-0">Email:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">@if(isset($user->email)) {{ $user->email }} @endif</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row mb-2">
                            <div class="col-sm-3">
                                <p class="mb-0">Telefon raqami:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">@if(isset($user->phone)) {{ $user->phone }} @endif</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Buyurtmalar tarixi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                <tr>
                                    <th>Buyurtma raqami</th>
                                    <th>Buyurtma malumotlari</th>
                                    <th>Holati</th>
                                    <th>Buyurtma qilingan kun</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($orders))
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->details }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">Hozircha buyurtma yo'q</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 ms-auto">
                <div class="d-grid mb-2">
                    <a href="{{route('user.logout')}}" class="btn btn-primary" type="button">Chiqish</a>
                </div>
            </div>

            <div class="col-lg-2 ms-auto">
                <div class="d-grid mb-2">
                    <a href="{{route('user.change-password')}}" class="btn btn-primary" type="button">Parolni o'zgartirish</a>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection
