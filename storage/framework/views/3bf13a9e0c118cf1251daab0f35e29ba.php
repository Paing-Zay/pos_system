

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('../css/products.css')); ?>">

<div class="form-container">

    <div class="form-title">
        ➕ Add Report
    </div>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('reports.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" value="<?php echo e(old('date', date('Y-m-d'))); ?>">
        </div>

        <div class="form-group">
            <label>Sales</label>
            <input type="number" name="sales" value="<?php echo e(old('sales')); ?>" min="0">
        </div>

        <div class="form-group">
            <label>Orders</label>
            <input type="number" name="orders" value="<?php echo e(old('orders')); ?>" min="0">
        </div>

        <div class="form-group">
            <label>Customers</label>
            <input type="number" name="customers" value="<?php echo e(old('customers')); ?>" min="0">
        </div>

        <div class="form-group">
            <label>Products</label>
            <input type="number" name="products" value="<?php echo e(old('products')); ?>" min="0">
        </div>

        <div class="form-group">
            <label>Revenue</label>
            <input type="number" name="revenue" value="<?php echo e(old('revenue')); ?>" min="0" step="0.01">
        </div>

        <button type="submit" class="btn">
            Save Report
        </button>
        <a href="<?php echo e(url('/reports')); ?>" class="cancel-product-btn">
            Cancel
        </a>
    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/reports/create.blade.php ENDPATH**/ ?>