@extends('layouts.app')

@section('content')
    <a href="{{action('MembersController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;membre</span></a>
    <a href="{{action('EmailController@create')}}" class="custom_add_btn" style="float: left;"><span><i class="fas fa-envelope"></i></span></a>
    <div class="custom_table" id="table">
        <form action="searchmem" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>
        <div class="ct_content">
            <div class="ct_header">
                <span>Case à cocher</span>
                <span>
               <form action="searchmen" method="get" onclick="">
                    <select class="styled-select" name="search">
                         <option>#</option>
                         <option value="asc"> A - Z</option>
                         <option>lala</option>
                         <option>lala</option>
                    </select>
                </form>
                </span>
                <span>Etat du compte</span>
                <span>Etat des finances</span>
                <span>Nom</span>
                <span>Prenom</span>
                <span>Date de naissance</span>
                <span>Numero de portable</span>
                <span>Adresse</span>
                <span>NPA</span>
                <span>Localite</span>
                <span>Actions</span>
            </div>

            @foreach($members as $member )
                <div id="div_atag" data-href="{{action('MembersController@show', $member->id)}}" onclick="" class="ct_body">
                    <span>{{ Form::checkbox('mem_id[]', $member->id) }}</span>
                    <span>{{$member->id}}</span>
                    <span>{{$member->mem_etatcompte}}</span>
                    <span>{{$member->mem_etatfinance}}</span>
                    <span>{{strtolower($member->mem_nom)}}</span>
                    <span>{{strtolower($member->mem_prenom)}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('d.m.Y') }}</span>
                    <span>{{$member->mem_numeroportable}}</span>
                    <span>{{$member->mem_adresse}}</span>
                    <span>{{$member->mem_npa}}</span>
                    <span>{{$member->mem_localite}}</span>
                    <span class="action_span">
                        <a title="show" class="ct_btn_show" href="{{action('MembersController@show', $member->id)}}"><i class="fas fa-eye"></i></a>
                        <a title="Modifier" class="ct_btn_edit" href="{{action('MembersController@edit', $member->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ce membre ?', {{$member->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('MembersController@destroy', $member->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$member->id}}" type="submit"></button>
                        </form>
                    </span>

                </div>
            @endforeach
        </div>
    </div>
@endsection
<style>
    .styled-select {
        width: 240px;
        height: 34px;
        overflow: hidden;
        background: url(new_arrow.png) no-repeat right #ddd;
        border: 1px solid #ccc;
    }

    .btn-primary-outline {
        background-color: transparent;
        border-color: #ccc;
    }
</style>
<script>
    $('select').change(function ()
    {
        $(this).closest('form').submit();
    });
</script>

