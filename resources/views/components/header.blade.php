<!-- <div>
    <ul>
        <li><a href="/">Home Page</a></li>
        <li><a href="/hello">Hello Page</a></li>
        <li><a href="{{URL::to('/contact')}}">Contact Page</a></li>
        <li><a href="/users">Users</a></li>
    </ul>
    <h2>Component Title : {{$title}}</h2>
    <h4>Last URL : {{URL::previous()}}</h4>
    <h4>Current URL : {{URL::current()}}</h4>
    <h4>Full URL : {{URL::full()}}</h4>
</div> -->


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Gebruikers</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="{{ URL::asset('styles/global.css') }}">
    <script src="{{ asset('scripts/script.js') }}"></script>
</head>
<body>
    <!-- sidebar start -->
    <div class="sidebar">
        <a id="sidebarBtn" class="btn-collapse"><i class="fa fa-caret-right"></i></a>
        <div class="logo">
            <img src="{{ asset('img/logo-placeholder.png') }}" />
        </div>
        <div class="menu-area">
            <ul class="menu main-menu">
                <li class="menu-item">
                    <a href="dashboard.html"><i class="fa fa-dashboard"></i>Dashboard</a>
                </li>
                <li class="menu-item">
                    <a href="{{URL::to('/customers')}}"><i class="fa fa-user-tie"></i>Klanten</a>
                </li>
                <li class="menu-item">
                    <a href="{{URL::to('/suppliers')}}"><i class="fa-solid fa-truck"></i>Leveranciers</a>
                </li>
                <li class="menu-item">
                    <a href="userprofile.html"><i class="fa fa-address-card"></i>Profiel</a>
                </li>
            </ul>
            <div class="menu-divider"></div>
            <ul class="menu admin-menu">
                <li class="menu-item">
                    <a href="{{URL::to('/users')}}" class="active"><i class="fa fa-users"></i>Gebruikers</a>
                </li>
                <li class="menu-item">
                    <a href="rollen.html"><i class="fa fa-suitcase"></i>Rollen</a>
                </li>
                <li class="menu-item">
                    <a href="organisatie.html"><i class="fa fa-building"></i>Organisatie</a>
                </li>
            </ul>
        </div>

        <div class="sponsor">
            <span>Sponsored by:</span>
            <img src="img/logo-white.png" />
        </div>
    </div>
    <!-- sidebar end -->
