@extends('layouts.app')

@section('content')
    <a href="{{action('EventsController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;évenement</span></a>

    <div class="custom_table">
        <form action="searchevent" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content">
            <div class="ct_header">
                <span>Nom de l'event</span>
                <span>Date de début</span>
                <span>Date de fin</span>
                <span>Lieu</span>
                <span>Actions</span>
            </div>

            @foreach($events as $event)
                <div id="div_atag" data-href="{{action('EventsController@show', $event->id)}}" onclick="href(this)" class="ct_body">
                    <span>{{$event->eve_nom}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($event->eve_datedebut))->format('d.m.Y') }}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($event->eve_datefin))->format('d.m.Y') }}</span>
                    <span>{{$event->eve_lieu}}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('EventsController@edit', $event->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer cet évenement ?', {{$event->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('EventsController@destroy', $event->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$event->id}}" type="submit"></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection

