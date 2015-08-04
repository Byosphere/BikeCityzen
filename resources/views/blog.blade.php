@extends('app')

@section('content')
<div class="backPattern"></div>
<div class="container contenu ">
	<div class="listeArticles">
	@foreach ($articles as $article)

		<article class="blog {{ $article->slug }} boxShadow2">
		    <header>
		        <div class="flex-left">
		            <h2><a href="#">{{ $article->titre }}</a></h2>
		        </div>
				<div class="photo">
					<img src="{{ $article->photo }}" alt="{{ $article->titre }}" />
				</div>
		    </header>
		    <div class="chapo">
		        <p>{{ $article->chapo }} [...]</p>
		    </div>
		    <div class="more">
				<a href="{{url('/article/'.$article->id.'/'.$article->slug) }}">Lire plus</a>
		    </div>
		</article>
	@endforeach
	</div>
	<div class="page">{!! $articles->render() !!}</div>
</div>
@endsection
