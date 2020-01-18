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
        <form action="searchcours" method="get" onkeyup="">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher" name="search" id="search">
                <i class="fas fa-search"></i>
            </div>
        </form>

        <div class="ct_content ">
            <div class="ct_header cth4">
                <span>Titre</span>
                <span>Date</span>
                <span>Email</span>
                <span>Actions</span>
            </div>

            @foreach($emails as $email)
                <div data-href="{{action('EmailController@show', $email->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$email->ema_titre}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($email->ema_dateJour))->format('d.m.Y') }}</span>
                    <span>{{$email->ema_mail}}</span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{action('EmailController@edit', $email->id)}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ce cours ?', {{$email->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="{{action('EmailController@destroy', $email->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$email->id}}" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection



