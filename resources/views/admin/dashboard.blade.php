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
      <a href="{{url('admin/listePosts')}}" class="btn btn-default">Toutes les actualités</a>
    </div>
    <!------------------------------>

    <div class="col-sm-6">
      <h3>Stock de Vélos</h3>
      <hr>

      <ul class="list-group">
        @forelse ($velos as $velo)
          <li class="list-group-item">
              <div class="miniature">
                  <img src="{{$velo->image}}" alt="{{$velo->modele}}" />
              </div>
            <div class="pull-right">
            <a href="{{ route('velo.edit', ['velo' => $velo->id]) }}">Éditer</a> |
            <a href="{{ url('velo/'.$velo->id.'/destroy') }}" class="text-danger">Supprimer</a>
            </div>
            <span>{{$velo->modele}}</span>
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
          <th>Dates</th>
          <th>Etat</th>
          <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reservations as $res)
          @if($res->valide)
          <tr class='success'>
          @else
          <tr class='active'>
          @endif
            <td>{{ $res->user->name }}</td>
            <td><i>{{ $res->velo->modele }}</i></td>
            <td>{{ $res->user->email }}</td>
            <td>{{ $res->user->phone }}</td>
            <td><ul class="list-group">
            @foreach($res->demijournees as $dj)
            <li class="list-group-item">
                <span class="badge">{{ $dj->periode }}</span>{{ $dj->date }}
            </li>
            @endforeach
            </ul></td>
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
            <td>
            @if($res->valide)
            <a class='btn btn-info' href="{{ url('location/archiver/'. $res->id) }}">Archiver</a></td>
            @else
            <a class='btn btn-success'href='{{ url('location/valider/'. $res->id) }}'>Valider</a>
            <a class='btn btn-danger' href="{{ url('location/refuser/'. $res->id) }}">Refuser</a></td>
            @endif

          </tr>
          @empty
          <div class="alert alert-info" role="alert">Vous n'avez aucune demande de reservation en cours !</div>
          @endforelse
        </tbody>
      </table>
      <a href="{{url('admin/listeRes')}}" class="btn btn-default">Voir les archives</a>
    </div>
    <br>
  </div>
</div>
@endsection
