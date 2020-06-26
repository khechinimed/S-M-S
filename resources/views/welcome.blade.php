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
                    <li class="nav-item"><a href="#about">ABOUT</a></li>
                    <li class="nav-item"><a href="#infos">INFOS</a></li>
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
    
    
    <!-- ABOUT SECTION -->
    <div id="about" class="section wb nopadtop">
        <div class="container">
            <div class="row pb-5">
				<div class="col-md-6 m40">
                    <div class="message-box">
                        <h4>ABOUT US</h4>
                        <h2>POURQUOI INTÉGRER MIAGE ?</h2>
                        <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, 
						non aliquam risus. Sed a tellus quis mi honcus dignissim.</p>
						
						<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum sed elit a ex ullamcorper gravida. Integer lorem libero, hendrerit sed hendrerit in, molestie quis urna. Nullam sed sapien at nisi mollis blandit porttitor at dolor. Suspendisse fermentum vestibulum iaculis. Quisque tempor sagittis bibendum. Quisque pulvinar dui vitae fringilla euismod. Integer gravida commodo nisl a feugiat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. </p>
                        
                    </div><!-- end messagebox -->
                </div><!-- end col -->
				
                <div class="col-md-6">
                    <div class="post-media wow fadeIn">
                        <img src="img/about-cover.jpg" alt="" class="img-fluid">
                    </div><!-- end media -->
                </div><!-- end col -->
                
            </div><!-- end row -->
            
            <hr>

			<div class="row vission-and-mission infos" id="infos">
                <h2>INFOS</h2>
				<div class="col-md-12">
					<ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
						<li class="nav-item"><a class="nav-link active" href="#tab_a" data-toggle="tab">Our Mission</a></li>
						<li class="nav-item"><a class="nav-link" href="#tab_b" data-toggle="tab" style="color: #484a4c;">Our Vission</a></li>				
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tab_a">
							<div class="box-inner-m">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi scelerisque tortor mi, eget mattis velit sagittis id. Duis ornare mauris eu eros interdum, vitae finibus arcu ultricies. Donec vitae felis eleifend, dignissim erat a, pretium diam. Donec eu massa odio. Suspendisse et ornare lacus, pharetra imperdiet ligula.</p>
								<p>Vestibulum ac quam id lorem semper condimentum. Nulla vel ligula turpis. Nullam luctus, mi nec rhoncus gravida, tortor est semper purus, a feugiat sapien odio non urna. Fusce pellentesque neque ut nisi rhoncus imperdiet. Sed eu purus vel turpis consectetur convallis. Donec a dolor tellus. Phasellus dignissim erat nec ipsum condimentum sollicitudin. </p>
							</div>
						</div>
						<div class="tab-pane fade" id="tab_b">
							<div class="box-inner-m">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque risus tortor, aliquam quis augue eu, tempus semper tellus. Nullam eu auctor lacus. Cras dapibus a eros sed lobortis. Phasellus dictum mattis nibh, pretium maximus ex eleifend quis. Quisque ac nisi blandit, sagittis nulla eu, volutpat nibh. Duis non mauris velit. Nulla ornare scelerisque ex, et ultrices nunc dictum sed. Aenean in ultricies turpis, quis gravida elit. Aenean finibus, eros quis lobortis blandit, nibh massa luctus magna, sed laoreet nisi libero eu urna. In mi est, elementum eu tempor sollicitudin, lacinia eget sem. Vivamus aliquet volutpat ante. Ut faucibus nibh nec feugiat mollis. Maecenas quis felis accumsan, fermentum massa vitae, porttitor purus. Aliquam faucibus, risus id ultrices sollicitudin, justo sem sodales odio, eget suscipit risus nibh non purus. Duis dictum, ex a cursus mattis, justo neque interdum augue, sit amet hendrerit odio felis ut ante. Pellentesque vitae tristique libero, ac venenatis libero. </p>
							</div>
						</div>
					</div>
				</div>				
			</div>
        </div><!-- end container -->
    </div><!-- end section -->
    <footer><h6>MIAGE &copy;2020<span> | </span>Méthodes Informatique appliqués à la gestion des entreprises </h6></footer>

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