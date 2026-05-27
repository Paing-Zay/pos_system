@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<div class="form-container">

    <div class="form-title">
        ➕ Add Report
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reports.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" value="{{ old('date', date('Y-m-d')) }}">
        </div>

        <div class="form-group">
            <label>Sales</label>
            <input type="number" name="sales" value="{{ old('sales') }}" min="0">
        </div>

        <div class="form-group">
            <label>Orders</label>
            <input type="number" name="orders" value="{{ old('orders') }}" min="0">
        </div>

        <div class="form-group">
            <label>Customers</label>
            <input type="number" name="customers" value="{{ old('customers') }}" min="0">
        </div>

        <div class="form-group">
            <label>Products</label>
            <input type="number" name="products" value="{{ old('products') }}" min="0">
        </div>

        <div class="form-group">
            <label>Revenue</label>
            <input type="number" name="revenue" value="{{ old('revenue') }}" min="0" step="0.01">
        </div>

        <button type="submit" class="btn">
            Save Report
        </button>
        <a href="{{ url('/reports') }}" class="cancel-product-btn">
            Cancel
        </a>
    </form>

</div>

@endsection
