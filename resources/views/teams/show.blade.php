
@extends('layouts.app')

@section('content')

<div class="detail_box">
    @foreach($teams as $team)
        <h3>{{$team->tea_nom}}</h3>
        <h4><span>Saison:</span>&nbsp;&nbsp;{{$team->sai_nomCategorie}}</h4>
        <h4><span>Catégorie:</span>&nbsp;&nbsp;{{$team->cat_nom}}</h4>
    @endforeach
    <hr>
    @foreach($cotis as $coti )
    <h4><span>Somme de la cotisation:</span>&nbsp;&nbsp;{{$coti->cot_somme}} CHF</h4>
    <h4><span>Nombre de paiement:</span>&nbsp;&nbsp;{{$coti->cot_nbPaiement}} Fois</h4>
    <h4><span>Première échéance:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('d.m.Y') }}</h4>
    @endforeach
    <hr>
    <div class="detail_row">
        @php ($i = 1)
        @foreach($seances as $seance )
        <div class="detail_alone_col">
            <h6>Séance n° {{$i}}</h6>
            <p><span>Jours:</span>&nbsp;&nbsp;{{$seance->sea_jours}}</p>
            <p><span>Heure de début:</span>&nbsp;&nbsp;{{$seance->sea_heureDebut}}</p>
            <p><span>Heure de fin:</span>&nbsp;&nbsp;{{$seance->sea_heureFin}}</p>
            <p><span>Lieu:</span>&nbsp;&nbsp;{{$seance->sea_lieu}}</p>
        </div>
        @php ($i++)
        @endforeach
    </div>
</div>

<a href="{{action('TeamsController@edit', $team->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

@endsection


