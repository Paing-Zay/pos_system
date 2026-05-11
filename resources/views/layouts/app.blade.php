
<!DOCTYPE html>
<html>
<head>

    <title>POS Dashboard</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            background:#4338ca;
            color:white;
        }

        /* Main */

        .main{
            flex:1;
            padding:30px;
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
            background:#4338ca;
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
            background:linear-gradient(135deg,#6366f1,#4338ca);
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
            color:#4338ca;
        }

        .add-btn{
            background:#4338ca;
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

        .cart h3{
            margin-bottom:20px;
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
            background:#4338ca;
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

    </style>

</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('../image/home_page_logo.jpg') }}" class="logo-image">
        <span>POS System</span>
    </div>

    
    <ul class="menu">
        <a href="/home"><li class="active">Dashboard</li></a>
        <a href="/products"><li>Products</li></a>
        <a href="/sales"><li>Sales</li></a>
        <a href="/inventory"><li>Inventory</li></a>
        <a href="/customers"><li>Customers</li></a>
        <a href="/reports"><li>Reports</li></a>
        <a href="/settings"><li>Settings</li></a>
    </ul>

</div>

<!-- Page Content -->
        @yield('content')
</body>
</html>
