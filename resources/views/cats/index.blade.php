@extends('layouts.app')

@section('content')
    <a href="{{action('CatsController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;catégorie</span></a>

    <div class="custom_table">
        <form action="searchcats" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content">
            <div class="ct_header cth4">
                <span>Nom de la catégorie</span>
                <span>Année de naissance</span>
                <span>Sexe</span>
                <span>Actions</span>
            </div>

            @foreach($cats as $cat)
                <div id="div_atag" data-href="{{action('CatsController@show', $cat->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$cat->cat_nom}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cat->cat_dateDebutEntre))->format('Y') }}</span>
                    <span>{{$cat->cat_sexe}}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('CatsController@edit', $cat->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer cette catégorie ?', {{$cat->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('CatsController@destroy', $cat->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$cat->id}}" type="submit"></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection


