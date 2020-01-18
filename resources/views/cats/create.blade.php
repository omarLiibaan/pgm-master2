@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['CatsController@store'], 'method' => 'POST']) !!}
    @method('POST')
    @csrf
        <div class="custom_edit_form">
            <div class="custom_edit_form no_border no_padding">
                <div class="leftside_form">
                    <div class="form_wrapper">
                        {{Form::text('cat_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                        {{Form::label('cat_nom', 'Nom de la catégorie :')}}
                    </div>
                </div>

                <div class="rightside_form">
                    <div class="form_wrapper">
                        <div class="row_checkbox">
                            <label for="Checkbox2" class="checkboxLabel"><input type="radio" id="Checkbox2" name="my_checkbox" value="Homme" checked>Homme</label>
                            <label for="Checkbox1" class="checkboxLabel"><input type="radio" id="Checkbox1" name="my_checkbox" value="Femme">Femme</label>
                            <label for="Checkbox3" class="checkboxLabel"><input type="radio" id="Checkbox3" name="my_checkbox" value="Mixte">Mixte</label>
                        </div>

                        {{Form::label('my_checkbox', 'Sexe :')}}
                    </div>
                </div>
            </div>

            <div class="custom_edit_form no_border no_padding">
                <div class="leftside_form">
                    <div class="form_wrapper">
                        {!! Form::date('cat_dateDebutEntre', '',  ['class' => 'form-control']) !!}
                        {{Form::label('cat_dateDebutEntre', 'de :')}}
                    </div>
                </div>
                <div class="rightside_form">
                    <div class="form_wrapper">
                        {!! Form::date('cat_dateFinEntre', '',  ['class' => 'form-control']) !!}
                        {{Form::label('cat_dateFinEntre', 'à :')}}
                    </div>
                </div>

            </div>

            <div class="form_wrapper full_width">
                {{Form::textarea('cat_description', '',  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
                {{Form::label('cat_description', 'Description :')}}
            </div>

            <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
            </div>
        </div>
    {!! Form::close() !!}
@endsection
