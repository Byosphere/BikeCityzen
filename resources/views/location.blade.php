@extends('app')

@section('content')
<div class="container contenu reservation">
    @if($etape==0)
    <div class="row">
        <h2>Réserver un vélo</h2>
        <hr>
    </div>
    @if ( Session::has('info') )
        <div class="alert alert-info">
            {{ Session::get('info') }}
        </div>
    @endif
    <div class="row">
        <form class="" action="{{route('location.store')}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <legend> Sélectionnez un vélo</legend>
                <div class="listeVelos">
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
                </fieldset>
                <fieldset class="blocDate">
                    <legend>Sélectionnez la ou les dates</legend>
                    <div>
                        <input type="text" class="datepicker" name='date'>
                        <select class="periode" name="periode">
                            <option value="am">Matin</option>
                            <option value="pm">Après-midi</option>
                        </select>
                    </div>
                </fieldset>
                <button type="button" name="addDate" class="addDate">Ajouter une autre date</button>
                <input type="hidden" name="idVelo" class='idVelo' value="">
                <button type="submit" class="buttonNext btn btn-primary">Faire une demande de réservation</button>
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
