@extends('layouts.app')

@section('content')
    <a href="{{action('CatsController@edit', $cats->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

    <div class="detail_box">
        <h3>{{$cats->cat_nom}}</h3>
        <h4><span>Année&nbsp;de&nbsp;naissance:</span>&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateDebutEntre))->format('Y') }}&nbsp;</h4>
        <h4><span>Sexe:</span>&nbsp;&nbsp;{{$cats->cat_sexe}}</h4>
        <h4><span>Description:</span>&nbsp;&nbsp;{{$cats->cat_description}}</h4>
    </div>
@endsection

