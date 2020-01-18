@extends('layouts.app')

@section('content')
{!! Form::open(['action' =>['CoursController@update', $cours->id], 'method' => 'POST', 'id' => 'form']) !!}
@method('PUT')
@csrf
    <div class="custom_edit_form">
        <div class="form_full_width">
            <div class="leftside_form">
                <div class="form_wrapper">
                    {{Form::text('cou_nom', $cours->cou_nom, ['class' => 'form-control', 'placeholder' => 'Nom du cours'])}}
                    {{Form::label('cou_nom', 'Nom du cours :')}}
                </div>

                <div class="form_wrapper">
                    @foreach($cotis as $coti )
                        {{Form::number('cot_nbPaiement', $coti->cot_nbPaiement, ['class' => 'form-control', 'placeholder' => 'Nombre de fois'])}}
                        {{Form::label('cot_nbPaiement', 'Paiement en :')}}
                    @endforeach
                </div>
                
    
                <div class="form_wrapper">
                    {!! Form::date('cou_datedebut', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datedebut))->format('Y-m-d'),  ['class' => 'form-control'])!!}
                    {{Form::label('cou_datedebut', 'Date de début :')}}
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
                    @foreach($cotis as $coti )
                        {!! Form::date('cot_echeance', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($coti->cot_echeance))->format('Y-m-d'),  ['class' => 'form-control'])!!}
                        {{Form::label('cot_echeance', 'Echéance de paiement :')}}
                    @endforeach
                </div>

                <div class="form_wrapper">
                    {!! Form::date('cou_datefin', Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($cours->cou_datefin))->format('Y-m-d'),  ['class' => 'form-control'])!!}
                    {{Form::label('cou_datefin', 'Date de fin :')}}
                </div>

            </div>
        </div>

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
                var jourslbl = document.createElement("label");
                var heureDebutlbl = document.createElement("label");
                var heureFinlbl = document.createElement("label");
                var lieulbl = document.createElement("label");
                
                wrapper1.className = "form_wrapper";
                wrapper2.className = "form_wrapper";
                wrapper3.className = "form_wrapper";
                wrapper4.className = "form_wrapper";
                newDiv.className = "dividedside_from";
                newDiv.id = "session";
                newP.innerHTML = 'Séance n° ' + (counterSesh + 1);
                jourslbl.innerHTML = 'Jours :';
                heureDebutlbl.innerHTML = 'Heure de début :';
                heureFinlbl.innerHTML = 'Heure de fin :';
                lieulbl.innerHTML = 'Lieu : '

                // Create the new text box
                var newInput = document.createElement('input');
                newInput.value = '';
                newInput.type = 'text';
                newInput.name = 'sea_jour' + (counterSesh + 1);
                newInput.className = 'form-control';

                var newInput2 = document.createElement('input');
                newInput2.val = '';
                newInput2.type = 'time';
                newInput2.name = 'sea_heureDebut'+ (counterSesh + 1);
                newInput2.className = 'form-control';

                var newInput3 = document.createElement('input');
                newInput3.value = '';
                newInput3.type = 'time';
                newInput3.name = 'sea_heureFin'+ (counterSesh + 1);
                newInput3.className = 'form-control';

                var newInput4 = document.createElement('input');
                newInput4.value = '';
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
                    wrapper1.appendChild(jourslbl);
                    // 
                    wrapper2.appendChild(newInput2);
                    wrapper2.appendChild(heureDebutlbl);
                    // 
                    wrapper3.appendChild(newInput3);
                    wrapper3.appendChild(heureFinlbl);
                    // 
                    wrapper4.appendChild(newInput4);
                    wrapper4.appendChild(lieulbl);

                    // 
                    parentwrapper.appendChild(newDiv);
                    // Increment the count
                    counterSesh++;
                }

            }
            else
            {
                alert('Limit reached');
            }
        }
    }
</script>
