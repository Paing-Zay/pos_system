

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('../css/products.css')); ?>">
<div class="product-container">

    <div class="product-header">
        <h2>🛍️ Product Page</h2>

        <a href="/products/create" class="add-new-product-btn">
            + Add Product
        </a>
    </div>

    <div class="product-cards">

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
                        <td><?php echo e($loop->iteration); ?></td>
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
                                <i class="fa-solid fa-pencil"></i> Edit
                            </a>
                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" 
                                method="POST" 
                                style="display:inline;">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit" 
                                        class="delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </button>

                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/products.blade.php ENDPATH**/ ?>