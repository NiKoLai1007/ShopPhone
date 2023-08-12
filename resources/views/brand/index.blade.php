@extends('layouts.master')
@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header car d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Brand Lists</h3>
                                <a href="{{ route('createbrands') }}" class="btn btn-dark btn-sm btn-rg"><i class="fas fa-plus"></i> Add Brands</a>
                            </div>
                        </div>
                        <br>
                        @if(session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table id="brandTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">ID</th>
                                        <th style="width: 10%;">Image</th>
                                        <th style="width: 15%;">Name</th>
                                        <th style="width: 15%;">Slug</th>
                                        <th style="width: 25%;">Description</th>
                                        <th style="width: 15%;">Created at</th>
                                        <th style="width: 15%;">Updated at</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>
                                            <img src="{{ asset('storage/uploads/brands/' . $brand->image) }}" alt="{{ $brand->name }}" class="img-thumbnail" width="100">
                                        </td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td>{{ $brand->created_at }}</td>
                                        <td>{{ $brand->updated_at }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('editbrands', $brand->id) }}" class="btn btn-sm" style="background-color: #fb5530; color: #fff; margin-right: 0.5rem;"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('deletebrands', $brand->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#brandTable').DataTable();
    });
</script>
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@endsection
