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
    <a href="{{action('TeamsController@create')}}" class="custom_add_btn"><span><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;cours&nbsp;(équipe)</span></a>

    <div class="custom_table">
        <form action="searchteam" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content ">
            <div class="ct_header cth4">
                <span>Nom de l'équipe</span>
                <span>Saison</span>
                <span>Catégorie</span>
                <span>Actions</span>
            </div>

            @foreach($teams as $team)
                <div data-href="{{action('TeamsController@show', $team->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$team->tea_nom}}</span>
                    <span>{{$team->sai_nomCategorie}}</span>
                    <span>{{$team->cat_nom}}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('TeamsController@edit', $team->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ce cours (équipe)?', {{$team->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('TeamsController@destroy', $team->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$team->id}}" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>


    <!-- <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Nom de l'équipe</th>
                <th>Saison</th>
                <th>Catégorie</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($teams as $team )
                <tr class="table-tr" >
                    <td class="click"><a href="{{action('TeamsController@show', $team->id)}}">{{$team->tea_nom}}</a></td></td>
                    <td class="click"><a href="{{action('TeamsController@show', $team->id)}}">{{$team->sai_nomCategorie}}</a></td>
                    <td class="click"><a href="{{action('TeamsController@show', $team->id)}}">{{$team->cat_nom  }}</a></td>
                    <td class="click"><a href="{{action('TeamsController@edit', $team->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>
                        <form action="{{action('TeamsController@destroy', $team->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-secondary" type="submit"><span class="glyphicon glyphicon-folder-close"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('TeamsController@create')}}" class="btn btn-primary">Ajouter un cours (équipe)</a>
    </div> -->
@endsection



