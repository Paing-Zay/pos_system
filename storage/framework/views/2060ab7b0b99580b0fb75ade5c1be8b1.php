
<!DOCTYPE html>
<html>
<head>

    <title>POS Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f2f3f7;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-container{
            width:950px;
            height:700px;
            background:white;
            border-radius:18px;
            overflow:hidden;
            display:flex;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .left-panel{
            width:45%;
            padding:60px;
            display:flex;
            flex-direction:column;
            justify-content:center;
        }

        .logo{
            font-size:22px;
            font-weight:bold;
            margin-bottom:60px;
            color:#111827;
        }

        .title{
            font-size:34px;
            font-weight:bold;
            color:#111827;
            margin-bottom:10px;
        }

        .subtitle{
            color:#6b7280;
            margin-bottom:35px;
            font-size:14px;
        }

        .form-group{
            margin-bottom:20px;
        }

        label{
            display:block;
            margin-bottom:8px;
            color:#374151;
            font-size:14px;
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #d1d5db;
            border-radius:10px;
            outline:none;
            font-size:15px;
        }

        input:focus{
            border-color:#4f46e5;
        }

        .options{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            font-size:14px;
        }

        .options a{
            color:#4f46e5;
            text-decoration:none;
        }

        .login-btn{
            width:100%;
            padding:15px;
            border:none;
            background:#4338ca;
            color:white;
            border-radius:10px;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        .login-btn:hover{
            background:#3730a3;
        }

        .divider{
            text-align:center;
            margin:25px 0;
            color:#9ca3af;
            font-size:14px;
        }

        .social-login{
            display:flex;
            gap:10px;
        }

        .social-btn{
            flex:1;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:10px;
            background:white;
            cursor:pointer;
        }

        .signup{
            text-align:center;
            margin-top:25px;
            font-size:14px;
            color:#6b7280;
        }

        .signup a{
            color:#4f46e5;
            text-decoration:none;
            font-weight:bold;
        }

        .right-panel{
            width:55%;
            background:linear-gradient(135deg,#4f46e5,#4338ca);
            color:white;
            padding:50px;
            position:relative;
            overflow:hidden;
        }

        .right-panel h2{
            font-size:32px;
            margin-bottom:15px;
        }

        .right-panel p{
            color:rgba(255,255,255,0.8);
            line-height:1.6;
        }

        .dashboard-preview{
            background:white;
            border-radius:20px;
            padding:25px;
            margin-top:50px;
            color:#111827;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
        }

        .cards{
            display:flex;
            gap:15px;
            margin-bottom:20px;
        }

        .card{
            flex:1;
            background:#f3f4f6;
            padding:15px;
            border-radius:12px;
        }

        .chart{
            height:180px;
            background:#eef2ff;
            border-radius:14px;
            display:flex;
            justify-content:center;
            align-items:center;
            color:#4338ca;
            font-weight:bold;
            font-size:20px;
        }

        .footer{
            position:absolute;
            bottom:20px;
            left:60px;
            font-size:12px;
            color:#d1d5db;
        }

        @media(max-width:900px){

            .login-container{
                width:95%;
                height:auto;
                flex-direction:column;
            }

            .left-panel,
            .right-panel{
                width:100%;
            }

        }

    </style>

</head>
<body>

<div class="login-container">

    <div class="left-panel">

        <div class="logo">
            POS System
        </div>

        <h1 class="title">
            Welcome Back
        </h1>

        <p class="subtitle">
            Enter your email and password to access your account
        </p>

        <?php if($errors->any()): ?>
            <div style="color:red; margin-bottom:15px;">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="/login">

            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label>Email</label>

                <input type="email"
                       name="email"
                       placeholder="admin@gmail.com">
            </div>

            <div class="form-group">
                <label>Password</label>

                <input type="password"
                       name="password"
                       placeholder="••••••••">
            </div>

            <div class="options">

                <label>
                    <input type="checkbox" style="width:auto;">
                    Remember Me
                </label>

                <a href="#">
                    Forgot Password?
                </a>

            </div>

            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

        <div class="divider">
            Or login with
        </div>

        <div class="social-login">

            <button class="social-btn">
                Google
            </button>

            <button class="social-btn">
                Apple
            </button>

        </div>

        <div class="signup">
            Don't have an account?
            <a href="#">Register Now</a>
        </div>

    </div>

    <div class="right-panel">

        <h2>
            Effortlessly manage your sales and inventory.
        </h2>

        <p>
            Log in to access your POS dashboard and manage products,
            barcode scanning, reports and customer sales.
        </p>

        <div class="dashboard-preview">

            <div class="cards">

                <div class="card">
                    <small>Total Sales</small>
                    <h3>$23,200</h3>
                </div>

                <div class="card">
                    <small>Orders</small>
                    <h3>320</h3>
                </div>

                <div class="card">
                    <small>Customers</small>
                    <h3>120</h3>
                </div>

            </div>

            <div class="chart">
                POS Dashboard Preview
            </div>

        </div>

        <div class="footer">
            Copyright © 2026 POS System
        </div>

    </div>

</div>

</body>
</html>
<?php /**PATH C:\pos-system\resources\views/login.blade.php ENDPATH**/ ?>