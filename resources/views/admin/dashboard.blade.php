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
    <!-- Gestion des news -->
    <div class="col-sm-6">
      <h3>Gestion des news</h3>
      <hr>
      <p>Dernières actualités créées :</p>
      <ul class="list-group">
        @forelse ($posts as $post)
        @if($post->publie)
        <li class="list-group-item active">
        @else
        <li class="list-group-item">
        @endif
          <div class="pull-right">
          <a href="{{ route('post.edit', ['post' => $post->id]) }}">Éditer</a> | 
          <a href="{{ url('post/'.$post->id.'/destroy') }}" class="text-danger">Supprimer</a>
          </div>
          <a href="{{url('post/'.$post->id.'-'.$post->slug)}}">{{$post->titre}}</a> 
        </li>
        @empty
        <div class="alert alert-info" role="alert">Vous n'avez encore posté aucune actualité !</div>
        @endforelse
      </ul>
      <a href="{{url('post/create')}}" class="btn btn-default">Rédiger une actualité</a>
      <a href="{{url('post/liste')}}" class="btn btn-default">Toutes les actualités</a>
    </div>
    <!------------------------------>
    
    <div class="col-sm-6">
      <h3>Stock de Vélos</h3>
      <hr>

      <ul class="list-group">
        @forelse ($velos as $velo)
          <li class="list-group-item">
            <div class="pull-right">
            <a href="{{ route('velo.edit', ['velo' => $velo->id]) }}">Éditer</a> | 
            <a href="{{ url('velo/'.$velo->id.'/destroy') }}" class="text-danger">Supprimer</a>
            </div>
            <a href="{{url('velo/'.$velo->id)}}">{{$velo->modele}}</a> 
          </li>
        @empty
        <div class="alert alert-info" role="alert">Vous n'avez encore ajouté aucun vélo !</div>
        @endforelse
      </ul>
      <a href="{{url('velo/create')}}" class="btn btn-default">Ajouter un nouveau Vélo</a>
    </div>
  </div>
  <hr>
  <div class="row">
    
    <!-- Reservations -->
    <div class="col-sm-12">
      <h3>Réservations</h3>
      <p>Demandes de réservation :</p>
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>Utilisateur</th>
          <th>Vélo</th>
          <th>E-mail</th>
          <th>Tél</th>
          <th>Date</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reservations as $res)
          <tr>
            <td>{{ $res->user->name }}</td>
            <td><i>{{ $res->velo->modele }}</i></td>
            <td>{{ $res->user->email }}</td>
            <td>{{ $res->user->phone }}</td>
            <td>{{ $demijournee->toText($res->demijournee) }}</td>
            <td><button class='btn btn-success'>Valider</button> <button class='btn btn-danger'>Refuser</button></td>
          </tr>
          @empty
          <div class="alert alert-info" role="alert">Vous n'avez aucune demande de reservation en cours !</div>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection