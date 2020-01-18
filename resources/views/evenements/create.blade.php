@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['EventsController@store'], 'method' => 'POST']) !!}
    @method('POST')
    @csrf
    <div class="custom_edit_form">
        <div class="leftside_form">
            <h3>Évenements</h3>
            <div class="form_wrapper">
                {{Form::text('eve_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                {{Form::label('eve_nom', 'Nom de l\'évenements :')}}
            </div>
            <div class="form_wrapper">
                {{Form::text('eve_lieu', '',  ['class' => 'form-control', 'placeholder' => 'Lieu'])}}
                {{Form::label('eve_lieu', 'Lieu :')}}
            </div>
            <div class="form_wrapper">
                {!! Form::date('eve_datedebut', '',  ['class' => 'form-control']) !!}
                {{Form::label('eve_datedebut', 'Date de début :')}}
            </div>
            <div class="form_wrapper">
                {!! Form::date('eve_datefin', '',  ['class' => 'form-control']) !!}
                {{Form::label('eve_datefin', 'Date de fin :')}}
            </div>
            <div class="form_wrapper">
                {!! Form::time('eve_horairedebut', '',  ['class' => 'form-control']) !!}
                {{Form::label('eve_horairedebut', 'Horaires début :')}}
            </div>
            <div class="form_wrapper">
                {!! Form::time('eve_horairefin', '',  ['class' => 'form-control']) !!}
                {{Form::label('eve_horairefin', 'Horaires fin :')}}
            </div>
        </div>

        <div class="rightside_form">
            <h3>Cotisation</h3>
            <div class="form_wrapper">
                {{Form::text('cot_somme', '', ['class' => 'form-control', 'placeholder' => 'Somme'])}}
                {{Form::label('cot_somme', 'Somme :')}}
            </div>
            <div class="form_wrapper">
                {{Form::number('cot_nbPaiement', '', ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
                {{Form::label('cot_nbPaiement', 'Paiement en :')}}
            </div>
            <div class="form_wrapper">
                {!! Form::number('cot_echeance', '',  ['class' => 'form-control'])!!}
                {{Form::label('cot_echeance', 'Echéance de paiement :')}}
            </div>
        </div>

        <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_ajouter_donnee', 'type' => 'submit']) }}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
