@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <div class="card">
                                <div class="card-header car d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Order History (Cancelled Orders)</h3>
                                </div>
                            </div>

                            <div class="order-container card mb-3">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cancelledOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->name }}</td>
                                        <td> {{$order->quantity }}</td> <!-- Quantity is not available in the current query -->
                                            <td>${{ $order->price }}</td>
                                            <td>Cancelled</td>
                                        </tr>
                                    @endforeach
                                    


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
