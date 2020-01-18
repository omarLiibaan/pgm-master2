@extends('layouts.app')

@section('content')
    <a href="{{action('FonctionsController@edit', $fonctions->id)}}"  class="custom_edit_btn"><i class="fas fa-pen"></i>&nbsp;&nbsp;Mettre&nbsp;à&nbsp;jour</a></li>

    <div class="detail_box">
        <h3>{{$fonctions->fon_nom}}</h3>
        <h4>{{$fonctions->fon_description}}</h4>
        <hr>
        <div class="detail_row">
            <div class="detail_col_full">
                <h3>Champs</h3>
                @foreach($champs as $champ )
                    <p>{{$champ->cha_titre}}</p>
                    <p><span>Type:</span>&nbsp;&nbsp;{{$champ->cha_type}}</p>

                    @if($champ->cha_type === 'Liste déroulante')
                        <p><span>Valeur:</span>&nbsp;&nbsp;{{$champ->cha_val}}</p>
                        <p> {{$champ->cha_val2}}</p>
                        <p>{{$champ->cha_val3}}</p>
                        <p>{{$champ->cha_val4}}</p>
                        <p>{{$champ->cha_val5}}</p>
                        <p>{{$champ->cha_val6}}</p>
                    @else
                        <hr>
                        <p><span>Format:</span>&nbsp;&nbsp;{{$champ->cha_format}}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

