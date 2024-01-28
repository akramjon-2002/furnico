@extends('layouts.main')
@section('content')

    @php
        $summa = 0;
        $totalAmount = 0;
    @endphp


        <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">

                        <div id="totalAmount"></div>
                        <table class="table" id="cartTable">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">Mahsulot rasmi</th>
                                <th class="product-name">Mahsulot nomi</th>
                                <th class="product-price">Mahsulot narxi</th>
                                <th class="product-quantity">Mahsulot miqdori</th>
                                <th class="product-total">Umumiy summa</th>
                                <th class="product-remove">Savatchadan o'chirish</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @php
                                    $summa += $product['product']->price * $product['quantity'];
                                @endphp
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{ asset('/assets/images/product-1.png') }}" alt="Image"
                                             class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $product['product']->name }}</h2>
                                    </td>
                                    <td class="product-price">{{ $product['product']->price }}</td>

                                    <td class="product-quantity"
                                        data-quantity="{{ $product['quantity'] }}">{{ $product['quantity'] }}</td>
                                    <td class="totalAmount">{{ $product['product']->price * $product['quantity'] }}</td>


                                    <!-- ... -->
                                    <td><a class="btn btn-black btn-sm remove-item"
                                           data-product-id="{{ $product['product']->id }}">X</a></td>

                                    </td>
                                    <!-- ... -->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <a href="{{route('frontend.product.shop')}}" class="btn btn-black btn-sm btn-block">Haridni
                                davom ettirish</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Jami narxi</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{$summa}}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 btn-block" onclick="placeOrder()">Sotib olish</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--    js--}}

    <script>
        $(document).ready(function () {
            $('.remove-item').on('click', function (e) {
                e.preventDefault();
                var productId = $(this).data('product-id');
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'POST',
                    url: '/frontend/remove-from-cart/' + productId,
                    data: {
                        _token: csrfToken
                    },
                    success: function (response) {
                        if (response.success) {
                            var $removedRow = $(e.target).closest('tr');
                            if ($removedRow.siblings('tr').length > 0) {
                                $removedRow.fadeOut(300, function () {
                                    $removedRow.remove();
                                });
                            } else {
                            }
                            location.reload();
                        } else {
                            alert('Failed to remove item from cart. ' + response.message);
                        }
                    },
                    error: function () {
                        alert('So\'rov yuborishda muammo yuz berdi');
                    }
                });
            });
        });


            function placeOrder() {
            // Ваш код для обработки заказа, например, отправка данных на сервер

            // После успешной обработки заказа, вызываем SweetAlert2
            showOrderConfirmationMessage();
        }

            function showOrderConfirmationMessage() {
            Swal.fire({
                icon: 'success',
                title: 'Заказ принят и обрабатывается',
                text: 'Спасибо за ваш заказ!',
                showConfirmButton: false,
                timer: 2000
            });
        }

    </script>

@endsection
