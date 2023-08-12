@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <div class="card">
                            <div class="card-header car d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Pending Orders</h3>
                            </div>
                        </div>

                        @php
                            $previousOrderId = null;
                            $pendingTotal = 0;
                        @endphp

                        @foreach ($orders as $order)
                            @if ($order->status !== 'cancelled')
                                @if ($order->order_id != $previousOrderId)
                                    @if (!is_null($previousOrderId))
                                        </tbody>
                                        </table>
                                        <div class="overall-total">
                                            <strong>Overall Total:</strong> ${{ $pendingTotal }}
                                        </div>
                                        <div>
                                            <form action="{{ route('cancelOrders', $previousOrderId) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                    @endif
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
                                @endif
                                <tr>
                                    <td>{{ $order->order_id }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->quantity }}</td>
                                    <td>${{ $order->price }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                                @php
                                    $previousOrderId = $order->order_id;
                                    $orderStatus = $order->status;
                                    $pendingTotal += $order->price;
                                @endphp
                            @endif
                        @endforeach
                        </tbody>
                        </table>
                        <div class="overall-total">
                            <strong>Overall Total:</strong> ${{ $pendingTotal }}
                        </div>
                        <div>
                            <form action="{{ route('cancelOrders', $previousOrderId) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to cancel this order?')">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Right container for Cancelled Orders -->
            </div>
        </div>
    </div>
</div>



    @endsection
