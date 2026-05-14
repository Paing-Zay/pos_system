

<?php $__env->startSection('content'); ?>

<div class="cart">

    <h2>Cart Page</h2>

    <table style="width:100%; border-collapse:collapse;">

        <thead style="background:#6E6EAA; color:white;">
            <tr>
                <th style="text-align: left;padding:14px;">Product</th>
                <th style="text-align: left;padding:14px;">Qty</th>
                <th style="text-align: left;padding:14px;">Amount</th>
            </tr>
        </thead>

        <tbody>

            <?php
                $total = 0;
            ?>

            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $amount = $item['price'] * $item['qty'];
                    $total += $amount;
                ?>

                <tr>
                    <td style="text-align: left;padding:14px;"><?php echo e($item['name']); ?></td>

                    <td style="padding:14px;">
                        <?php echo e($item['qty']); ?>

                    </td>

                    <td style="padding:14px;">
                        $<?php echo e($amount); ?>

                    </td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <td></td>

                <td style="padding:14px;">
                    <strong>Total:</strong>
                </td>

                <td style="padding:14px;">
                    <strong>$<?php echo e($total); ?></strong>
                </td>
            </tr>

        </tbody>

    </table>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/cart.blade.php ENDPATH**/ ?>