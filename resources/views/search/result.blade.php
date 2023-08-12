@extends('layouts.app')

@section('content')

<style>
  .btn {
    background-color: #fb5530 !important;
    float: none;
  }

  .btn {
    color: white !important;
  }

  .card-body {
    text-align: center;
  }
</style>

<div class="container py-5">

  <div class="row">
    @foreach ($products as $brand)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
      <div class="card">
        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
          <img src="{{ asset('storage/uploads/brands/' . $brand->image) }}" class="w-100" alt="{{ $brand->name }}" />
          <a href="#!">
            <div class="mask"></div>
            <div class="hover-overlay">
              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
            </div>
          </a>
        </div>
        <div class="card-body text-start">
          <a href="" class="text-reset text-decoration-none">
            <h3 class="card-title mb-3">{{ $brand->name }}</h3>
          </a>
          <h5 class="card-text"><strong>Brand:</strong> {{ $brand->name }}</h5>
          <p class="card-text"><strong>Description:</strong> {{ $brand->description }}</p>
          <p class="card-text"><strong>Price:</strong> ₱{{ $brand->price }}</p>
          <p class="card-text"><strong>Stocks:</strong> {{ $brand->quantity }}</p>
          <form action="{{ route('addtocart', $brand->id) }}" method="POST">
            @csrf
            <div class="input-group mb-3"></div>
            <div class="text-center">
              <button type="submit" class="btn"><i class="fas fa-cart-plus me-2"></i>Add to Cart</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
