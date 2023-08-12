<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Method</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
<body background="{{ asset('storage/uploads/brands/1.jpg') }}">
    <div class="container" style="margin-top: 20px;">

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header car d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Payment Method Lists</h3>
                                    <a href="{{route('createpayment')}}" class="btn btn-dark btn-sm btn-rg"><i class="fas fa-plus"></i> Add Payment Type</a>
                                </div>
                            </div>
                            @if(session('message'))
                            <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    @foreach($payment as $paymentmethod)
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Deliver Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                 
                                        <tr>
                                            <td>
                                                
                                            <img src="{{asset('storage/uploads/brands/'.$paymentmethod->payment_image)}}" alt="" class="img-thumbnail" width="100"></td>
            
                                            <td>{{$paymentmethod->type}}</td>
                                     
                                            <td>


                                                <div class="d-flex">
                                                    <a href="{{route('editPayment',$paymentmethod->id)}}" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>

                                                    <a href="{{ route('deletePayment',$paymentmethod->id) }}" class="btn btn-danger btn-sm mr-2"><i class="fas fa-delete"></i> Delete</a>
                                                </div>
                                            </td>
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


</body>

</html>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection