@extends('app')

@section('content')
<div class="container contenu">
	<div class="listeArticles">
	@foreach ($articles as $article)
	
		<article class="{{ $article->slug }} boxShadow1">
		    <header>
		        <div class="flex-left">
		            <h2><a href="#">{{ $article->titre }}</a></h2>
		        </div>

		    </header>
		    <div class="chapo">
		        <p>{{ $article->chapo }} [...]</p>
		    </div>
		    <a href="{{url('/article/'.$article->id.'/'.$article->slug) }}" class="more boxShadow2">+</a>
		</article>
	@endforeach
	</div>
</div>
@endsection
