

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('../css/products.css')); ?>">

<style>
    .report-container{
        padding: 30px;
        font-family: Arial, sans-serif;
    }

    .report-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .report-header h2{
        color: #333;
    }

    .download-btn,
    .create-btn{
        background: #4338ca;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
        text-decoration: none;
        display: inline-block;
    }

    .download-btn:hover,
    .create-btn:hover{
        background: #43a047;
    }

    .filter-row{
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
        align-items: flex-end;
    }

    .report-summary{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .summary-card{
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .summary-card h4{
        margin-bottom: 10px;
        color: #666;
    }

    .summary-card h2{
        color: #4338ca;
    }

    .report-table{
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .report-table table{
        width: 100%;
        border-collapse: collapse;
    }

    .report-table table thead{
        background: #4338ca;
        color: white;
    }

    .report-table table th,
    .report-table table td{
        padding: 14px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .report-table table tbody tr:hover{
        background: #f5f5f5;
    }

    .action-btn{
        border: none;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        margin-right: 5px;
        color: white;
        background: #4338ca;
        text-decoration: none;
        display: inline-block;
    }

    .delete-btn{
        background: #f44336;
    }
</style>

<div class="report-container">

    <div class="report-header">
        <h2>📊 Reports Page</h2>

        <div>
            <a href="<?php echo e(route('reports.create')); ?>" class="create-btn">+ Add Report</a>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(url('/reports')); ?>" method="GET" class="filter-row">
        <div class="form-group">
            <label>From</label>
            <input type="date" name="from_date" value="<?php echo e(old('from_date', $fromDate ?? '')); ?>">
        </div>

        <div class="form-group">
            <label>To</label>
            <input type="date" name="to_date" value="<?php echo e(old('to_date', $toDate ?? '')); ?>">
        </div>

        <button type="submit" class="btn">Filter</button>
        <a href="<?php echo e(url('/reports')); ?>" class="cancel-product-btn">Reset</a>
    </form>

    <div class="report-summary">
        <div class="summary-card">
            <h4>Total Sales</h4>
            <h2><?php echo e($summary['sales']); ?></h2>
        </div>

        <div class="summary-card">
            <h4>Total Orders</h4>
            <h2><?php echo e($summary['orders']); ?></h2>
        </div>

        <div class="summary-card">
            <h4>Total Customers</h4>
            <h2><?php echo e($summary['customers']); ?></h2>
        </div>

        <div class="summary-card">
            <h4>Total Products</h4>
            <h2><?php echo e($summary['products']); ?></h2>
        </div>

        <div class="summary-card">
            <h4>Total Revenue</h4>
            <h2>Ks<?php echo e(number_format($summary['revenue'], 2)); ?></h2>
        </div>
    </div>

    <div class="report-table">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sales</th>
                    <th>Orders</th>
                    <th>Customers</th>
                    <th>Products</th>
                    <th>Revenue</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($report->date->format('d M Y')); ?></td>
                        <td><?php echo e($report->sales); ?></td>
                        <td><?php echo e($report->orders); ?></td>
                        <td><?php echo e($report->customers); ?></td>
                        <td><?php echo e($report->products); ?></td>
                        <td>Ks<?php echo e(number_format($report->revenue, 2)); ?></td>
                        <td>
                            <a href="<?php echo e(url('/reports/' . $report->id . '/edit')); ?>" class="action-btn">Edit</a>
                            <form action="<?php echo e(url('/reports/' . $report->id)); ?>" method="POST" style="display:inline-block; margin:0;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="action-btn delete-btn" onclick="return confirm('Delete this report?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" style="text-align:center; padding: 20px;">No reports found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/reports.blade.php ENDPATH**/ ?>