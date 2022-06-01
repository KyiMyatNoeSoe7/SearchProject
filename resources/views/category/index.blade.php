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
                    <a href="{{ route('product.index') }}"
                                        class="btn btn-outline-secondary btn-rounded btn-icon float-right  mb-3"
                                        title="Product">Product</a>
                    <a href="{{ route('category.create') }}" class="btn btn-primary float-right mb-3"><i
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
                    <div class="card">
                        <div class="card-header text-light bg-dark">
                            Category
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @if(!$categories->isEmpty())
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                            
                                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info m-1"
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
                                        <h4 class="text-info row justify-content-center">No categories found.</h4>
                                    </td>
                                </tr>
                                @endif
                            </table>
                            {!! $categories->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
