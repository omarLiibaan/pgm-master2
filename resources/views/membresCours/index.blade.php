@extends('layouts.app')

@section('content')
    <a href="{{action('MembresCoursController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;joueur</span></a>

    <div class="custom_table">
        <div class="search_wrapper">
            <input type="text" placeholder="Rechercher">
            <i class="fas fa-search"></i>
        </div>

        <div class="ct_content">
            <div class="ct_header">
                <span>Nom du cours</span>
                <span>Nombres de joueur</span>
                <span>Actions</span>
            </div>
            @foreach($membres_cours as $membres_cour )

                <div id="div_atag" data-href="{{action('MembresCoursController@show', $membres_cour->mc_cou_id)}}" onclick="href(this)" class="ct_body">
                    <span>{{strtolower($membres_cour->cou_nom)}}</span>
                    <span>{{strtolower($membres_cour->memId)}} Joueurs</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('MembresCoursController@edit', $membres_cour->mc_cou_id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ?', {{$membres_cour->mc_cou_id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('MembresCoursController@destroy', $membres_cour->mc_cou_id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$membres_cour->mc_cou_id}}" type="submit"></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection



