@extends('layouts.product')

@section('content')
    <h3 class="auth-title">Add Product</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- <h2>Add Product</h2> -->
    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


   <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}" class="product-form p-4 border rounded bg-light shadow-sm">
        @csrf 
        @method('PUT')
        <table border="0" class="table mt-3">
            <tr class="mb-3">
                <td><label for="name" class="form-label fw-bold">Product Name</label></td>
                <td><input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required></td>
            </tr>

            <tr class="mb-3">
                <td><label for="description" class="form-label fw-bold">Description</label></td>
                <td><textarea id="description" name="description" class="form-control" rows="3">{{ $product->description }}</textarea></td>
            </tr>

            <tr class="mb-3">
                <td><label for="price" class="form-label fw-bold">Price</label></td>
                <td><input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ $product->price }}" required></td>
            </tr>

            <tr class="mb-3">
                <td><label for="stock" class="form-label fw-bold">Stock Quantity</label></td>
                <td><input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}" required></td>
            </tr>

        </table>
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Back</a>
            <button type="submit" class="btn btn-primary px-4">Update Product</button>
        </div>
    </form>

@endsection
