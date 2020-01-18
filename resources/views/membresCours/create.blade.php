@extends('layouts.app')

@section('content')

    {!! Form::open(['action' =>['MembresCoursController@store'], 'method' => 'POST', 'id' => 'form']) !!}
    @method('POST')
    @csrf
    <div class="custom_edit_form">
        <div class="form_full_width">
            <div class="leftside_form">
                <div class="form_wrapper">
                    <select class="form-control" name="cou_id">
                        @foreach($cours as $cou)
                            <option value="{{ $cou->id }}">{{ $cou->cou_nom}}</option>
                        @endforeach
                    </select>
                    {{Form::label('cou_id', 'Cours :')}}
                </div>
            </div>
        </div>
        <div class="custom_table">
            <div class="search_wrapper">
                <input type="text" placeholder="Rechercher">
                <i class="fas fa-search"></i>
            </div>

            <div class="ct_content">
                <div class="ct_header">
                    <span>Cocher</span>
                    <span>Nom</span>
                    <span>Prenom</span>
                    <span>Année de naissance</span>
                </div>

                @foreach($membres as $member )
                    <div id="div_atag"  class="ct_body">
                        <span>{{ Form::checkbox('mem_id[]', $member->id) }}</span>
                        <span>{{strtolower($member->mem_nom)}}</span>
                        <span>{{strtolower($member->mem_prenom)}}</span>
                        <span>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($member->mem_datenaissance))->format('Y') }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
        </div>
    </div>
    {!! Form::close() !!}

<p style="color:red">*En ajoutant un joueur dans un cours une facture sera directement créer</p>
@endsection
