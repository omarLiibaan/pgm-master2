@extends('layouts.app')

@section('content')
    <a href="{{action('SaisonsController@edit', $saison->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

    <div class="detail_box">
        <h3>Saison {{$saison->sai_nomCategorie}}</h3>
        <h4><span>Date de début:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateDebut))->format('d.m.Y') }}</h4>
        <h4><span>Date de fin:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateFin))->format('d.m.Y') }}</h4>
    </div>
@endsection


