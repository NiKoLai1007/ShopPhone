{{--  @extends('layouts.app')  --}}
@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   {{--  <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">  --}}
    {{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    {{--  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">  --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <title>Products</title>
</head>

<body style="background: url('{{ asset('storage/uploads/brands/1.jpg') }}')">
    <div class="container" style="margin-top: 20px;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header car d-flex justify-content-between align-items-center">
                                    <h3 class="card-title">Product Lists</h3>
                                    <a href="{{ route('createproducts') }}" class="btn btn-dark btn-sm btn-rg"><i class="fas fa-plus"></i> Add Product</a>
                                </div>
                            </div>
                            @if(session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                            {{--  <div class="table-responsive">
                                <table id="mytable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $pbrands)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/uploads/brands/'.$pbrands->image) }}" alt="{{ $pbrands->name }}" class="img-thumbnail" width="100">
                                            </td>
                                            <td>{{ $pbrands->name }}</td>
                                            <td>{{ $pbrands->slug }}</td>
                                            <td>{{ $pbrands->price }}</td>
                                            <td>{{ $pbrands->quantity }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('editproducts', $pbrands->id) }}" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i> Edit</a>
                                                    <a href="{{ route('deleteproducts', $pbrands->id) }}" class="btn btn-danger btn-sm mr-2"><i class="fas fa-trash"></i> Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>  --}}
                            {!! $dataTable->table() !!}
                            {!! $dataTable->scripts() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    {{--  <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>  --}}
</body>

</html>

@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection

