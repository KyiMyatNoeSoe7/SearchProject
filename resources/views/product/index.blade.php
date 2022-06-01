<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>Laravel 8 CRUD Tutorial</title>
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    
    <body>
    
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                <div class="">
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-left mb-3"><i
                        class="fa fa-arrow-circle-left mr-1"></i>Category Create</a>
                    <a href="{{ route('product.create') }}" class="btn btn-primary float-left mb-3"><i
                        class="fa fa-arrow-circle-left mr-1"></i>Create</a>
                    <form class="form-group float-right mb-3">
                            <div class="input-group">
                                <input name="search" class="form-control" type="search" placeholder="Search" aria-label="Search"
                                    value="{{ request('search') }}">
                                <div class="input-group-append mr-n3">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                    </form>
                </div>
                    <div class="card">
                        <div class="card-header text-light bg-dark">
                            Product
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th> Date </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @if(!$products->isEmpty())
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>
                                            @foreach($product->categories as $category)
                                                {{ $category->name }}<br>
                                            @endforeach</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                            
                                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info m-1"
                                                        data-toggle="tooltip"><i class="fa fa-eye"></i>Edit</a>
                                                    <button type="submit" class="btn btn-danger m-1"
                                                        onclick="return confirm('Are you sure want to delete?')"><i
                                                            class="fa fa-trash-alt"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @else
                                <tr>
                                    <td colspan="4">
                                        <h4 class="text-info row justify-content-center">No products found.</h4>
                                    </td>
                                </tr>
                                @endif
                            </table>
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
