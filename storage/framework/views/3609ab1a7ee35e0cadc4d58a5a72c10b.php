<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('../css/products.css')); ?>">

<div class="form-container">

    <div class="form-title">
        ✏️ Edit Product
    </div>

    <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label>Product Code</label>
            <input type="text" name="product_code" value="<?php echo e($product->product_code); ?>">
        </div>

        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="name" value="<?php echo e($product->name); ?>">
        </div>

        <div class="form-group">
            <label>Category</label>
            <input type="text" name="category" value="<?php echo e($product->category); ?>">
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="<?php echo e($product->price); ?>">
        </div>

        <div class="form-group">
            <label>Cost Price</label>
            <input type="number" name="cost_price" value="<?php echo e($product->cost_price); ?>">
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" value="<?php echo e($product->stock); ?>">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="in_stock" <?php echo e($product->status == 'in_stock' ? 'selected' : ''); ?>>In Stock</option>
                <option value="low_stock" <?php echo e($product->status == 'low_stock' ? 'selected' : ''); ?>>Low Stock</option>
                <option value="out_of_stock" <?php echo e($product->status == 'out_of_stock' ? 'selected' : ''); ?>>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn">
            Update Product
        </button>
        <a href="/products" class="cancel-product-btn">
            Update cancel
        </a>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/products/edit.blade.php ENDPATH**/ ?>