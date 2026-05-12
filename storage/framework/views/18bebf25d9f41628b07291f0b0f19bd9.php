

<?php $__env->startSection('content'); ?>
    <div class="cards">
        <div class="card">
            <small>Total Sales</small>
            <h2>$25,400</h2>
        </div>

        <div class="card">
            <small>Orders</small>
            <h2>320</h2>
        </div>

        <div class="card">
            <small>Customers</small>
            <h2>125</h2>
        </div>

        <div class="card">
            <small>Products</small>
            <h2>580</h2>
        </div>
    </div>

    <div class="content">
        <div class="products">
            <div class="products-header">
                <h2>Products</h2>
                <input type="text" class="barcode-input" placeholder="Scan barcode...">
            </div>
            <div class="product-grid">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php echo e($product->name); ?>

                        </div>

                        <div class="product-info">
                            <h4><?php echo e($product->name); ?></h4>
                            <div class="price-row">
                                <div class="price">$<?php echo e($product->price); ?></div>

                                <button class="add-btn">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        
        </div>

        <div class="cart">
            <h3>Order Summary</h3>
            <div class="cart-item">
                <div>
                    <strong>T-Shirt</strong><br>
                    <small>Qty: 1</small>
                </div>
                <strong>$25</strong>
            </div>

            <div class="cart-item">
                <div>
                    <strong>Shoes</strong><br>
                    <small>Qty: 1</small>
                </div>
                <strong>$40</strong>
            </div>

            <div class="total">
                Total: $65
            </div>

            <button class="checkout-btn">
                Complete Payment
            </button>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/home.blade.php ENDPATH**/ ?>