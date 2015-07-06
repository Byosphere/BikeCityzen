@extends('app')

@section('content')
<div class="container contenu">
  <div class="row">
    <h2>Administration</h2>
    <p class="lead">Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes.</p>
    <hr>
  </div>
  <div class="row">
    <!-- Gestion des news -->
    <div class="col-sm-4">
      <h3>Gestion des news</h3>
      <hr>
      <p>Dernières actualités publiées :</p>
      <ul class="list-group">
        @forelse ($posts as $post)
        <li class="list-group-item">
          <div class="pull-right">
          <a href="{{ route('post.edit', ['post' => $post->id]) }}">Éditer</a> | <a href="{{ route('post.destroy', ['post' => $post->id]) }}">Supprimer</a>
          </div>
          <a href="{{url('post/'.$post->id.'-'.$post->slug)}}">{{$post->titre}}</a> 
        </li>
        @empty
        <div class="alert alert-info" role="alert">Vous n'avez encore posté aucune actualité !</div>
        @endforelse
      </ul>
      <a href="{{url('post/create')}}" class="btn btn-default">Rédiger une actualité</a>
    </div>
    <!------------------------------>
    
    <div class="col-sm-4">
      <h3>Stock de Vélos</h3>
      <hr>
      <ul class="list-group">

      </ul>
    </div>
    
    <div class="col-sm-4">
      <h3>Réparation</h3>
      <hr>
      <ul class="list-group">

      </ul>
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