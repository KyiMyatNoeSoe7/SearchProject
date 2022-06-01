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
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header" style="background-color: #4BA3EB;">
                            <h4 class="text-center text-white mt-2">Create Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
    
                                <div class="form-group mt-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id=""
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter Product name">
                                    @error('name')
                                        <span class="text-danger text-bold">{{ $message }}</span>
                                    @enderror
                                </div>
    
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-icon text-white px-5 py-2"
                                        data-toggle="tooltip">Create</button>
                                    <a href="{{ route('category.index') }}"
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