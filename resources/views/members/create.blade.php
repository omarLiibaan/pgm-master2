@extends('layouts.app')

@section('content')
        {!! Form::open(['action' =>['MembersController@store'], 'method' => 'POST']) !!}
        @method('POST')
        @csrf
        <div class="custom_edit_form">
            <div class="form_wrapper_wide_top">
                {{Form::label('mycheckboxMajeur', 'Est-il majeur ? :', ['class' => 'custom_label'])}}
                <br>
                <label class="sec_label" for="idOui"><input id="idOui" type="radio" id="inlineCheckbox11" name="mycheckboxMajeur" value="Oui"> Oui</label>
                <label class="sec_label" for="idNon"><input id="idNon" type="radio" id="inlineCheckbox22" name="mycheckboxMajeur" value="Non"> Non</label>
            </div>
            <div class="form_wrapper_wide_top">
                {{Form::label('my_checkbox', 'Choisir :', ['class' => 'custom_label'])}}
                <br>
                <label class="sec_label" for="idFemme"><input id="idFemme" type="radio" id="inlineCheckbox1" name="my_checkbox" value="Femme"> Femme</label>
                <label class="sec_label" for="idHomme"><input id="idHomme" type="radio" id="inlineCheckbox2" name="my_checkbox" value="Homme"> Homme</label>
            </div>
            <div class="leftside_form">

                <div class="form_wrapper">
                    {{Form::text('mem_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                    {{Form::label('mem_nom', 'Nom :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_prenom', '',  ['class' => 'form-control', 'placeholder' => 'Prénom'])}}
                    {{Form::label('mem_prenom', 'Prénom :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::date('mem_datenaissance', '',  ['class' => 'form-control']) !!}
                    {{Form::label('mem_datenaissance', 'Date de naissance :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_numeroportable', '',  ['class' => 'form-control', 'placeholder' => 'Numéro de portable'])}}
                    {{Form::label('mem_numeroportable', 'Numéro de portable :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_email', '',  ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
                    {{Form::label('mem_email', 'E-mail :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_adresse', '',  ['class' => 'form-control', 'placeholder' => 'Adresse'])}}
                    {{Form::label('mem_adresse', 'Adresse :')}}
                </div>
                <div id="mineur" style="display: none">
                    <div class="form_wrapper_wide_top">
                        {{Form::label('mycheckboxEnsemble', 'Prendre les coordonnées des deux parents ? :', ['class' => 'custom_label'])}}
                        <br>
                        <label class="sec_label" for="idOuiCo"><input id="idOuiCo" type="radio" id="inlineCheckbox11" name="mycheckboxEnsemble" value="Oui"> Oui</label>
                        <label class="sec_label" for="idNonCo"><input id="idNonCo" type="radio" id="inlineCheckbox22" name="mycheckboxEnsemble" value="Non"> Non</label>
                    </div>

                    <div class="form_wrapper">
                        {{Form::text('mem_nomparent', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                        {{Form::label('mem_nomparent', 'Nom du parent responsable :')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::text('mem_prenomparent', '',  ['class' => 'form-control', 'placeholder' => 'Prénom'])}}
                        {{Form::label('mem_prenomparent', 'Prénom du parent responsable:')}}
                    </div>
                </div>
                <div id="coordonnee" style="display: none">
                    <div class="form_wrapper">
                        {{Form::text('mem_nomparent2', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
                        {{Form::label('mem_nomparent2', 'Nom du parent responsable 2:')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::text('mem_prenomparent2', '',  ['class' => 'form-control', 'placeholder' => 'Prénom'])}}
                        {{Form::label('mem_prenomparent2', 'Prénom du parent responsable 2:')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::number('mem_npa2', '',  ['class' => 'form-control', 'placeholder' => 'NPA'])}}
                        {{Form::label('mem_npa2', 'NPA 2:')}}
                    </div>
                </div>
                <div class="form_wrapper">
                        <select class="form-control" name="mem_fonction">
                            @foreach($fonctions as $fonction)
                                <option value="{{ $fonction }}">{{ $fonction}}</option>
                            @endforeach
                        </select>
                        {{Form::label('mem_fonction', 'Nom de la fonction :')}}

                </div>
            </div>


            <div class="rightside_form">
                <div class="form_wrapper">
                    {{Form::number('mem_npa', '',  ['class' => 'form-control', 'placeholder' => 'NPA'])}}
                    {{Form::label('mem_npa', 'NPA :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_localite', '',  ['class' => 'form-control', 'placeholder' => 'Localité'])}}
                    {{Form::label('mem_localite', 'Localité :')}}
                </div>
                <div class="form_wrapper">
                    <select class="form-control" name="mem_pays">
                        @foreach($pays as $paysNom)
                            <option value="{{ $paysNom }}">{{ $paysNom}}</option>
                        @endforeach
                    </select>
                    {{Form::label('mem_pays', 'Pays :')}}
                </div>
                <div class="form_wrapper">
                    {{Form::text('mem_numlicense', '',  ['class' => 'form-control', 'placeholder' => 'N° de Licence'])}}
                    {{Form::label('mem_numlicense', 'N° de licence :')}}
                </div>
                <div class="form_wrapper">
                    {!! Form::date('mem_entredate', Carbon\Carbon::now()->format('d.m.Y'),  ['class' => 'form-control']) !!}
                    {{Form::label('mem_entredate', 'Date d\'entrée :')}}
                </div>
                <div class="form_wrapper">
                    <select class="form-control" name="statut">
                        @foreach($statut as $stat)
                            <option value="{{ $stat }}" >{{ $stat}}</option>
                        @endforeach
                    </select>
                    {{Form::label('statut', 'Statut du membre :')}}
                </div>
                <div id="mineur2" style="display: none">
                    <div class="form_wrapper"><br><br></div>
                    <div class="form_wrapper">
                        {{Form::text('mem_numparent', '', ['class' => 'form-control', 'placeholder' => 'numéro professionnel'])}}
                        {{Form::label('mem_numparent', 'Numéro professionnel :')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::text('mem_numfixe', '',  ['class' => 'form-control', 'placeholder' => 'numéro privé'])}}
                        {{Form::label('mem_numfixe', 'Numéro privé:')}}
                    </div>
                </div>
                <div id="coordonnee2" style="display: none">
                    <div class="form_wrapper">
                        {{Form::text('mem_numparent2', '', ['class' => 'form-control', 'placeholder' => 'numéro professionnel'])}}
                        {{Form::label('mem_numparent2', 'Numéro professionnel 2:')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::text('mem_numfixe2', '',  ['class' => 'form-control', 'placeholder' => 'numéro privé'])}}
                        {{Form::label('mem_numfixe2', 'Numéro privé 2:')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::text('mem_adresse2', '',  ['class' => 'form-control', 'placeholder' => 'Adresse'])}}
                        {{Form::label('mem_adresse2', 'Adresse 2:')}}
                    </div>
                    <div class="form_wrapper">
                        {{Form::text('mem_localite2', '',  ['class' => 'form-control', 'placeholder' => 'Localité'])}}
                        {{Form::label('mem_localite2', 'Localité 2:')}}
                    </div>
                </div>
            </div>


            <div class="form_wrapper_wide">
            {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_ajouter_donnee', 'type' => 'submit']) }}
            </div>
        </div>

    {!! Form::close() !!}
@endsection
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">



    jQuery(document).ready(function(){
        $('#idOui').change(function () {
            if (!this.checked)
            //  ^
                console.log('non');
            else{
                $("#mineur").hide();
                $("#mineur2").hide();
            }

        });
        $('#idNon').change(function () {
            if (this.checked) {//  ^
                $("#mineur").show();
                $("#mineur2").show();
            }
            else
                console.log('oui');
        });

        $('#idNonCo').change(function () {
            if (!this.checked)
            //  ^
                console.log(' non');
            else{
                $("#coordonnee").hide();
                $("#coordonnee2").hide();
            }

        });
        $('#idOuiCo').change(function () {
            if (this.checked) {//  ^
                $("#coordonnee").show();
                $("#coordonnee2").show();
            }
            else
                console.log(' oui');
        });


        idNonCo
    });
</script>
