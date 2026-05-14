@extends('layouts.app')

@section('content')

<style>
    .customer-container{
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .customer-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .customer-header h2{
        color: #333;
    }

    .add-customer-btn{
        background: #4338ca;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    .add-customer-btn:hover{
        background: #43a047;
    }

    .customer-card{
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

    .active{
        background: #d4edda;
        color: #155724;
    }

    .inactive{
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
        background: #4338ca;
        color: white;
    }

    .delete-btn{
        background: #f44336;
        color: white;
    }
</style>

<div class="customer-container">

    <div class="customer-header">
        <h2>👥 Customer Page</h2>

        <button class="add-customer-btn">
            + Add Customer
        </button>
    </div>

    <div class="customer-card">

        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>C001</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>09123456789</td>
                    <td>
                        <span class="status active">
                            Active
                        </span>
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
                    <td>C002</td>
                    <td>Smith</td>
                    <td>smith@example.com</td>
                    <td>09987654321</td>
                    <td>
                        <span class="status inactive">
                            Inactive
                        </span>
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