@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['CatsController@update', $cats->id], 'method' => 'POST']) !!}
    @method('PUT')
    @csrf
        <div class="custom_edit_form">
            <div class="custom_edit_form no_border no_padding">
                <div class="leftside_form">
                    <div class="form_wrapper">
                        {{Form::text('cat_nom', $cats->cat_nom, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                        {{Form::label('cat_nom', 'Nom de la catégorie :')}}
                    </div>
                </div>
                
                <div class="rightside_form">
                @if($cats->cat_sexe === 'Homme')
                    <div class="form_wrapper">
                        <div class="row_checkbox">
                            <label for="Checkbox2" class="checkboxLabel"><input type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme" checked>Homme</label>
                            <label for="Checkbox1" class="checkboxLabel"><input type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme">Femme</label>
                            <label for="Checkbox3" class="checkboxLabel"><input type="radio" id="inlineCheckbox3" name="my_checkbox" value="Mixte">Mixte</label>
                        </div>
                        {{Form::label('my_checkbox', 'Sexe :')}}
                    </div>
                @elseif($cats->cat_sexe === 'Femme')
                    <div class="form_wrapper">
                        <div class="row_checkbox">
                            <label for="Checkbox2" class="checkboxLabel"><input type="radio" id="Checkbox2" name="my_checkbox" value="Homme">Homme</label>
                            <label for="Checkbox1" class="checkboxLabel"><input type="radio" id="Checkbox1" name="my_checkbox" value="Femme" checked>Femme</label>
                            <label for="Checkbox3" class="checkboxLabel"><input type="radio" id="Checkbox3" name="my_checkbox" value="Mixte">Mixte</label>
                        </div>
                        {{Form::label('my_checkbox', 'Sexe :')}}
                    </div>
                @else
                    <div class="form_wrapper">
                        <div class="row_checkbox">
                            <label for="Checkbox2" class="checkboxLabel"><input type="radio" id="Checkbox2" name="my_checkbox" value="Homme">Homme</label>
                            <label for="Checkbox1" class="checkboxLabel"><input type="radio" id="Checkbox1" name="my_checkbox" value="Femme">Femme</label>
                            <label for="Checkbox3" class="checkboxLabel"><input type="radio" id="Checkbox3" name="my_checkbox" value="Mixte" checked>Mixte</label>
                        </div>
                        {{Form::label('my_checkbox', 'Sexe :')}}
                    </div>
                @endif
                </div>
            </div>

            <div class="custom_edit_form no_border no_padding">
                <div class="leftside_form">
                    <div class="form_wrapper">
                        {!! Form::date('cat_dateDebutEntre', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateDebutEntre))->format('Y-m-d'),  ['class' => 'form-control']) !!}
                        {{Form::label('cat_dateDebutEntre', 'Né entre le  :')}}
                    </div>
                </div>
                
                <div class="rightside_form">
                    <div class="form_wrapper">
                        {!! Form::date('cat_dateFinEntre', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateFinEntre))->format('Y-m-d'),  ['class' => 'form-control']) !!}
                        {{Form::label('cat_dateFinEntre', 'Et le  :')}}
                    </div>
                </div>
            </div>

            <div class="form_wrapper full_width">
                {{Form::textarea('cat_description', $cats->cat_description,  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
                {{Form::label('cat_description', 'Description :')}}
            </div>

            <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
            </div>
        </div>
    
<!-- 


    @if($cats->cat_sexe === 'Homme')
        <div class="col-xs-6 form-group">
            {{Form::label('my_checkbox', 'Sexe :')}}
            <p></p>
            <input type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme"> Femme
            <input type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme" checked> Homme
            <input type="radio" id="inlineCheckbox3" name="my_checkbox" value="Mixte"> Mixte
        </div>
    @elseif($cats->cat_sexe === 'Femme')
        <div class="col-xs-6 form-group">
            {{Form::label('my_checkbox', 'Sexe :')}}
            <p></p>
            <input type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme" checked> Femme
            <input type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme" > Homme
            <input type="radio" id="inlineCheckbox3" name="my_checkbox" value="Mixte"> Mixte
        </div>
    @else
        <div class="col-xs-6 form-group">
            {{Form::label('my_checkbox', 'Sexe :')}}
            <p></p>
            <input type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme" > Femme
            <input type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme" > Homme
            <input type="radio" id="inlineCheckbox3" name="my_checkbox" value="Mixte" checked> Mixte
        </div>
    @endif
    <div class="col-xs-12 form-group">
    </div>
    <div class="col-xs-6 form-group">
        {{Form::label('cat_nom', 'Nom de la catégorie :')}}
        {{Form::text('cat_nom', $cats->cat_nom, ['class' => 'form-control', 'placeholder' => 'Nom'])}}
    </div>
    <div class="col-xs-6 form-group">
        {{Form::label('cat_description', 'Description :')}}
        {{Form::textarea('cat_description', $cats->cat_description,  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
    </div>
    <div class="col-xs-6 form-group">
        {{Form::label('cat_dateDebutEntre', 'Né entre le  :')}}
        {!! Form::date('cat_dateDebutEntre', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateDebutEntre))->format('Y-m-d'),  ['class' => 'form-control']) !!}

    </div>
    <div class="col-xs-6 form-group">
        {{Form::label('cat_dateFinEntre', 'Et le  :')}}
        {!! Form::date('cat_dateFinEntre', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cats->cat_dateFinEntre))->format('Y-m-d'),  ['class' => 'form-control']) !!}

    </div>

    <div class="col-xs-12 form-group">
        <p></p>
    </div>
    <div class="col-xs-6 form-group">
        {{Form::submit('Modifier', ['class' => 'btn btn-primary btn-block'])}}
    </div> -->
    
    {!! Form::close() !!}
@endsection
