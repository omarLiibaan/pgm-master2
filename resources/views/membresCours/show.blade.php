
@extends('layouts.app')

@section('content')

    <div class="detail_box">
        @foreach($membres_cours as $membres_cour)
            <h3>{{$membres_cour->cou_nom}}</h3>
            <h4><span>Nombre de joueur:</span>&nbsp;&nbsp;{{$membres_cour->memId}}</h4>
        @endforeach
            <hr>
        @foreach($membres as $membre)
                <h4><span>Nom :</span>&nbsp;&nbsp;{{$membre->mem_prenom}} {{$membre->mem_nom}}</h4>
                <a href="{{action('MembresCoursController@edit', $membre->mc_cou_id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>
            @endforeach

        <hr>

    </div>


@endsection


