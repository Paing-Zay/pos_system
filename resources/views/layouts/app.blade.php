
<!DOCTYPE html>
<html>
<head>
    <title>POS Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('image/home_page_logo.jpg') }}" class="logo-image">
        <span>POS System</span>
    </div>

    
    <ul class="menu">
        <a href="/dashboard">
            <li>
                <i class="fa-solid fa-house"></i>
                Dashboard
            </li>
        </a>
        <a href="/products">
            <li>
                <i class="fa-solid fa-box"></i>
                Products
            </li>
        </a>
        <a href="/sales">
            <li>
                    <i class="fa-solid fa-chart-line"></i>
                    Sales
            </li>
        </a>
        <a href="/inventory">
            <li>
                <i class="fa-solid fa-warehouse"></i>
                Inventory
            </li>
        </a>
        <a href="/customers">
            <li>
                <i class="fa-solid fa-users"></i>
                Customers
            </li>
        </a>
        <a href="/reports">
            <li>
                <i class="fa-solid fa-file-alt"></i>
                Reports
            </li>
        </a>
        <a href="/settings">
            <li>
                <i class="fa-solid fa-cog"></i>
                Settings
            </li>
        </a>
    </ul>

</div>

<div class="main">

    <div class="topbar">
        <p></p>
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
  