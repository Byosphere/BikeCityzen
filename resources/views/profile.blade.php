@extends('app')

@section('content')
<div class="container contenu">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">Profil de {{ $user->name }}</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('user.update',['user' => $user->id]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <fieldset>
                        <legend>Informations générales</legend>
                        <div class="form-group @if($errors->has('nom')) has-error  @endif">
    						<label class="col-md-3 control-label">Nom</label>
    						<div class="col-md-6">
    							<input type="text" class="form-control" name="nom" value="{{ old('nom') }}" placeholder="{{ $user->name }}">
    						</div>
    					</div>
                        <div class="form-group @if($errors->has('email')) has-error  @endif">
    						<label class="col-md-3 control-label">E-mail</label>
    						<div class="col-md-6">
    							<input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{ $user->email }}">
    						</div>
    					</div>
                        <div class="form-group @if($errors->has('phone')) has-error  @endif">
    						<label class="col-md-3 control-label">Téléphone</label>
    						<div class="col-md-6">
    							<input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{ $user->phone }}">
    						</div>
    					</div>
                    </fieldset>
                    <div class="form-group">
						<div class="col-md-4 col-md-offset-3">
							<button type="submit" class="btn btn-primary">
								Modifier
							</button>
						</div>
					</div>
                </form>
                <br>
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('user.update',['user' => $user->id]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <fieldset>
                        <legend>Changer de mot de passe</legend>
                        <div class="form-group @if($errors->has('nom')) has-error  @endif">
                            <label class="col-md-3 control-label">Ancien mot de passe</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nom" value="" >
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('pass')) has-error  @endif">
                            <label class="col-md-3 control-label">Nouveau mot de passe</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pass" value="">
                            </div>
                        </div>
                        <div class="form-group @if($errors->has('pass2')) has-error  @endif">
                            <label class="col-md-3 control-label">Confirmer le nouveau mot de passe</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pass2">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
						<div class="col-md-4 col-md-offset-3">
							<button type="submit" class="btn btn-primary">
								Changer
							</button>
						</div>
					</div>
                </form>
                <hr>
                <div class="réservations">
                    <legend>Liste des réservations</legend>
                    <table class="table table-bordered">
                        <thead>
                            <th>Vélo</th>
                            <th>Date</th>
                            <th>Etat</th>
                        </thead>
                        @forelse($user->reservations as $res)
                            <tr>
                                <td>{{ $res->velo->modele }}</td>
                                <td>{{ $res->demijournee }}</td>
                                @if($res->valide == 0)
                                <td><span class="label label-warning">En attente de confirmation</span></td>
                                @elseif($res->valide == 1)
                                <td><span class="label label-success">Validé</span></td>
                                @elseif($res->valide == 2)
                                <td><span class="label label-default">Terminé</span></td>
                                @elseif($res->valide == 3)
                                <td><span class="label label-danger">Réservation annulée</span></td>
                                @else
                                <td></td>
                                @endif
                            </tr>
                        @empty
                        <div class="alert alert-info" role="alert">Vous n'avez aucune demande de reservation en cours !</div>
                        @endforelse

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
