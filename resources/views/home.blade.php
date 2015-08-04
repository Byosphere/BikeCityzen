@extends('app')

@section('content')

<div class="cover">
	<div class="container">
		<div class="headlines">
	        <h1 class="title">SIMPLIFIEZ VOS VOYAGES A DEUX ROUES</h1>
	        <p class="subtitle">LOCATION ET RÉPARATION DE VÉLOS</p>

		</div>
		<div class="socials">
			<a href="#">Facebook</a>
			<a href="#">Google Plus</a>
			<a href="#">Instagram</a>
		</div>
	</div>
</div>
<div class="tab location">
	<div class="container">
		<h2>Louez un vélo en toute facilité !</h2>
		<p class="lead">BikeCityzen vous propose une large gamme de vélos à louer pour les petits et les grands ! </p>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<img src="{{ asset('/img/inscription.svg') }}" alt="Sass and Less support" class="img-responsive">
			<h3>Devenez un Bikecityzen</h3>
			<p>L'inscription est rapide et facile, il suffit de prendre un instant pour remplir le formulaire à <a href="#">cette page</a> et vous voilà à présent un BikeCityzen !</p>
			</div>
			<div class="col-sm-4">
			<img src="{{ asset('/img/calendar.svg') }}" alt="Responsive across devices" class="img-responsive">
			<h3>Choisissez une date</h3>
			<p>Une fois connecté vous pouvez réserver directement votre vélo en suivant <a href="">ce lien</a>. Une fois la demande traitée, vous recevrez un e-mail qui confirmera votre réservation !</p>
			</div>
			<div class="col-sm-4">
			<img src="{{ asset('/img/getvelo.svg') }}" alt="Components" class="img-responsive">
			<h3>Récupèrez votre vélo !</h3>
			<p>Enfin, rendez-vous au <a href="#">point de retrait</a> le jour de votre location et profitez de la qualité BikeCityzen !</p>
			</div>
		</div>
	</div>
</div>
<div class="tab reparation">
	<div class="container">
		<h2>La remise à neuf de votre vélo</h2>
		<p class="lead">Faites réparer votre vélo par un expert de la mécanique cycle.</p>
		<br>
		<div class="row">
			<div class="col-sm-6">
				<img src="{{ asset('/img/atelier.svg') }}" alt="Sass and Less support" class="img-responsive">
				<h3>Réparation à l'atelier</h3>
				<p>Le local est ouvert du mardi au vendredi de 8h à 10h puis de 17h à 19h, le lundi de 17h à 19h et le samedi de 9h à 15h. Il est aussi possible de <a href="#contact">nous contacter</a> pour convenir d'un rendez-vous hors horaires d'ouverture !</p>
			</div>
			<div class="col-sm-6">
				<img src="{{ asset('/img/domicile.svg') }}" alt="Responsive across devices" class="img-responsive">
				<h3>Réparation à domicile</h3>
				<p>A l'aide d'un vélo cargo, la mécanicienne peut se dépalcer sur toute l'agglomération lyonnaise pour réparer vos vélos. <a href="#contact">Contactez-nous</a> pour prendre rendez-vous !</p>
			</div>
		</div>
	</div>
</div>
<div class="tab partenaire">
	<h2>PAGE DETAILS PARTENAIRES</h2>
</div>
<div class="tab contact" id='contact'>
	<div class="container">
		<h2>Pour nous contacter</h2>
		<p class="lead">Nous répondrons au plus vite à toute question. N'hésitez pas !</p>
		<div class="row">
			<div class="col-sm-4">
				<img src="{{ asset('/img/phone.svg') }}" alt="Sass and Less support" class="img-responsive">
				<h3>Par téléphone</h3>
				<p class="tel">00 00 00 00 00</p>
			</div>
			<div class="col-sm-4">
				<img src="{{ asset('/img/mail.svg') }}" alt="Responsive across devices" class="img-responsive">
				<h3>Par mail</h3>
				<p>contact@bikecityzen.com</p>
			</div>
			<div class="col-sm-4">
				<img src="{{ asset('/img/place.svg') }}" alt="Responsive across devices" class="img-responsive">
				<h3>Sur place</h3>
				<p><address class="">
					 61 rue Antoine Primat, à Villeurbanne
				</address></p>
			</div>
		</div>
	</div>
</div>
<div class="tab map"></div>
@endsection
