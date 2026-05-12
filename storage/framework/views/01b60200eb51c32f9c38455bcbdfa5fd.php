

<?php $__env->startSection('content'); ?>

<style>
    .inventory-container{
        padding: 30px;
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
        background: #4338ca;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    .add-product-btn:hover{
        background: #43a047;
    }

    .inventory-card{
        background: #fff;
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
        background:#4338ca;
        color: white;
    }

    .delete-btn{
        background: #f44336;
        color: white;
    }
</style>

<div class="inventory-container">

    <div class="inventory-header">
        <h2>📦 Inventory Page</h2>

        <button class="add-product-btn">
            + Add Product
        </button>
    </div>

    <div class="inventory-card">

        <table>
            <thead>
                <tr>
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

                <tr>
                    <td>P001</td>
                    <td>Laptop</td>
                    <td>Electronics</td>
                    <td>$700</td>
                    <td>25</td>
                    <td>
                        <span class="stock in-stock">
                            In Stock
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
                    <td>P002</td>
                    <td>Mouse</td>
                    <td>Accessories</td>
                    <td>$20</td>
                    <td>5</td>
                    <td>
                        <span class="stock low-stock">
                            Low Stock
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
                    <td>P003</td>
                    <td>Keyboard</td>
                    <td>Accessories</td>
                    <td>$35</td>
                    <td>0</td>
                    <td>
                        <span class="stock out-stock">
                            Out of Stock
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/inventory.blade.php ENDPATH**/ ?>