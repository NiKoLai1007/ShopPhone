

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
  }

  .container {
    margin-top: 20px;
    display: flex;
  }

  .col-lg-9 {
    order: 2;
  }

  .col-lg-3 {
    order: 1;
  }

  .product-container {
    margin-top: 20px;
  }

  .product-card {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .card-body {
    padding: 15px;
  }

  .card-title {
    font-size: 16px;
    margin-bottom: 10px;
  }

  .card-text {
    font-size: 14px;
    color: #6c757d;
    margin-bottom: 5px;
  }

  .product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }

  .price {
    font-weight: bold;
    color: #fb5530;
  }

  .stock {
    color: #6c757d;
  }

  .btn-primary {
    background-color: #fb5530 !important;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 5px 10px;
    font-size: 14px;
    margin-top: 10px;
  }

  .sorting-container {
    margin-bottom: 20px;
  }

  .product-card:hover {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
</style>

@extends('layouts.app')
@section('content')

<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-9">
        <div class="row product-container">
          @foreach ($brandproducts as $brand)
          <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
            <div class="product-card">
              <div class="card">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
                  data-mdb-ripple-color="light">
                  <img src="{{ asset('storage/uploads/brands/' . $brand->image) }}" class="product-image"
                    alt="{{ $brand->name }}" />
                  <a href="#!">
                    <div class="mask"></div>
                    <div class="hover-overlay">
                      <div class="mask"
                        style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <div class="card-body text-start">
                  <a href="" class="text-reset text-decoration-none">
                    <h3 class="card-title mb-3">{{ $brand->name }}</h3>
                  </a>
                  <p class="card-text price"><strong>Price:</strong> ₱{{ $brand->price }}</p>
                  <p class="card-text stock"><strong>Stocks:</strong> {{ $brand->quantity }}</p>
                  <form action="{{route('addtocart',$brand->id)}}" method="POST">
                  <!-- <form action="{{route('cartindex',$brand->id)}}" method="POST"> -->
                    @csrf
                    <div class="input-group mb-3"></div>
                    <center>
                      <button type="submit" class="btn btn-primary"><i
                          class="fas fa-shopping-cart"></i> Add to Cart</button>
                      <button type="submit" class="btn btn-primary"><i
                          class="fas fa-money-bill-alt"></i> Buy Now</button>
                    </center>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-lg-3">
        <div class="sorting-container">
          <h5>Sort By:</h5>
          <select id="sortingSelect">
            <option value="price">Price</option>
            <option value="brand">Brand</option>
          </select>
          <button id="sortingButton"><i class="fas fa-sort"></i> Sort</button>
        </div>
      </div>
    </div>
  </div>
</body>
@endsection

</html>
