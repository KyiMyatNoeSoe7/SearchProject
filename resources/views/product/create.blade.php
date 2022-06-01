<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <title>Laravel 8 CRUD Tutorial</title>
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    </head>
    
    <body>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" style="background-color: #4BA3EB;">
                            <h4 class="text-center text-white mt-2">Create Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="post">
                                @csrf
    
                                <div class="form-group mt-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="name" id=""
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product name">
                                    @error('name')
                                        <span class="text-danger text-bold">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category_id[]" id=""
                                        class="form-control @error('category_id[]') is-invalid @enderror" multiple>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger text-bold">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group mt-3">
                                    <label for="">Price</label>
                                    <input type="text" name="price" id=""
                                        class="form-control @error('price') is-invalid @enderror" placeholder="Enter price">
                                    @error('price')
                                        <span class="text-danger text-bold">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-icon text-white px-5 py-2"
                                        data-toggle="tooltip">Create Product</button>
                                    <a href="{{ route('product.index') }}"
                                        class="px-3 py-2 btn btn-outline-secondary btn-rounded btn-icon float-right"
                                        title="Cancel">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </body>
</html>