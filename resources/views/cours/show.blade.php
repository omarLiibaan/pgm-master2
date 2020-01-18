@extends('layouts.app')

@section('content')
<a href="{{action('CoursController@edit', $cours->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

<div class="detail_box">
    <h3>{{$cours->cou_nom}}</h3>
    <h4><span>Date de début:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datedebut))->format('d.m.Y') }}</h4>
    <h4><span>Date de fin:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datefin))->format('d.m.Y') }}</h4>
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

<!-- <h3>{{$cours->cou_nom}}</h3>
                <h6>Date de début: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datedebut))->format('d.m.Y') }}</h6>
                <h6>Date de fin: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datefin))->format('d.m.Y') }}</h6>
                <hr>
                <h3>Séances</h3>
                @foreach($seances as $seance )
                    <h6>Jours: {{$seance->sea_jours}}</h6>
                    <h6>Heure de début: {{$seance->sea_heureDebut}}</h6>
                    <h6>Heure de fin: {{$seance->sea_heureFin}}</h6>
                    <h6>Lieu: {{$seance->sea_lieu}}</h6>
                    <hr>
                @endforeach
                @foreach($cotis as $coti )
                    <h3>Cotisations</h3>
                    <h6>Somme de la cotisation: {{$coti->cot_somme}} CHF</h6>
                    <h6>Nombre de paiement: {{$coti->cot_nbPaiement}} Fois</h6>
                    <h6>Nombre d'échéance: {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('d.m.Y') }}</h6>
                @endforeach -->

@endsection

