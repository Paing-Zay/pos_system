@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('../css/products.css') }}">

<style>
    .report-container{
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .report-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .report-header h2{
        color: #333;
    }

    .download-btn,
    .create-btn{
        background: #4338ca;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        text-decoration: none;
        display: inline-block;
    }

    .download-btn:hover,
    .create-btn:hover{
        background: #43a047;
    }

    .filter-row{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
        align-items: flex-end;
    }

    .report-summary{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .summary-card{
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .summary-card h4{
        margin-bottom: 10px;
        color: #666;
    }

    .summary-card h2{
        color: #4338ca;
    }

    .report-table{
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .report-table table{
        width: 100%;
        border-collapse: collapse;
    }

    .report-table table thead{
        background: #4338ca;
        color: white;
    }

    .report-table table th,
    .report-table table td{
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .report-table table tbody tr:hover{
        background: #f5f5f5;
    }

    .action-btn{
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        margin-right: 5px;
        color: white;
        background: #4338ca;
        text-decoration: none;
        display: inline-block;
    }

    .delete-btn{
        background: #f44336;
    }
</style>

<div class="report-container">

    <div class="report-header">
        <h2>📊 Reports Page</h2>

        <div>
            <a href="{{ route('reports.create') }}" class="create-btn">+ Add Report</a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ url('/reports') }}" method="GET" class="filter-row">
        <div class="form-group">
            <label>From</label>
            <input type="date" name="from_date" value="{{ old('from_date', $fromDate ?? '') }}">
        </div>

        <div class="form-group">
            <label>To</label>
            <input type="date" name="to_date" value="{{ old('to_date', $toDate ?? '') }}">
        </div>

        <button type="submit" class="btn">Filter</button>
        <a href="{{ url('/reports') }}" class="cancel-product-btn">Reset</a>
    </form>

    <div class="report-summary">
        <div class="summary-card">
            <h4>Total Sales</h4>
            <h2>{{ $summary['sales'] }}</h2>
        </div>

        <div class="summary-card">
            <h4>Total Orders</h4>
            <h2>{{ $summary['orders'] }}</h2>
        </div>

        <div class="summary-card">
            <h4>Total Customers</h4>
            <h2>{{ $summary['customers'] }}</h2>
        </div>

        <div class="summary-card">
            <h4>Total Products</h4>
            <h2>{{ $summary['products'] }}</h2>
        </div>

        <div class="summary-card">
            <h4>Total Revenue</h4>
            <h2>Ks{{ number_format($summary['revenue'], 2) }}</h2>
        </div>
    </div>

    <div class="report-table">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sales</th>
                    <th>Orders</th>
                    <th>Customers</th>
                    <th>Products</th>
                    <th>Revenue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                    <tr>
                        <td>{{ $report->date->format('d M Y') }}</td>
                        <td>{{ $report->sales }}</td>
                        <td>{{ $report->orders }}</td>
                        <td>{{ $report->customers }}</td>
                        <td>{{ $report->products }}</td>
                        <td>Ks{{ number_format($report->revenue, 2) }}</td>
                        <td>
                            <a href="{{ url('/reports/' . $report->id . '/edit') }}" class="action-btn">Edit</a>
                            <form action="{{ url('/reports/' . $report->id) }}" method="POST" style="display:inline-block; margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Delete this report?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align:center; padding: 20px;">No reports found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection