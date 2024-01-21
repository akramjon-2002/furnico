

@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h1>All Orders</h1>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td>{{ $cart->id }}</td>
                    <td>{{ $cart->user->name }}</td>
                    <td>
                        <ul>
                            @foreach($cart->cartItems as $cartItem)
                                <li>{{ $cartItem->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $cart->status ? 'Delivered' : 'Pending' }}</td>
                    <td>
                        @if (!$cart->confirmed)
                            <form action="{{ route('cart.confirm', $cart->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success">Confirm Delivery</button>
                            </form>
                        @else
                            Confirmed
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
