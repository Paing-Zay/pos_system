

<?php $__env->startSection('content'); ?>
<div class="main">

    <div class="topbar">
        <input type="text" class="search-box" placeholder="Search product...">
        <div class="profile">
            <div>
                <strong>Admin User</strong><br>
                <small>Administrator</small>
                <a href="/login">Login</a>
            </div>

            <div class="profile-circle">
                A
            </div>
        </div>
    </div>

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
                <div class="product-card">
                    <div class="product-image">T-Shirt</div>
                    <div class="product-info">
                        <h4>Classic T-Shirt</h4>
                        <p>Barcode: 89910001</p>
                        <div class="price-row">
                            <div class="price">$25</div>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">Shoes</div>
                    <div class="product-info">
                        <h4>Sport Shoes</h4>
                        <p>Barcode: 89910002</p>
                        <div class="price-row">
                            <div class="price">$40</div>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">Jacket</div>
                    <div class="product-info">
                        <h4>Winter Jacket</h4>
                        <p>Barcode: 89910003</p>
                        <div class="price-row">
                            <div class="price">$80</div>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>
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
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\pos-system\resources\views/home.blade.php ENDPATH**/ ?>