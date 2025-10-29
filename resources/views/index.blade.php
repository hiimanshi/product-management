@extends('layouts.product')

@section('content')
    <h3 class="auth-title">Product List</h3>

    @auth
        @if (auth()->user()->is_admin)
            <a href="{{ route('products.create') }}" class="btn">Add Product</a>
        @endif

    @endauth

    <table border="1" class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                @if (auth()->user()?->is_admin)
                    <th>Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->stock }}</td>
                    @if (auth()->user()?->is_admin)
                        <td>
                            <a href="{{ route('products.edit', $p->id) }}">Edit</a> |
                            <form method="POST" action="{{ route('products.destroy', $p->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
