

<?php $__env->startSection('content'); ?>

<style>
    .customer-container{
        font-family: Arial, sans-serif;
    }

    .customer-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .customer-header h2{
        color: #333;
    }

    .add-customer-btn{
        display:inline-block;
        background:#6E6EAA;
        color:white;
        padding:10px 18px;
        border-radius:8px;
        text-decoration:none;
        font-size:15px;
        cursor:pointer;
    }

    .add-customer-btn:hover{
        background: #6060ab;
    }

    .customer-card{
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

    .active{
        background: #d4edda;
        color: #155724;
    }

    .inactive{
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

<div class="customer-container">

    <div class="customer-header">
        <h2>👥 Customer Page</h2>

        <a href="<?php echo e(route('customers.create')); ?>" class="add-customer-btn">
            + Add Customer
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="customer-card">

        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e(sprintf('C%03d', $customer->id)); ?></td>
                        <td><?php echo e($customer->name ?? '-'); ?></td>
                        <td><?php echo e($customer->email ?? '-'); ?></td>
                        <td><?php echo e($customer->phone ?? '-'); ?></td>
                        <td><?php echo e($customer->address ? \Illuminate\Support\Str::limit($customer->address, 40) : '-'); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center py-8">No customers found. Use the button above to add one.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/customers.blade.php ENDPATH**/ ?>