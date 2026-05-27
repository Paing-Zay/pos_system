@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<div class="form-container">

    <div class="form-title">
        ➕ Add Customer
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

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter customer name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="john@example.com" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="09123456789" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="4" placeholder="Enter address">{{ old('address') }}</textarea>
        </div>

        <button type="submit" class="btn">
            Save Customer
        </button>
        <a href="{{ url('/customers') }}" class="cancel-product-btn">
            Cancel
        </a>

    </form>

</div>

@endsection
