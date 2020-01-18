@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['SaisonsController@update', $saison->id], 'method' => 'POST']) !!}
    @method('PUT')
    @csrf
    <div class="custom_edit_form">
        <div class="form_wrapper full_width">
            {{Form::text('sai_nomCategorie', $saison->sai_nomCategorie, ['class' => 'form-control', 'placeholder' => 'Nom de la saison'])}}
            {{Form::label('sai_nomCategorie', 'Nom de la saison:')}}
        </div>

        <div class="custom_edit_form no_border no_padding">
            <div class="leftside_form">
                <div class="form_wrapper">
                    {!! Form::date('sai_dateDebut',Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateDebut))->format('Y-m-d'),  ['class' => 'form-control']) !!}
                    {{Form::label('sai_dateDebut', 'Date de début :')}}
                </div>
            </div>
            
            <div class="rightside_form">
                <div class="form_wrapper">
                    {!! Form::date('sai_dateFin', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($saison->sai_dateFin))->format('Y-m-d'),  ['class' => 'form-control']) !!}
                    {{Form::label('sai_dateFin', 'Date de fin :')}}
                </div>
            </div>
        </div>

        <div class="form_wrapper_wide">
        {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
