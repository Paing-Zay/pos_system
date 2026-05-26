

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('../css/products.css')); ?>">

<div class="form-container">

    <div class="form-title">
        ➕ Add Customer
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

    <form action="<?php echo e(route('customers.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" placeholder="Enter customer name" value="<?php echo e(old('name')); ?>" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="john@example.com" value="<?php echo e(old('email')); ?>">
        </div>

        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="09123456789" value="<?php echo e(old('phone')); ?>">
        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="4" placeholder="Enter address"><?php echo e(old('address')); ?></textarea>
        </div>

        <button type="submit" class="btn">
            Save Customer
        </button>
        <a href="<?php echo e(url('/customers')); ?>" class="cancel-product-btn">
            Cancel
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/customers/create.blade.php ENDPATH**/ ?>