@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<div class="form-container">

    <div class="form-title">
        ✏️ Edit Product
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Product Code</label>
            <input type="text" name="product_code" value="{{ $product->product_code }}">
        </div>

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" value="{{ $product->category }}">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label>Cost Price</label>
            <input type="number" name="cost_price" value="{{ $product->cost_price }}">
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="in_stock" {{ $product->status == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="low_stock" {{ $product->status == 'low_stock' ? 'selected' : '' }}>Low Stock</option>
                <option value="out_of_stock" {{ $product->status == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn">
            Update Product
        </button>
        <a href="/products" class="cancel-product-btn">
            Update cancel
        </a>

    </form>

</div>

@endsection