@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['EmailController@store'], 'method' => 'POST']) !!}
    @method('POST')
    @csrf
    <div class="custom_edit_form">
        <div class="custom_edit_form no_border no_padding">
            <div class="leftside_form">
                <div class="form_wrapper">
                    {{Form::text('ema_titre', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
                    {{Form::label('ema_titre', 'Titre:')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('ema_lieu', '', ['class' => 'form-control', 'placeholder' => 'Lieu'])}}
                    {{Form::label('ema_lieu', 'Lieu:')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('ema_intro', '', ['class' => 'form-control', 'placeholder' => 'Introduction'])}}
                    {{Form::label('ema_intro', 'Introduction:')}}
                </div>
            </div>

            <div class="rightside_form">
                <div class="form_wrapper">
                    {{Form::text('ema_descriptif', '', ['class' => 'form-control', 'placeholder' => 'Descriptif'])}}
                    {{Form::label('ema_descriptif', 'Descriptif:')}}
                </div>
                <div class="form_wrapper">
                    {{Form::date('ema_dateJour', '', ['class' => 'form-control'])}}
                    {{Form::label('ema_dateJour', 'Date du jour:')}}
                </div>
                <div class="form_wrapper">
                    {{Form::label('ema_membres', 'Destinataires:')}}
                </div>
                @foreach($membres as $member )
                    {{ Form::checkbox('mem_id[]', $member->id)}} {{($member->mem_email)}}<br>
                @endforeach
            </div>
            <div class="form_wrapper full_width">
                {{Form::textarea('ema_p', '', ['class' => 'form-control', 'placeholder' => 'Paragraphes'])}}
                {{Form::label('ema_p', 'Premier paragraphes:')}}
            </div>
            <div class="form_wrapper full_width">
                {{Form::textarea('ema_p2', '', ['class' => 'form-control', 'placeholder' => 'Paragraphes'])}}
                {{Form::label('ema_p', 'Deuxième paragraphes:')}}
            </div>
            <div class="form_wrapper full_width">
                {{Form::text('ema_salutations', '', ['class' => 'form-control', 'placeholder' => 'Salutations'])}}
                {{Form::label('ema_salutations', 'Formules de salutations:')}}
            </div>
        </div>

        <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Envoyer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
