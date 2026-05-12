@extends('layouts.app')

@section('content')

<style>
    .sales-container{
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .sales-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .sales-header h2{
        color: #333;
    }

    .add-sale-btn{
        background: #4338ca;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    .add-sale-btn:hover{
        background: #43a047;
    }

    .sales-card{
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
        background: #4338ca;
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

    .status{
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .paid{
        background: #d4edda;
        color: #155724;
    }

    .pending{
        background: #fff3cd;
        color: #856404;
    }

    .action-btn{
        border: none;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        margin-right: 5px;
    }

    .edit-btn{
        background: #4338ca;
        color: white;
    }

    .delete-btn{
        background: #f44336;
        color: white;
    }
</style>

<div class="sales-container">

    <div class="sales-header">
        <h2>🛒 Sales Page</h2>

        <button class="add-sale-btn">
            + Add Sale
        </button>
    </div>

    <div class="sales-card">

        <table>
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>#INV001</td>
                    <td>John Doe</td>
                    <td>12 May 2026</td>
                    <td>$120</td>
                    <td>
                        <span class="status paid">Paid</span>
                    </td>
                    <td>
                        <button class="action-btn edit-btn">
                            Edit
                        </button>

                        <button class="action-btn delete-btn">
                            Delete
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>#INV002</td>
                    <td>Smith</td>
                    <td>12 May 2026</td>
                    <td>$80</td>
                    <td>
                        <span class="status pending">Pending</span>
                    </td>
                    <td>
                        <button class="action-btn edit-btn">
                            Edit
                        </button>

                        <button class="action-btn delete-btn">
                            Delete
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>

</div>

@endsection