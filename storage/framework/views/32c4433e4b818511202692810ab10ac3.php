

<?php $__env->startSection('content'); ?>

<style>
    .form-container{
        max-width:100%;
        margin:auto;
        background:white;
        padding:25px;
        border-radius:15px;
        box-shadow:0 6px 20px rgba(0,0,0,0.08);
        font-family:Arial, sans-serif;
    }

    .form-title{
        font-size:24px;
        margin-bottom:20px;
        color:#111827;
        font-weight:bold;
    }

    .form-group{
        margin-bottom:15px;
    }

    label{
        display:block;
        margin-bottom:6px;
        font-weight:600;
        color:#374151;
    }

    input, select{
        width:100%;
        padding:12px;
        border:1px solid #ddd;
        border-radius:10px;
        outline:none;
    }

    input:focus, select:focus{
        border-color:#4338ca;
    }

    .btn{
        background:#4338ca;
        color:white;
        border:none;
        padding:12px 20px;
        border-radius:10px;
        cursor:pointer;
        width:100%;
        font-size:16px;
    }

    .btn:hover{
        background:#3730a3;
    }

</style>

<div class="form-container">

    <div class="form-title">
        ➕ Add Product
    </div>

    <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>Product Code</label>
            <input type="text" name="product_code" placeholder="P001">
        </div>

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" placeholder="Electronics">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" step="0.01">
        </div>

        <div class="form-group">
            <label>Cost Price</label>
            <input type="number" name="cost_price" step="0.01">
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="in_stock">In Stock</option>
                <option value="low_stock">Low Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn">
            Save Product
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/products/create.blade.php ENDPATH**/ ?>