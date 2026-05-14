

<?php $__env->startSection('content'); ?>

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

    .download-btn{
        background: #4338ca;
        color: white;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 15px;
    }

    .download-btn:hover{
        background: #43a047;
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

    table{
        width: 100%;
        border-collapse: collapse;
    }

    table thead{
        background: #4338ca;
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
</style>

<div class="report-container">

    <div class="report-header">
        <h2>📊 Reports Page</h2>

        <button class="download-btn">
            Download Report
        </button>
    </div>

    <!-- Summary Cards -->
    <div class="report-summary">

        <div class="summary-card">
            <h4>Total Sales</h4>
            <h2>$12,500</h2>
        </div>

        <div class="summary-card">
            <h4>Total Orders</h4>
            <h2>320</h2>
        </div>

        <div class="summary-card">
            <h4>Total Customers</h4>
            <h2>145</h2>
        </div>

        <div class="summary-card">
            <h4>Total Products</h4>
            <h2>80</h2>
        </div>

    </div>

    <!-- Report Table -->
    <div class="report-table">

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sales</th>
                    <th>Orders</th>
                    <th>Customers</th>
                    <th>Revenue</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>12 May 2026</td>
                    <td>25</td>
                    <td>18</td>
                    <td>10</td>
                    <td>$1,250</td>
                </tr>

                <tr>
                    <td>11 May 2026</td>
                    <td>20</td>
                    <td>15</td>
                    <td>8</td>
                    <td>$980</td>
                </tr>

                <tr>
                    <td>10 May 2026</td>
                    <td>30</td>
                    <td>22</td>
                    <td>12</td>
                    <td>$1,600</td>
                </tr>

            </tbody>
        </table>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/reports.blade.php ENDPATH**/ ?>