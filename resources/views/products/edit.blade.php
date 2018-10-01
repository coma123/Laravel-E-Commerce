@extends('layouts.app')

@section('content')
<div class="row mt-5">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header text-center bg-info text-white">Edit product</div>
            <div class="card-body">
                <form action="{{ route('products.update', ['id' => $product->id]) }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter product name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter product description">{{ $product->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Edit Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
