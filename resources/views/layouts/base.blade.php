<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
    
        <nav class="navbar">
            <ul class="nav-list">
                <li class="nav-list-item"><a href="{{route('home')}}">Acceuil</a></li>
                
                <li class="nav-list-item"><a href="{{route('newPost')}}">Créer un Nouveu Post</a></li>
                <li class="nav-list-item"><a href="{{route('bestpost')}}">Meilleur post du mois</a></li>
                <li class="nav-list-item"><a href="{{route('contact-us')}}">Contacter nous</a></li>
                
                @if(Auth::user()->admin)
                    <a href="{{route('admin')}}">
                    <li class="nav-list-item">Administration</li>
                    </a>
                @endif
            </ul>

        </nav>
        <div class="wrapper header">
        <div class="logo">
            <div class="logo-img">
                <img src="{{ asset('img/dalmatien.svg')}}" >
            </div>
            <div class="scroll">
            <span class="scroll-txt">calin de Toutou.com || Le blog des amis canin || et vous, que faite vous pour les mettre a l'aise?</span>
            <span class="scroll-txt reverse">Retrouver d'autres amoureux de toutou poilu || partager vos experiences avec nos amis a quatre pattes  </span>
            </div>
            
        </div>
        <div class="account-nav">
                <div class="user-img">
                    @if (Auth::user()->image)
                    <form action="{{route('setPP')}}" method="get">
                    <button type="submit"><img src="{{Url(Storage::url('public/' . Auth::user()->image->path))}}" alt="">
                        </button>  
                    </form>
                    
                    @else
                    <form action="{{route('setPP')}}" method="get"><button type="submit"><img src="{{Url(Storage::url('public/usersImage/user_default.png'))}}" alt="" srcset=""></button></form>
                    @endif
                </div>
                <div class="user-info">
                    <span>
                        {{Auth::user()->name}}
                    </span>

                </div>
                <div class="account-btn-list">
                @if(Auth::check())
                    <form action="{{route('logout')}}" method="post">
                    @csrf    
                    <button type="submit">
                            Se  Deconnecter
                        </button>
                    </form>
                    <div class="toggle-button">
                @else
                    <form action="{{route('login')}}" method="post">
                    @csrf    
                    <button type="submit">
                            Se  Connecter
                        </button>
                    </form>
                    <div class="toggle-button">
                @endif
                    <div class="toggle-button">
  <div class="wrapper">
    <div class="menu-bar menu-bar-top"></div>
    <div class="menu-bar menu-bar-middle"></div>
    <div class="menu-bar menu-bar-bottom"></div>
  </div>
</div>
                </div>
        </div>
        
    
        </div>
        
    </header>
    @yield('content')
    <footer class="footer">
    <div>Icônes conçues par <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/fr/" title="Flaticon">www.flaticon.com</a></div>
    </footer>
</body>
<script src="https://kit.fontawesome.com/635130ca87.js" crossorigin="anonymous"></script>

<script src="{{asset('js/app.js')}}"></script>
</html>