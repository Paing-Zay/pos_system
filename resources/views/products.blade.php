@extends('layouts.app')

@section('content')

<style>
    .product-container{
        font-family: Arial, sans-serif;
    }

    .product-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .product-header h2{
        color: #333;
    }

    .add-product-btn{
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

    .add-new-product-btn{
        display:inline-block;
        background:#6E6EAA;
        color:white;
        padding:10px 18px;
        border-radius:8px;
        text-decoration:none;
        font-size:15px;
        cursor:pointer;
    }

    .add-new-product-btn:hover,
    .add-product-btn:hover{
        background:#6060ab;
    }

    .product-cards{
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    table{
        width: 100%;
        border-collapse: collapse;
    }

    table thead{
        background: #6E6EAA;
        color: white;
    }

    table th,
    table td{
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table tbody tr:hover{
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
    }

    .edit-btn{
        background:#6E6EAA;
        color: white;
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

    .delete-btn:hover{
        background:#f44336;
    }

    .product-image{
        width: 50px;
        height: 50px;
        border-radius: 8px;
        object-fit: cover;
    }
</style>

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