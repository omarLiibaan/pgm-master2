@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['EventsController@update', $events->id], 'method' => 'POST', 'id' => 'form']) !!}
    @method('PUT')
    @csrf
        <div class="custom_edit_form">
            <div class="leftside_form"> 
                <h3>Évenements</h3>
                <div class="form_wrapper">
                    {{Form::text('eve_nom', $events->eve_nom, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                    {{Form::label('eve_nom', 'Nom de l\'évenements :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('eve_lieu', $events->eve_lieu,  ['class' => 'form-control', 'placeholder' => 'Lieu'])}}
                    {{Form::label('eve_lieu', 'Lieu :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::date('eve_datedebut', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($events->eve_datedebut))->format('Y-m-d'),  ['class' => 'form-control']) !!}
                    {{Form::label('eve_datedebut', 'Date de début :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::date('eve_datefin', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($events->eve_datefin))->format('Y-m-d'),  ['class' => 'form-control']) !!}
                    {{Form::label('eve_datefin', 'Date de fin :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::time('eve_horairedebut', $events->eve_horairedebut,  ['class' => 'form-control']) !!}
                    {{Form::label('eve_horairedebut', 'Horaires début :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::time('eve_horairefin', $events->eve_horairefin,  ['class' => 'form-control']) !!}
                    {{Form::label('eve_horairefin', 'Horaires fin :')}}
                </div>
            </div>

            <div class="rightside_form">
                <h3>Cotisation</h3>
                <div class="form_wrapper">
                    @foreach($cotis as $coti )
                        {{Form::text('cot_somme',$coti->cot_somme, ['class' => 'form-control', 'placeholder' => 'Somme'])}}
                        {{Form::label('cot_somme', 'Somme :')}}
                    @endforeach
                </div>
                <div class="form_wrapper">
                    @foreach($cotis as $coti )
                        {{Form::number('cot_nbPaiement', $coti->cot_nbPaiement, ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
                        {{Form::label('cot_nbPaiement', 'Paiement en :')}}
                    @endforeach
                </div>
                <div class="form_wrapper">
                    @foreach($cotis as $coti )
                        {!! Form::date('cot_echeance', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('Y-m-d'),  ['class' => 'form-control'])!!}
                        {{Form::label('cot_echeance', 'Echéance de paiement :')}}
                    @endforeach
                </div>
            </div>

            <div class="form_wrapper_wide">
                {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_ajouter_donnee', 'type' => 'submit']) }}
            </div>

        </div>
    {!! Form::close() !!}
@endsection
