@extends('layouts.app')

@section('content')

<style>
    .form-container{
        max-width:100%;
        margin:auto;
        background:white;
        padding:25px;
        border-radius:15px;
        box-shadow:0 6px 20px rgba(0,0,0,0.08);
        font-family:Arial, sans-serif;
    }

    .form-title{
        font-size:24px;
        margin-bottom:20px;
        font-weight:bold;
        color:#111827;
    }

    .form-group{
        margin-bottom:15px;
    }

    label{
        display:block;
        margin-bottom:6px;
        font-weight:600;
    }

    input, select{
        width:100%;
        padding:12px;
        border:1px solid #ddd;
        border-radius:10px;
    }

    .btn{
        background:#6E6EAA;
        color:white;
        border:none;
        padding:12px;
        border-radius:10px;
        width:150px;
        cursor:pointer;
    }

    .btn:hover{
        background:#6060ab;
    }

    .cancel-product-btn{
        display:inline-block;
        background:#6E6EAA;
        color:white;
        padding:10px 18px;
        border-radius:8px;
        text-decoration:none;
        font-size:15px;
        cursor:pointer;
    }

    .cancel-product-btn:hover{
        background:#6060ab;
    }
</style>

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