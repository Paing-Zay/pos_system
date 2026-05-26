

<?php $__env->startSection('content'); ?>

<style>
    .sales-container{
        font-family: Arial, sans-serif;
    }

    .sales-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .sales-header h2{
        color: #333;
    }

    .add-sale-btn{
        background: #6E6EAA;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    .add-sale-btn:hover{
        background: #43a047;
    }

    .sales-card{
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
        background: #6E6EAA;
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

    .status{
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .paid{
        background: #d4edda;
        color: #155724;
    }

    .pending{
        background: #fff3cd;
        color: #856404;
    }

    .unpaid{
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
        background: #6E6EAA;
        color: white;
    }

    .delete-btn{
        background: #f44336;
        color: white;
    }
</style>

<div class="sales-container">

    <div class="sales-header">
        <h2>🛒 Sales Page</h2>

        <button class="add-sale-btn">
            + Add Sale
        </button>
    </div>

    <div class="sales-card">

        <table>
            <thead>
                <tr>
                    <th>Invoice No</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>#INV<?php echo e(str_pad($sale->id, 3, '0', STR_PAD_LEFT)); ?></td>
                        <td><?php echo e($sale->customer_name ?: 'Guest'); ?></td>
                        <td><?php echo e($sale->created_at->format('d M Y')); ?></td>
                        <td>$<?php echo e(number_format($sale->total_amount, 2)); ?></td>
                        <td>$<?php echo e(number_format($sale->pay_amount ?? 0, 2)); ?></td>
                        <td>$<?php echo e(number_format($sale->due_amount ?? 0, 2)); ?></td>
                        <td>
                            <span class="status <?php echo e($sale->status == 1 ? 'paid' : ($sale->status == 2 ? 'pending' : 'unpaid')); ?>"><?php echo e($sale->status == 1 ? 'Paid' : ($sale->status == 2 ? 'Partial' : 'Unpaid')); ?></span>
                        </td>
                        <td>
                            <button class="action-btn edit-btn">View</button>
                            <button class="action-btn delete-btn">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">No sales found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

    <div class="sales-card" style="margin-top: 30px;">
        <h3>Sale Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $groupedSaleItems = collect($saleItems)->groupBy('product_id');
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $groupedSaleItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $item = $group->first();
                        $quantity = $group->sum('quantity');
                        $lineTotal = $group->sum(function ($item) {
                            return $item->quantity * $item->price;
                        });
                    ?>
                    <tr>
                        <td><?php echo e(optional($item->product)->name ?? 'Product #' . $item->product_id); ?></td>
                        <td><?php echo e($quantity); ?></td>
                        <td>$<?php echo e(number_format($item->price, 2)); ?></td>
                        <td>$<?php echo e(number_format($lineTotal, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No sale items found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/sales.blade.php ENDPATH**/ ?>