@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<div class="form-container">

    <div class="form-title">
        ➕ Add Product
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Product Code</label>
            <input type="text" name="product_code" placeholder="P001">
        </div>

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" placeholder="Electronics">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" step="0.01">
        </div>

        <div class="form-group">
            <label>Cost Price</label>
            <input type="number" name="cost_price" step="0.01">
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="in_stock">In Stock</option>
                <option value="low_stock">Low Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn">
            Save Product
        </button>
        <a href="/products" class="cancel-product-btn">
            Create Cancel 
        </a>

    </form>

</div>

@endsection