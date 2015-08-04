@extends('app')

@section('content')
<div class="container contenu reservation">
    @if($etape==0)
    <div class="row">
        <h2>Sélectionnez un vélo</h2>
        <hr>
    </div>
    <div class="row">
        <form class="" action="{{url('/location/reservation')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="part1">
                <div class="row">
                    @foreach($velos as $velo)
                    <div class="velo" data-id="{{$velo->id}}">
                        <span>{{$velo->categorie}}</span>
                        <figure>
                            <img src="{{$velo->image}}" alt="{{$velo->modele}}" />
                            <figcaption>{{$velo->modele}}</figcaption>
                        </figure>
                    </div>
                    @endforeach
                </div>
                <input type="hidden" name="idVelo" class='idVelo' value="">
                <button type="submit" name="buttonNext" class="buttonNext btn btn-primary">Suivant</button>
            </div>
        </form>
    </div>
    @else
    <div class="row">
        <h2>Sélectionnez une date</h2>
        <hr>
    </div>
    @endif
</div>
@endsection
