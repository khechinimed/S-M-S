<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/home.css">
    <title>MIAGE | 2020</title>
</head>
<body>
    <header>
        <div class="divLoad">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <div id="particles-js"></div>
        <div class="container">
            <nav class="pt-5">
                <ul class="nav nav-pills nav-justified">
                    <li class="nav-item"><a class="active " href="#">HOME</a></li>
                    <li class="nav-item"><a href="#">ABOUT</a></li>
                    <li class="nav-item"><a href="#">INFOS</a></li>
                    <li class="nav-item"><a href="#">CONTACT</a></li>
                    <li class="nav-item"><a href="{{ url('/home') }}">LOGIN</a></li>
                </ul>
            </nav>
            <div class="main">
                <div class="mx-auto typed">
                    <h1>MIAGE</h1>
                    <h4><span id="miage"></span></h4>
                </div>
                <a href="{{ url('/home') }}">Se Connecter</a>
            </div>
        </div>
    </header>
    
    
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="left">
                    <div class="col-sm-8">col-sm-8</div>
                </div>
                <div class="right">
                    <div class="col-sm-8">col-sm-8</div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/js/particles.js"></script>
    <script src="/js/particle.js"></script>
    <script src="/js/typed.js"></script>

    <script>
        $(window).on("load", function(){
            $(".divLoad").fadeOut("slow")
        })

    </script>
</body>
</html>


{{-- @if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif --}}