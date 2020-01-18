@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['TeamsController@update', $teams->id], 'method' => 'POST', 'id' => 'form']) !!}
    @method('PUT')
    @csrf
        <div class="custom_edit_form">
            <div class="form_full_width">
                <div class="leftside_form">
                    <div class="form_wrapper">
                        {{Form::text('tea_nom', $teams->tea_nom, ['class' => 'form-control', 'placeholder' => 'Nom du cours'])}}
                        {{Form::label('tea_nom', 'Nom du cours (Équipe) :')}}
                    </div>

                    <div class="form_wrapper">
                        <select class="form-control" name="tea_sai_id">
                            @foreach($saisons as $saison)
                                @if($saison->id === $teams->tea_sea_id)
                                    @php($selected = 'selected = "selected"')
                                    <option value="{{ $saison->id }}" {{$selected}}>{{ $saison->sai_nomCategorie}}</option>
                                @else
                                    <option value="{{ $saison->id }}">{{ $saison->sai_nomCategorie}}</option>
                                @endif
                            @endforeach
                        </select>
                        {{Form::label('tea_sai_id', 'Saisons :')}}
                    </div>
                    
                    <div class="form_wrapper">
                        @foreach($cotis as $coti )
                            {{Form::number('cot_nbPaiement', $coti->cot_nbPaiement, ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
                            {{Form::label('cot_nbPaiement', 'Paiement en :')}}
                        @endforeach
                    </div>
                </div>
                
                <div class="rightside_form">
                    <div class="form_wrapper">
                        @foreach($cotis as $coti )
                            {{Form::text('cot_somme',$coti->cot_somme, ['class' => 'form-control', 'placeholder' => 'Somme'])}}
                            {{Form::label('cot_somme', 'Somme :')}}
                        @endforeach
                    </div>

                    <div class="form_wrapper">
                        <select class="form-control" name="tea_cat_id">
                            @foreach($cats as $cat)
                                @if($cat->id === $teams->tea_cat_id)
                                    @php($selected = 'selected = "selected"')
                                    <option value="{{ $cat->id }}" {{$selected}}>{{ $cat->cat_nom}}</option>
                                @else
                                    <option value="{{ $cat->id }}">{{ $cat->cat_nom}}</option>
                                @endif
                            @endforeach
                        </select>
                        {{Form::label('tea_cat_id', 'Catégorie :')}}
                    </div>

                    <div class="form_wrapper">
                        @foreach($cotis as $coti )
                            {!! Form::date('cot_echeance', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('Y-m-d'),  ['class' => 'form-control'])!!}
                            {{Form::label('cot_echeance', 'Echéance de paiement :')}}
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- ****** -->

            @php ($i = 1)
            <div id="parentDivId" class="form_full_width no_border">
                @foreach($seances as $seance)
                <div id="session" class="dividedside_from">
                    <p>Séance n° {{$i}}</p>
                
                    <div class="form_wrapper">
                        {{Form::text('sea_jour'.$i, $seance->sea_jours, ['class' => 'form-control', 'placeholder' => 'Jours'])}}
                        {{Form::label('sea_jour'.$i, 'Jours :')}}
                    </div>

                    <div class="form_wrapper">
                        {!! Form::time('sea_heureDebut'.$i,$seance->sea_heureDebut, ['class' => 'form-control']) !!}
                        {{Form::label('sea_heureDebut'.$i, 'Heures de début:')}}
                    </div>   
                
                    <div class="form_wrapper">
                        {!! Form::time('sea_heureFin'.$i,$seance->sea_heureFin, ['class' => 'form-control']) !!}
                        {{Form::label('sea_heureFin'.$i, 'Heures de fin :')}}
                    </div>   

                    <div class="form_wrapper">               
                        {!! Form::text('sea_lieu'.$i,$seance->sea_lieu, ['class' => 'form-control']) !!}
                        {{Form::label('sea_lieu'.$i, 'Lieu :')}}
                    </div> 
    
                </div>
                    @php ($i++)
                @endforeach
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
    // var counter = 2;

    // $("div").each(function() {
    //     if($(this).attr("id") == "session")
    //     sessionCounter++;
    // });

    function addSeance()
    {
        
        var counterSesh = $('#parentDivId').children('#session').length;
        // alert(len)

        // Get the quiz form element
        var sesh = document.getElementById('session');
        var form = document.getElementById('form');
        var parentwrapper = document.getElementById('parentDivId');


        // Good to do error checking, make sure we managed to get something
        if (sesh)
        {
            if (counterSesh < limit)
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
                newP.innerHTML = 'Séance n° ' + (counterSesh + 1);
                jours.innerHTML = 'Jours :';
                heureDebut.innerHTML = 'Heure de début :';
                heureFin.innerHTML = 'Heure de fin :';
                lieu.innerHTML = 'Lieu : '

                // Create the new text box
                var newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'sea_jour' + (counterSesh + 1);
                newInput.className = 'form-control';

                var newInput2 = document.createElement('input');
                newInput2.type = 'time';
                newInput2.name = 'sea_heureDebut'+ (counterSesh + 1);
                newInput2.className = 'form-control';

                var newInput3 = document.createElement('input');
                newInput3.type = 'time';
                newInput3.name = 'sea_heureFin'+ (counterSesh + 1);
                newInput3.className = 'form-control';

                var newInput4 = document.createElement('input');
                newInput4.type = 'text';
                newInput4.name = 'sea_lieu'+ (counterSesh + 1);
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

                    // form.appendChild(newDiv);
                    // var a = document.getElementById("groupeSeance");
                    // a.parentNode.insertBefore(newDiv,a);
                    // Increment the count
                    counterSesh++;
                }

            }
            else
            {
                alert('Question limit reached');
            }
        }
    }
</script>
