

<?php $__env->startSection('content'); ?>

<style>
    .settings-container{
        max-width: 100%;
        margin: 30px auto;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .settings-title{
        margin-bottom: 25px;
        color: #333;
        font-size: 28px;
        font-weight: bold;
    }

    .settings-section{
        margin-bottom: 30px;
    }

    .settings-section h4{
        margin-bottom: 15px;
        color: #444;
        border-left: 5px solid #4CAF50;
        padding-left: 10px;
    }

    .form-group{
        margin-bottom: 20px;
    }

    .form-group label{
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    .form-control{
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        outline: none;
        transition: 0.3s;
    }

    .form-control:focus{
        border-color: #4CAF50;
        box-shadow: 0 0 5px rgba(76,175,80,0.4);
    }

    .toggle-group{
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #f8f9fa;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .save-btn{
        background: #4CAF50;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    .save-btn:hover{
        background: #45a049;
    }
</style>

<div class="settings-container">

    <div class="settings-title">
        ⚙️ Settings
    </div>

    <form>

        <!-- Profile Settings -->
        <div class="settings-section">
            <h4>Profile Settings</h4>

            <div class="form-group">
                <label>Full Name</label>
                <input type="text" class="form-control" placeholder="Enter your name">
            </div>

            <div class="form-group">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Enter your email">
            </div>
        </div>

        <!-- System Settings -->
        <div class="settings-section">
            <h4>System Settings</h4>

            <div class="toggle-group">
                <span>Enable Notifications</span>
                <input type="checkbox" checked>
            </div>

            <div class="toggle-group">
                <span>Dark Mode</span>
                <input type="checkbox">
            </div>
        </div>

        <!-- Password -->
        <div class="settings-section">
            <h4>Change Password</h4>

            <div class="form-group">
                <label>Current Password</label>
                <input type="password" class="form-control">
            </div>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control">
            </div>
        </div>

        <button type="submit" class="save-btn">
            Save Changes
        </button>

    </form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\new git\pos_system\resources\views/settings.blade.php ENDPATH**/ ?>