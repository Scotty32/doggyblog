<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
    <div class="main">
        <header class="header">
            <div class="hbg-container">
            <button class="btn btn-hamburger" />

            </div>
            
            <div class="search-bar">
                <input type="text" name="search" id="search" class="input searchbar-input">
                <i class="fas fa-search"></i>
            </div>
            <div class="tohome">
                <a href="{{route('home')}}">Allez a l'acceuil</a>
            </div>
            <form action="{{route('logout')}}" method="post" class="logout">
            @csrf
            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"><div class="logout">Logout</div></a>
    </form>    
    </header>
        <div class="container">
            <nav class="side-navbar">
                <span class="navbar-item"><span class="listen" id="0">Dashboard</span></span>
                <span class="navbar-item"><span class="listen" id="1">Blog</span></span>
                <span class="navbar-item"><span class="listen" id="2">Messages</span></span>
                <span class="navbar-item"><span class="listen" id="3">Subcribers</span></span>
                     </nav>
            <div class="container select-content">
            <x-dashboardComponent :post="$posts" :admin="$admin" />
            <x-blogComponent/>
            <x-messagesComponent/>
            <x-suscribersComponent/>
            
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/635130ca87.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>