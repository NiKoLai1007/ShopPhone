<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-header.bg-custom {
            background-color: #fb5530;
        }

        .btn-save {
            background-color: #fb5530;
            border-color: #fb5530;
        }

        .btn-save:hover {
            background-color: #d03e1f;
            border-color: #d03e1f;
        }
    </style>
</head>


<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-custom text-white">
                <h4 class="mb-0">Edit Brand</h4>
            </div>
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                <form action="{{ route('updatebrands',$brands->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Brand Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $brands->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Brand Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{ $brands->slug }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Brand Description</label>
                        <textarea id="description" name="description" class="form-control" rows="3" required>{{ $brands->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Brand Image</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        <br>
                        <img src="{{asset('storage/uploads/brands/'.$brands->image)}}" width="100px" height="100px">
                    </div>
                    <div class="form-group text-right">
                        <a href="{{ route('viewbrands') }}" class="btn btn-secondary">Back to brand lists</a>
                        <button type="submit" class="btn btn-save text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
