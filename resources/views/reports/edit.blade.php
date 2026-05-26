@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<div class="form-container">

    <div class="form-title">
        ✏️ Edit Report
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

    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" value="{{ old('date', $report->date->format('Y-m-d')) }}">
        </div>

        <div class="form-group">
            <label>Sales</label>
            <input type="number" name="sales" value="{{ old('sales', $report->sales) }}" min="0">
        </div>

        <div class="form-group">
            <label>Orders</label>
            <input type="number" name="orders" value="{{ old('orders', $report->orders) }}" min="0">
        </div>

        <div class="form-group">
            <label>Customers</label>
            <input type="number" name="customers" value="{{ old('customers', $report->customers) }}" min="0">
        </div>

        <div class="form-group">
            <label>Products</label>
            <input type="number" name="products" value="{{ old('products', $report->products) }}" min="0">
        </div>

        <div class="form-group">
            <label>Revenue</label>
            <input type="number" name="revenue" value="{{ old('revenue', $report->revenue) }}" min="0" step="0.01">
        </div>

        <button type="submit" class="btn">
            Update Report
        </button>
        <a href="{{ url('/reports') }}" class="cancel-product-btn">
            Cancel
        </a>
    </form>

</div>

@endsection
