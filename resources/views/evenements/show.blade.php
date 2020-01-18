@extends('layouts.app')

@section('content')
    <a href="{{action('EventsController@edit', $events->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

    <div class="detail_box">
        <h3>{{$events->eve_nom}}</h3>
        <h4><span>Date de début:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($events->eve_datedebut))->format('d.m.Y') }}</h4>
        <h4><span>Date de fin:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($events->eve_datefin))->format('d.m.Y') }}</h4>
        <h4><span>Heure de début:</span>&nbsp;&nbsp;{{$events->eve_horairedebut}}</h4>
        <h4><span>Heure de fin:</span>&nbsp;&nbsp;{{$events->eve_horairefin}}</h4>
        <hr>
        @foreach($cotis as $coti )
            <h5>Cotisations</h5>
            <h4><span>Somme de la cotisation:</span>&nbsp;&nbsp;{{$coti->cot_somme}} CHF</h4>
            <h4><span>Nombre de paiement:</span>&nbsp;&nbsp;{{$coti->cot_nbPaiement}} Fois</h4>
            <h4><span>Première échéance:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('d.m.Y') }}</h4>
        @endforeach
    </div>
@endsection
