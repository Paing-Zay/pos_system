@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">
<div class="product-container">

    <div class="product-header">
        <h2>🛍️ Product Page</h2>

        <a href="/products/create" class="add-new-product-btn">
            + Add Product
        </a>
    </div>

    <div class="product-cards">

        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src=""
                                class="product-image">
                        </td>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <span class="stock in-stock">
                                {{ $product->status }}
                            </span>
                        </td>

                        <td>
                            <a href="/products/{{ $product->id }}/edit" class="add-product-btn">
                                <i class="fa-solid fa-pencil"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" 
                                method="POST" 
                                style="display:inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" 
                                        class="delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection