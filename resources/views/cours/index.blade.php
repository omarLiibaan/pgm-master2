<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 14:47
 */
?>
@extends('layouts.app')

@section('content')
    <a href="{{action('CoursController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;cours</span></a>

    <div class="custom_table">
        <form action="searchcours" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content ">
            <div class="ct_header cth4">
                <span>Nom</span>
                <span>Date de début</span>
                <span>Date de fin</span>
                <span>Actions</span>
            </div>

            @foreach($cours as $cour)
                <div data-href="{{action('CoursController@show', $cour->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$cour->cou_nom}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cour->cou_datedebut))->format('d.m.Y') }}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cour->cou_datefin))->format('d.m.Y') }}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('CoursController@edit', $cour->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ce cours ?', {{$cour->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('CoursController@destroy', $cour->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$cour->id}}" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection



