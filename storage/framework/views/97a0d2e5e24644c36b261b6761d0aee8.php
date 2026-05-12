

<?php $__env->startSection('content'); ?>

<style>
    .product-container{
        padding: 30px;
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
        background:#4338ca;
        color:white;
        padding:10px 18px;
        border-radius:8px;
        text-decoration:none;
        font-size:15px;
        cursor:pointer;
    }

    .add-product-btn:hover{
        background:#4338ca;
    }

    .product-card{
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

        <a href="/products/create" class="add-product-btn">
            + Add Product
        </a>
    </div>

    <div class="product-card">

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

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img src=""
                                class="product-image">
                        </td>
                        <td><?php echo e($product->id); ?></td>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->category); ?></td>
                        <td>$<?php echo e($product->price); ?></td>
                        <td><?php echo e($product->stock); ?></td>
                        <td>
                            <span class="stock in-stock">
                                <?php echo e($product->status); ?>

                            </span>
                        </td>

                        <td>
                            <a href="/products/<?php echo e($product->id); ?>/edit" class="add-product-btn">
                                Edit
                            </a>

                            <button class="action-btn delete-btn">
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/products.blade.php ENDPATH**/ ?>