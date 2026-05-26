@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<style>
    .inventory-container{
        font-family: Arial, sans-serif;
    }

    .inventory-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .inventory-header h2{
        color: #333;
    }

    .add-product-btn{
        background: #6E6EAA;
        color: white;
        border: none;
        width: auto;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        text-decoration: none;
        display: inline-block;
    }

    .add-product-btn:hover{
        background: #5a5a8c;
    }

    .filter-row{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
        align-items: center;
    }

    .inventory-card{
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .inventory-card table{
        width: 100%;
        border-collapse: collapse;
    }

    .inventory-card table thead{
        background: #6E6EAA;
        color: white;
    }

    .inventory-card table th,
    .inventory-card table td{
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .inventory-card table tbody tr:hover{
        background: #f5f5f5;
    }

    .stock{
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .in-stock{
        background: #d4edda;
        color: #155724;
    }

    .low-stock{
        background: #fff3cd;
        color: #856404;
    }

    .out-stock{
        background: #f8d7da;
        color: #721c24;
    }

    .action-btn{
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        margin-right: 5px;
        color: white;
        text-decoration: none;
    }

    .edit-btn{
       display:inline-block;
        background:#6E6EAA;
        color:white;
        padding:10px 18px;
        border-radius:8px;
        text-decoration:none;
        font-size:15px;
        cursor:pointer;
        width: 100px;
        text-align: center;
    }

    .delete-btn{
        display:inline-block;
        background:#f06a60;
        color:white;
        padding:10px 10px;
        border-radius:8px;
        font-size:15px;
        cursor:pointer;
        border:none;
        width: 100px;
    }
</style>

<div class="inventory-container">

    <div class="inventory-header">
        <h2>📦 Inventory Page</h2>

        <a href="{{ url('/products/create') }}" class="add-product-btn">
            + Add Inventory
        </a>
    </div>

    <div class="inventory-card">
        <form method="GET" action="{{ url('/inventory') }}" class="filter-row">
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ (isset($category) && $category === $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="">All Statuses</option>
                    @foreach($statuses as $key => $label)
                        <option value="{{ $key }}" {{ (isset($status) && $status === $key) ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn">Filter</button>
            <a href="{{ url('/inventory') }}" class="cancel-product-btn">Reset</a>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->product_code }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ?? '-' }}</td>
                        <td>Ks{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <span class="stock {{ $product->status === 'in_stock' ? 'in-stock' : ($product->status === 'low_stock' ? 'low-stock' : 'out-stock') }}">
                                {{ $product->status === 'in_stock' ? 'In Stock' : ($product->status === 'low_stock' ? 'Low Stock' : 'Out of Stock') }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ url('/products/' . $product->id . '/edit') }}" class="action-btn edit-btn">Edit</a>
                            <form action="{{ url('/products/' . $product->id) }}" method="POST" style="display:inline-block; margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Delete this inventory item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding: 20px;">No inventory items found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
