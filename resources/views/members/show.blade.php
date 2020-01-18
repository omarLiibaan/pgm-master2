@extends('layouts.app')

@section('content')
    <a href="{{action('MembersController@edit', $member->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

    <div class="detail_box">
        <h3>{{$member->mem_prenom}} {{$member->mem_nom}}</h3>
        <h4>{{$member->mem_email}}</h4>
        <hr>
        <div class="detail_row">
            <div class="detail_left_col">
                <p><span>Adresse:</span>&nbsp;&nbsp;{{$member->mem_adresse}}</p>
                <p><span>NPA:</span>&nbsp;&nbsp;{{$member->mem_npa}}</p>
                <p><span>Localité:</span>&nbsp;&nbsp;{{$member->mem_localite}}</p>
                <p><span>Date de naissance:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('d.m.Y') }}</p>
                <p><span>Numero de portable:</span>&nbsp;&nbsp;{{$member->mem_numeroportable}}</p>
                <p><span>Numero de téléphone:</span>&nbsp;&nbsp;{{$member->mem_numfixe}}</p>
            </div>
            <div class="detail_right_col">
                <p><span>Nom rep. légal:</span>&nbsp;&nbsp;{{$member->mem_nomparent}}</p>
                <p><span>Prénom rep. légal:</span>&nbsp;&nbsp;{{$member->mem_prenomparent}}</p>
                <p><span>Pays:</span>&nbsp;&nbsp;{{$member->mem_pays}}</p>
                <p><span>N° de Licence:</span>&nbsp;&nbsp;{{$member->mem_numlicense}}</p>
                <p><span>Date d'entrée:</span>&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_entredate))->format('d.m.Y') }}</p>
                <p><span>Statut du membre:</span>&nbsp;&nbsp;{{$member->statut}}</p>
                <p><span>Fonction du membre:</span>&nbsp;&nbsp;{{$member->mem_fonction}}</p>
            </div>
        </div>
    </div>
@endsection
