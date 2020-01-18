@extends('layouts.app')

@section('content')
    <a href="{{action('SaisonsController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;saison</span></a>

    <div class="custom_table">
        <form action="searchsai" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content">
            <div class="ct_header cth4">
                <span>Nom de la saison</span>
                <span>Date de début</span>
                <span>Date de fin</span>
                <span>Actions</span>
            </div>

            @foreach($saisons as $saison)
                <div id="div_atag" data-href="{{action('SaisonsController@show', $saison->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$saison->sai_nomCategorie}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateDebut))->format('d.m.Y') }}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateFin))->format('d.m.Y') }}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('SaisonsController@edit', $saison->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer cette saison ?', {{$saison->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('SaisonsController@destroy', $saison->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$saison->id}}" type="submit"></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection

