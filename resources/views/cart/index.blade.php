<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-5">Shopping Cart</h1>

        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">

                        @foreach ($cart as $productcarts)
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/uploads/brands/' . $productcarts->product->image) }}" class="img-fluid" alt="Product image">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="mb-3">{{ $productcarts->product->name }}</h5>
                                    <form action="{{ route('updatecartitem', $productcarts->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <div class="input-group mb-3" style="max-width: 200px;">
                                            <span class="input-group-text" id="qty">Quantity</span>
                                            <input type="number" name="quantity" value="{{ $productcarts->quantity }}" class="form-control" min="1" aria-label="Quantity" aria-describedby="qty">
                                            <button type="submit" class="btn btn-outline-secondary">Update</button>
                                        </div>
                                    </form>
                                    <p class="mb-2">Price: <strong>₱{{ number_format($productcarts->product->price, 2) }}</strong></p>
                                    <p class="mb-2">Subtotal: <strong>₱{{ number_format($productcarts->product->price * $productcarts->quantity, 2) }}</strong></p>
                                    <a href="{{ route('deletecartitem', $productcarts->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Total Orders</h5>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart as $productcarts)
                            @php
                                $total += $productcarts->product->price * $productcarts->quantity;
                            @endphp
                        @endforeach
                        <h3 class="mb-3">₱{{ number_format($total, 2) }}</h3>
                        <a href="{{ route('gocheckout') }}" class="btn btn-success btn-lg">Proceed to Checkout</a>
                    </div>
                </div>
                <a href="{{ route('productcollection') }}" class="btn btn-dark btn-lg mb-3">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection


</html>
