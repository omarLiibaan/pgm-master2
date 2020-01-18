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
    <div class="custom_table">
        <div class="search_wrapper">
            <input type="text" placeholder="Rechercher">
            <i class="fas fa-search"></i>
        </div>

        <div class="ct_content ">
            <div class="ct_header cth4">
                <span>Nom</span>
                <span>Date de début</span>
                <span>Date de fin</span>
                <span>Cotisation </span>
                <span>Actions</span>
            </div>

            @foreach($cours as $cour)
                <div data-href="{{action('FacturesCoursController@show', $cour->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$cour->cou_nom}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cour->cou_datedebut))->format('d.m.Y') }}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cour->cou_datefin))->format('d.m.Y') }}</span>
                    <span>450 CHF</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('FacturesCoursController@edit', $cour->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ce cours ?',{{$cour->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('FacturesCoursController@destroy', $cour->id)}}" method="post">
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



