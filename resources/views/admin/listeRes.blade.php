@extends('app')

@section('content')
<div class="container contenu">
  @if ( Session::has('info') )
			<div class="alert alert-info">
				{{ Session::get('info') }}
			</div>
	@endif
  <div class="row">
    <h2>Administration</h2>
    <hr>
  </div>
  <div class="row">
    <!-- Reservations -->
    <div class="col-sm-12">
      <h3>Archives de Réservations</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Utilisateur</th>
          <th>Vélo</th>
          <th>E-mail</th>
          <th>Tél</th>
          <th>Date</th>
          <th>Etat</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reservations as $res)
          <tr>
            <td>{{ $res->user->name }}</td>
            <td><i>{{ $res->velo->modele }}</i></td>
            <td>{{ $res->user->email }}</td>
            <td>{{ $res->user->phone }}</td>
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
            <td>Etat inconnu</td>
            @endif
          </tr>
          @empty
          <div class="alert alert-info" role="alert">Vous n'avez aucune demande de reservation en cours !</div>
          @endforelse
        </tbody>
      </table>
      <a href="{{url('admin/dashboard')}}" class="btn btn-default">Retourner à la vue générale</a>
    </div>
  </div>
</div>
@endsection
