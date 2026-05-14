

<?php $__env->startSection('content'); ?>

<div class="cart">

    <div class="cart-header">
        <h2>Order Summary</h2>

        <a href="#" class="cart-icon">
            <i class="fa-solid fa-cart-shopping"></i>
        </a>
    </div>

    <table class="cart-table">

        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Amount</th>
            </tr>
        </thead>

        <tbody id="cart-body">

            <?php
                $total = 0;
            ?>

            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $amount = $item->price * $item->qty;
                    $total += $amount;
                ?>

                <tr>
                    <td><?php echo e($item->name); ?></td>

                    <td>
                        <div class="qty-box">

                            <form action="<?php echo e(route('cart/cart.decrease', $item->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit">-</button>
                            </form>

                            <span><?php echo e($item->qty); ?></span>

                            <form action="<?php echo e(route('cart/cart.increase', $item->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit">+</button>
                            </form>

                        </div>
                    </td>

                    <td>$<?php echo e($amount); ?></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr class="total-row">
                <td></td>
                <td><strong>Total:</strong></td>
                <td><strong>$<?php echo e($total); ?></strong></td>
            </tr>

        </tbody>

    </table>

    <button class="checkout-btn">
        Complete Payment
    </button>

</div>

<style>

.cart{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 6px 20px rgba(0,0,0,0.05);
}

.cart-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.cart-header h2{
    color:#111827;
}

.cart-icon{
    width:40px;
    height:40px;
    border-radius:50%;
    background:#6E6EAA;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
}

.cart-table{
    width:100%;
    border-collapse:collapse;
}

.cart-table thead{
    background:#6E6EAA;
    color:white;
}

.cart-table th{
    padding:14px;
    text-align:left;
}

.cart-table td{
    padding:14px;
    border-bottom:1px solid #eee;
}

.qty-box{
    display:flex;
    align-items:center;
    gap:10px;
}

.qty-box button{
    width:28px;
    height:28px;
    border:none;
    border-radius:6px;
    background:#6E6EAA;
    color:white;
    cursor:pointer;
}

.total-row td{
    border:none;
    padding-top:20px;
}

.checkout-btn{
    width:100%;
    padding:16px;
    background:#6E6EAA;
    color:white;
    border:none;
    border-radius:14px;
    margin-top:25px;
    font-size:16px;
    cursor:pointer;
}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/cart/cart.blade.php ENDPATH**/ ?>