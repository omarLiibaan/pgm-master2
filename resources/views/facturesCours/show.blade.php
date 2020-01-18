

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
    <a href="{{action('FacturesCoursController@pdfCours', $cours->id)}}" class="custom_add_btn"><span><i class="fas fa-file-pdf"></i>&nbsp;&nbsp;Exporter toutes les factures</span></a>
    <div class="custom_table">
        <div class="search_wrapper">
            <input type="text" placeholder="Rechercher">
            <i class="fas fa-search"></i>
        </div>

        <div class="ct_content ">
            <div class="ct_header cth4">
                <span>Nom</span>
                <span>Prénom</span>
                <span>Date de naissance</span>
                <span>Sexe </span>
                <span>Pdf</span>
                <span>Actions</span>
            </div>

            @foreach($membres as $membre)
                <div data-href="{{action('FacturesCoursController@showFacture', $membre->id)}}" onclick="href(this)" class="ct_body ctb4">
                    <span>{{$membre->mem_nom}}</span>
                    <span>{{$membre->mem_prenom}}</span>
                    <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($membre->mem_datenaissance))->format('d.m.Y') }}</span>
                    <span>{{$membre->mem_sexe}}</span>
                    <span><a title="PDF" class="ct_btn_edit" href=""><i class="fas fa-file-pdf"></i></a></span>
                    <span class="action_span">
                        <a title="Modifier" class="ct_btn_edit" href="{{url('/membres/'.$membre->id.'/edit')}}"><i class="fas fa-pen"></i></a>
                        <a title="Suprimmer" onclick="confimationDelete('Confirmation','Êtes vous sûr de vouloir suprimmer ce cours ?', {{$membre->id}})" class="ct_btn_delete"><i class="fas fa-trash"></i></a>
                        <form action="" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button title="Suprimmer" class="ct_btn_delete" style="display:none" id="cbd_{{$membre->id}}" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection




