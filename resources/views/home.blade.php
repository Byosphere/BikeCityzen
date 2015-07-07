@extends('app')

@section('content')

<div class="cover">
	<div class="container">
		<div class="headlines">
	        <h1 class="title">SIMPLIFIEZ VOS VOYAGES A DEUX ROUES</h1>
	        <p class="subtitle">LOCATION ET RÉPARATION DE VÉLOS</p>

		</div>
		<div class="socials"></div>
	</div>
</div>
<div class="tab location">
	<div class="container">
		<h2>Louez un vélo en toute facilité !</h2>
		<p class="lead">Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.</p>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<img src="{{ asset('/img/inscription.svg') }}" alt="Sass and Less support" class="img-responsive">
			<h3>Devenez un Bikecityzen</h3>
			<p>L'inscription est rapide et facile, il suffit de prendre un instant pour remplir le formulaire à <a href="#">cette page</a>. Vous voilà à présent un BikeCityzen !</p>
			</div>
			<div class="col-sm-4">
			<img src="{{ asset('/img/calendar.svg') }}" alt="Responsive across devices" class="img-responsive">
			<h3>Choisissez une date</h3>
			<p>Une fois connecté vous pouvez réserver directement votre vélo en suivant <a href="">ce lien</a>. Une fois la demande traitée, vous recevrez un mail qui confirmera votre réservation !</p>
			</div>
			<div class="col-sm-4">
			<img src="{{ asset('/img/getvelo.svg') }}" alt="Components" class="img-responsive">
			<h3>Récupèrez votre vélo !</h3>
			<p>Rendez-vous au point de retrait le jour de votre location et profitez de la qualité BikeCityzen !</p>
			</div>
		</div>
	</div>
</div>
<div class="tab reparation">
	<div class="container">
		<h2>Faites réparer votre vélo par un expert</h2>
		<p class="lead">Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.</p>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<img src="assets/img/sass-less.png" alt="Sass and Less support" class="img-responsive">
			<h3>Deviens un Bikecityzen</h3>
			<p>Bootstrap ships with vanilla CSS, but its source code utilizes the two most popular CSS preprocessors, <a href="../css/#less">Less</a> and <a href="../css/#sass">Sass</a>. Quickly get started with precompiled CSS or build on the source.</p>
			</div>
			<div class="col-sm-4">
			<img src="assets/img/devices.png" alt="Responsive across devices" class="img-responsive">
			<h3>Choisis une date</h3>
			<p>Bootstrap easily and efficiently scales your websites and applications with a single code base, from phones to tablets to desktops with CSS media queries.</p>
			</div>
			<div class="col-sm-4">
			<img src="assets/img/components.png" alt="Components" class="img-responsive">
			<h3>Récupère ton vélo !</h3>
			<p>With Bootstrap, you get extensive and beautiful documentation for common HTML elements, dozens of custom HTML and CSS components, and awesome jQuery plugins.</p>
			</div>
		</div>
	</div>
</div>
<div class="tab partenaire">
	<h2>PAGE DETAILS PARTENAIRES</h2>
</div>
<div class="tab contact" id='contact'>
	<h2>PAGE CONTACT</h2>
</div>	
<div class="tab map"></div>
@endsection
