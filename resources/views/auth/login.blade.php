@extends('app')

@section('content')
<div class="container contenu">
	<div class="row">
		@if ( Session::has('info') )
			<div class="alert alert-info">
				{{ Session::get('info') }}
			</div>
		@endif
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Connexion</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oups !</strong> Votre envoi comporte des erreurs.<br>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group @if($errors->has('email')) has-error  @endif">
							<label class="col-md-4 control-label">Adresse E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group @if($errors->has('password')) has-error  @endif">
							<label class="col-md-4 control-label">Mot de passe</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Garder ma session active
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Se connecter</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">Mot de passe oublié ?</a> | <a class="btn btn-link" href="{{ url('/auth/register') }}">S'inscrire</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
