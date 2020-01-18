@extends('layouts.app')

@section('content')

    {!! Form::open(['action' =>['TeamsController@store'], 'method' => 'POST', 'id' => 'form']) !!}
    @method('POST')
    @csrf
        <div class="custom_edit_form">
            <div class="form_full_width">
                <div class="leftside_form">
                    <div class="form_wrapper">
                        {{Form::text('tea_nom', '', ['class' => 'form-control', 'placeholder' => 'Nom du cours'])}}
                        {{Form::label('tea_nom', 'Nom du cours (Équipe) :')}}
                    </div>

                    <div class="form_wrapper">
                        <select class="form-control" name="tea_sai_id">
                            @foreach($saisons as $saison)
                                <option value="{{ $saison->id }}" disabled selected>{{ $saison->sai_nomCategorie}}</option>
                            @endforeach
                        </select>
                        {{Form::label('tea_sai_id', 'Saisons :')}}
                    </div>

                    <div class="form_wrapper">
                        {{Form::number('cot_nbPaiement', '', ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
                        {{Form::label('cot_nbPaiement', 'Paiement en :')}}
                    </div>
                    <div class="form_wrapper">
                        <div class="row_checkbox">
                            <label for="Checkbox2" class="checkboxLabel"><input type="radio" id="Checkbox2" name="my_checkbox" value="Homme" checked>Homme</label>
                            <label for="Checkbox1" class="checkboxLabel"><input type="radio" id="Checkbox1" name="my_checkbox" value="Femme">Femme</label>
                            <label for="Checkbox3" class="checkboxLabel"><input type="radio" id="Checkbox3" name="my_checkbox" value="Mixte">Mixte</label>
                        </div>

                        {{Form::label('my_checkbox', 'Sexe :')}}
                    </div>
                </div>

                <div class="rightside_form">
                    <div class="form_wrapper">
                        {{Form::text('cot_somme', '', ['class' => 'form-control', 'placeholder' => 'Somme'])}}
                        {{Form::label('cot_somme', 'Somme :')}}
                    </div>

                    <div class="form_wrapper">
                        <select class="form-control" name="tea_cat_id">
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat_nom}}</option>
                            @endforeach
                        </select>
                        {{Form::label('tea_cat_id', 'Catégorie :')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::number('cot_echeance', '',  ['class' => 'form-control'])!!}
                        {{Form::label('cot_echeance', 'Echéance de paiement :')}}
                    </div>

                </div>
            </div>

            <!-- ***** -->
            <div id="parentDivId" class="form_full_width no_border">
                <div id="quiz" class="dividedside_from">
                    <p>Séance n° 1</p>
                    <div class="form_wrapper">
                        <select class="form-control" name="sea_jour">
                            @foreach($jours as $day)
                                <option value="{{ $day }}">{{ $day}}</option>
                            @endforeach
                        </select>
                        {{Form::label('sea_jour', 'Jours :')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::time('sea_heureDebut',null, ['class' => 'form-control']) !!}
                        {{Form::label('sea_heureDebut', 'Heures de début:')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::time('sea_heureFin',null, ['class' => 'form-control']) !!}
                        {{Form::label('sea_heureFin', 'Heures de fin :')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::text('sea_lieu','', ['class' => 'form-control']) !!}
                        {{Form::label('sea_lieu', 'Lieu :')}}
                    </div>
                </div>
                <div id="quiz" class="dividedside_from">
                    <p>Séance n° 2</p>
                    <div class="form_wrapper">
                        <select class="form-control" name="sea_jour2">
                            @foreach($jours as $day)
                                <option value="{{ $day }}">{{ $day}}</option>
                            @endforeach
                        </select>
                        {{Form::label('sea_jour2', 'Jours :')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::time('sea_heureDebut2',null, ['class' => 'form-control']) !!}
                        {{Form::label('sea_heureDebut2', 'Heures de début:')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::time('sea_heureFin2',null, ['class' => 'form-control']) !!}
                        {{Form::label('sea_heureFin2', 'Heures de fin :')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::text('sea_lieu2','', ['class' => 'form-control']) !!}
                        {{Form::label('sea_lieu2', 'Lieu :')}}
                    </div>
                </div>
            </div>

            <div class="form_wrapper_wide">
                <button class="btn_ajouter_seance" type="button" onclick="addSeance()"/><i class="fas fa-plus"></i>&nbsp;&nbsp;Ajouter une séance</button>
                {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
            </div>
        </div>
    {!! Form::close() !!}


@endsection
<script>
    var limit = 4; // Max questions
    var count = 2; // There are 4 questions already

    function addSeance()
    {
        // Get the quiz form element
        var quiz = document.getElementById('quiz');
        var form = document.getElementById('form');
        var parentwrapper = document.getElementById('parentDivId');


        // Good to do error checking, make sure we managed to get something
        if (quiz)
        {
            if (count < limit)
            {
                // Create a new <p> element
                var newP = document.createElement('p');
                var newDiv = document.createElement('div');
                var wrapper1 = document.createElement('div');
                var wrapper2 = document.createElement('div');
                var wrapper3 = document.createElement('div');
                var wrapper4 = document.createElement('div');
                var jours = document.createElement("LABEL");
                var heureDebut = document.createElement("LABEL");
                var heureFin = document.createElement("LABEL");
                var lieu = document.createElement("LABEL");
                var newP2 = document.createElement('p');
                var newP3 = document.createElement('p');
                var newP4 = document.createElement('p');

                wrapper1.className = "form_wrapper";
                wrapper2.className = "form_wrapper";
                wrapper3.className = "form_wrapper";
                wrapper4.className = "form_wrapper";
                newDiv.className = "dividedside_from";
                newP.innerHTML = 'Séance n° ' + (count + 1);
                jours.innerHTML = 'Jours :';
                heureDebut.innerHTML = 'Heure de début :';
                heureFin.innerHTML = 'Heure de fin :';
                lieu.innerHTML = 'Lieu : '

                // Create the new text box
                var newInput = document.createElement("select");
                var lundi = document.createElement("option");
                var mardi = document.createElement("option");
                var mercredi = document.createElement("option");
                var jeudi = document.createElement("option");
                var vendredi = document.createElement("option");
                var samedi = document.createElement("option");
                var dimanche = document.createElement("option");

                lundi.value = "Lundi";
                lundi.text = "Lundi"
                lundi.selected = true;
                mardi.value = "Mardi";
                mardi.text = "Mardi"
                mercredi.value = "Mercredi";
                mercredi.text = "Mercredi"
                jeudi.value = "Jeudi";
                jeudi.text = "Jeudi"
                vendredi.value = "Vendredi";
                vendredi.text = "Vendredi"
                samedi.value = "Samedi";
                samedi.text = "Samedi"
                dimanche.value = "Dimanche";
                dimanche.text = "Dimanche"

                newInput.appendChild(lundi);
                newInput.appendChild(mardi);
                newInput.appendChild(mercredi);
                newInput.appendChild(jeudi);
                newInput.appendChild(vendredi);
                newInput.appendChild(samedi);
                newInput.appendChild(dimanche);
                newInput.name = 'sea_jour' + (count + 1);
                newInput.className = 'form-control';

                var newInput2 = document.createElement('input');
                newInput2.type = 'time';
                newInput2.name = 'sea_heureDebut'+ (count + 1);
                newInput2.className = 'form-control';

                var newInput3 = document.createElement('input');
                newInput3.type = 'time';
                newInput3.name = 'sea_heureFin'+ (count + 1);
                newInput3.className = 'form-control';

                var newInput4 = document.createElement('input');
                newInput4.type = 'text';
                newInput4.name = 'sea_lieu'+ (count + 1);
                newInput4.className = 'form-control';

                // Good practice to do error checking
                if (newInput && newP)
                {
                    // Add the new elements to the form
                    newDiv.appendChild(newP);
                    newDiv.appendChild(wrapper1);
                    newDiv.appendChild(wrapper2);
                    newDiv.appendChild(wrapper3);
                    newDiv.appendChild(wrapper4);

                    wrapper1.appendChild(newInput);
                    wrapper1.appendChild(jours);
                    // newDiv.appendChild(newP3);
                    wrapper2.appendChild(newInput2);
                    wrapper2.appendChild(heureDebut);
                    // newDiv.appendChild(newP4);
                    wrapper3.appendChild(newInput3);
                    wrapper3.appendChild(heureFin);
                    // newDiv.appendChild(newP2);
                    wrapper4.appendChild(newInput4);
                    wrapper4.appendChild(lieu);

                    parentwrapper.appendChild(newDiv);
                    // var a = document.getElementById("groupeSeance");
                    // a.parentNode.insertBefore(newDiv,a);
                    // Increment the count
                    count++;
                }

            }
            else
            {
                alert('Limit reached');
            }
        }
    }
</script>
