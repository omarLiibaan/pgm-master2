@extends('layouts.app')

@section('content')
    <a href="{{action('FonctionsController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;fonction</span></a>

    <div class="custom_table">
        <form action="searchfon" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content">
            <div class="ct_header cth4">
                <span>Nom de la fonctions</span>
                <span>Description</span>
                <span>Champs supplémentaires</span>
                <span>Actions</span>
            </div>

            @foreach($fonctions as $fonction)
                <div id="div_atag" data-href="{{action('FonctionsController@show', $fonction->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$fonction->fon_nom}}</span>
                    <span>{{$fonction->fon_description}}</span>
                    <span>{{$fonction->cha_titre}}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('FonctionsController@edit', $fonction->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer cette fonction ?', {{$fonction->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('FonctionsController@destroy', $fonction->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$fonction->id}}" type="submit"></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection


