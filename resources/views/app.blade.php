<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BikeCityzen</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navigation top">
		<div class="container">
			<div class="brand">
				<div class="logo">
					<img src="{{ asset('/img/logo.svg') }}" alt="">
				</div>
				<div class="head-logo"><a href="#"><b>BIKE</b>CITYZEN</a></div>
			</div>
			<ul class='nav nav-tabs'>
				<li><a href="{{ url('/') }}">Accueil</a></li>
				<li><a href="{{ url('/blog') }}">Actualités</a></li>
				<li><a href="">Louer</a></li>
				<li><a href="">Réparation</a></li>
				<li><a href="{{ url('/') }}#contact">contact</a></li>
			</ul>
			@unless (Auth::check())
			<ul class='nav nav-tabs connexion-menu'>
				<li><a href="{{ url('/auth/register') }}">Inscription</a></li>
				<li><a href="{{ url('/auth/login') }}">Se connecter</a></li>
			</ul>
			@else 
			<ul class='nav nav-tabs connexion-menu'>
				<li><a href="#">{{ Auth::user()->name }}</a></li>
				<li><a href="{{ url('/auth/logout') }}">Se déconnecter</a></li>
			</ul>
			@endif
		</div>
		<a href="#" class="button-menu">
		</a>
	</nav>

	@yield('content')
	<footer>
		<div class="container">
			<p>Copyright © 2015 <b>Bike</b>Cityzen </p>
		</div>
	</footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('/js/main.js') }}"></script>
	
</body>
</html>
