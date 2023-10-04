<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Product</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Product</h1>
            <form action="{{ isset($single_pr) ? route('update', $single_pr->id) : route('store')  }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ isset($single_pr->name) ?$single_pr->name:'' }}" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" value="{{ isset($single_pr->price) ?$single_pr->price:'' }}" class="form-control" id="price">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Leave a description here" id="description" name="description">{{ isset($single_pr->description) ?$single_pr->description:'' }}</textarea>
                    <label for="description">Description</label>
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>

        <div class="row mt-4">
            <h1 class="text-center">Show Products</h1>
            <div class="mt-2 d-flex">
                <form action="{{route('search')}}" method="get">
                    @csrf
                    <input type="text" name="search" class="form-control" >
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
            </div>
            <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @isset($product)
                @foreach ($product as $item)
                  <tr>
                    <th scope="row">{{$loop->index+1}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->description}}</td>
                    <td><a href="{{ route('edit', $item->id) }}" class="btn btn-success">Edit</a>&nbsp;<a href="{{ route('delete', $item->id) }}" class="btn btn-danger"> Delete</a></td>
                  </tr>   
                @endforeach
                @endisset
                </tbody>
              </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')

</body>

</html>
