@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['MembersController@update', $member->id], 'method' => 'POST']) !!}
    @method('PUT')
    @csrf
        <div class="custom_edit_form">
            <div class="leftside_form">
                <div class="form_wrapper">
                    {{Form::text('mem_nom', $member->mem_nom, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                    {{Form::label('mem_nom', 'Nom :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_prenom', $member->mem_prenom, ['class' => 'form-control', 'placeholder' => 'Prénom'])}}
                    {{Form::label('mem_prenom', 'Prénom :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::date('mem_datenaissance',Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('Y-m-d'), ['class' => 'form-control']) !!}
                    {{Form::label('mem_datenaissance', 'Date de naissance :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_numeroportable', $member->mem_numeroportable, ['class' => 'form-control', 'placeholder' => 'Numéro de portable'])}}
                    {{Form::label('mem_numeroportable', 'Numéro de portable :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_email', $member->mem_email, ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
                    {{Form::label('mem_email', 'E-mail :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_adresse', $member->mem_adresse, ['class' => 'form-control', 'placeholder' => 'Adresse'])}}
                    {{Form::label('mem_adresse', 'Adresse :')}}
                </div>
                <div class="form_wrapper">
                    <select class="form-control" name="mem_fonction">
                        @foreach($fonctions as $fonction)
                            <option value="{{ $member->mem_fonction }}"  {{$member->mem_fonction == $fonction  ? 'selected' : '' }}>{{ $fonction}}</option>
                        @endforeach
                    </select>
                    {{Form::label('mem_fonction', 'Nom de la fonction :')}}

                </div>
            </div>


            <div class="rightside_form">
                <div class="form_wrapper">
                    {{Form::number('mem_npa', $member->mem_npa, ['class' => 'form-control', 'placeholder' => 'NPA'])}}
                    {{Form::label('mem_npa', 'NPA :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_localite', $member->mem_localite, ['class' => 'form-control', 'placeholder' => 'Localité'])}}
                    {{Form::label('mem_localite', 'Localité :')}}
                </div>
                <div class="form_wrapper">
                    <select class="form-control" name="mem_pays">
                        @foreach($pays as $paysNom)
                            <option value="{{ $member->mem_pays }}"  {{$member->mem_pays == $paysNom  ? 'selected' : '' }}>{{ $paysNom}}</option>
                        @endforeach
                    </select>
                    {{Form::label('mem_pays', 'Pays :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_numlicense', $member->mem_numlicense, ['class' => 'form-control', 'placeholder' => 'N° de Licence'])}}
                    {{Form::label('mem_numlicense', 'N° de licence :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::date('mem_entredate',Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_entredate))->format('Y-m-d'), ['class' => 'form-control']) !!}
                    {{Form::label('mem_entredate', 'Date d\'entrée :')}}
                </div>
                <div class="form_wrapper">
                    <select class="form-control" name="statut">
                        @foreach($statut as $stat)
                            <option value="{{ $member->statut }}"  {{$member->statut == $stat  ? 'selected' : '' }}>{{ $stat}}</option>
                        @endforeach
                    </select>
                    {{Form::label('statut', 'Statut du membre :')}}
                </div>

            </div>


            <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
            </div>
        </div>

    {!! Form::close() !!}
@endsection
