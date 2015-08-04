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
      <h3>Tous les articles</h3>
      <ul class="list-group">
        @forelse ($posts as $post)
        <li class="list-group-item">
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
      <a href="{{url('admin/dashboard')}}" class="btn btn-default">Retourner à la vue générale</a>
    </div>
  </div>
</div>
@endsection
