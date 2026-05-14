
<!DOCTYPE html>
<html>
<head>

    <title>POS Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#eef2ff;
            display:flex;
            min-height:100vh;
        }

        /* Sidebar */

        .sidebar{
            width:300px;
            background:#111827;
            color:white;
            padding:25px;

            position:fixed;
            top:0;
            left:0;
            height:100vh;
            overflow-y:auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 26px;
            font-weight: bold;
            color: white;
            margin-bottom:30px;
        }

        .logo-image {
            width: 40px;
            height: 40px;
            object-fit: contain;
            border-radius: 50%;
        }

        .menu{
            list-style:none;
        }

        .menu li{
            padding:15px 18px;
            border-radius:12px;
            margin-bottom:12px;
            cursor:pointer;
            transition:0.3s;
            color:#d1d5db;
        }

        .menu a{
            text-decoration: none;
            color: inherit;
        }

        .menu li:hover,
        .menu .active{
            background:#6E6EAA;
            color:white;
        }

        /* Main */

        .main{
            margin-left:300px;
            padding:30px;
            width: 100%;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .search-box{
            width:350px;
            padding:14px;
            border:none;
            border-radius:14px;
            background:white;
            box-shadow:0 4px 15px rgba(0,0,0,0.05);
            outline:none;
        }

        .profile{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .profile-circle{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#6E6EAA;
            color:white;
            display:flex;
            justify-content:center;
            align-items:center;
            font-weight:bold;
        }

        /* Cards */

        .cards{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:20px;
            margin-bottom:30px;
        }

        .card{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 6px 20px rgba(0,0,0,0.05);
        }

        .card small{
            color:#6b7280;
        }

        .card h2{
            margin-top:10px;
            color:#111827;
            font-size:32px;
        }

        /* Products */

        .content{
            display:grid;
            grid-template-columns:3fr 1fr;
            gap:25px;
        }

        .products{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 6px 20px rgba(0,0,0,0.05);
        }

        .products-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        .barcode-input{
            width:250px;
            padding:12px;
            border:1px solid #ddd;
            border-radius:12px;
            outline:none;
        }

        .product-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:20px;
        }

        .product-card{
            border:1px solid #e5e7eb;
            border-radius:18px;
            overflow:hidden;
            transition:0.3s;
            background:white;
        }

        .product-card:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 20px rgba(0,0,0,0.08);
        }

        .product-image{
            height:170px;
            background: linear-gradient(135deg, #6E6EAA, #8A8AC0);
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            font-size:24px;
            font-weight:bold;
        }

        .product-info{
            padding:18px;
        }

        .product-info h4{
            margin-bottom:8px;
            color:#111827;
        }

        .product-info p{
            color:#6b7280;
            font-size:14px;
        }

        .price-row{
            margin-top:15px;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .price{
            font-size:22px;
            font-weight:bold;
            color:#6E6EAA;
        }

        .add-btn{
            background:#6E6EAA;
            color:white;
            border:none;
            padding:10px 18px;
            border-radius:12px;
            cursor:pointer;
        }

        /* Cart */

        .cart{
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 6px 20px rgba(0,0,0,0.05);
        }
        .cart-header{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .cart-header h2,a{
            text-decoration: none;
            color: #6E6EAA;
            font-size: 25px;
        }

        .cart-item{
            display:flex;
            justify-content:space-between;
            margin-bottom:18px;
            padding-bottom:12px;
            border-bottom:1px solid #eee;
        }

        .total{
            margin-top:20px;
            font-size:28px;
            font-weight:bold;
            color:#111827;
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

        @media(max-width:1100px){

            .cards{
                grid-template-columns:repeat(2,1fr);
            }

            .content{
                grid-template-columns:1fr;
            }

            .product-grid{
                grid-template-columns:repeat(2,1fr);
            }

        }

        @media(max-width:700px){

            body{
                flex-direction:column;
            }

            .sidebar{
                width:100%;
            }

            .cards,
            .product-grid{
                grid-template-columns:1fr;
            }

            .topbar{
                flex-direction:column;
                gap:15px;
                align-items:flex-start;
            }

        }

        .logout-btn{
            background:none;
            border:none;
            color:#6E6EAA;
            font-size:12px;
            cursor:pointer;
            padding:0;
            margin-top:2px;
        }

        .logout-btn:hover{
            text-decoration:underline;
        }

    </style>

</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('../image/home_page_logo.jpg') }}" class="logo-image">
        <span>POS System</span>
    </div>

    
    <ul class="menu">
        <li>
            <a href="/home">
                <i class="fa-solid fa-house"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/products">
                <i class="fa-solid fa-box"></i>
                Products
            </a>
        </li>
        <li>
            <a href="/sales">
                <i class="fa-solid fa-chart-line"></i>
                Sales
            </a>
        </li>
        <li>
            <a href="/inventory">
                <i class="fa-solid fa-warehouse"></i>
                Inventory
            </a>
        </li>
        <li>
            <a href="/customers">
                <i class="fa-solid fa-users"></i>
                Customers
            </a>
        </li>
        <li>
            <a href="/reports">
                <i class="fa-solid fa-file-alt"></i>
                Reports
            </a>
        </li>
        <li>
            <a href="/settings">
                <i class="fa-solid fa-cog"></i>
                Settings
            </a>
        </li>
    </ul>

</div>

<div class="main">

    <div class="topbar">
        <input type="text" class="search-box" placeholder="Search product...">
        <div class="profile">
            <div>
                <strong>Admin User</strong><br>
                <small>Administrator</small>
               <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            </div>

            <div class="profile-circle">
                A
            </div>
        </div>
    </div>

    <!-- Page Content -->
    @yield('content')

</div>
        
</body>
</html>
