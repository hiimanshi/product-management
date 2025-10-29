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

    <form method="POST" action="{{ route('products.store') }}" class="product-form">
        @csrf
         <table border="0" class="table mt-3">
            <tr class="mb-3">
                <td><label for="name" class="form-label fw-bold">Product Name</label></td>
                <td><input type="text" name="name" placeholder="Name" required></td>
            </tr>
            <tr class="mb-3">
                <td><label for="name" class="form-label fw-bold">Description</label></td>
                <td><textarea name="description" placeholder="Description"></textarea></td>
             </tr>
            <tr class="mb-3">
                <td><label for="name" class="form-label fw-bold">Price</label></td>
                <td><input type="number" step="0.01" name="price" placeholder="Price" required></td>
             </tr>
            <tr class="mb-3">
                <td><label for="name" class="form-label fw-bold">Stock Quantity</label></td>
                <td><input type="number" name="stock" placeholder="Stock" required></td>
                <!-- <button type="submit">Save</button> -->
            </tr>
            </table>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary px-4">Back</a>
                    <button type="submit" class="btn btn-primary px-4">Save Product</button>
                </div>
    </form>
@endsection