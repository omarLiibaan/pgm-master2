@extends('layouts.app')

@section('content')
    {!! Form::open(['action' =>['FonctionsController@update', $fonctions->id], 'method' => 'POST', 'id' => 'form']) !!}
    @method('PUT')
    @csrf
        <div class="custom_edit_form">
            <div class="form_full_width no_border">
                <div class="form_wrapper full_width">
                    {{Form::text('fon_nom', $fonctions->fon_nom, ['class' => 'form-control', 'placeholder' => 'Chauffeur'])}}
                    {{Form::label('fon_nom', 'Nom de la fonction :')}}
                </div>
            </div>
            <div class="form_full_width no_border">
                <div class="form_wrapper full_width">
                    {{Form::textarea('fon_description', $fonctions->fon_description,  ['class' => 'form-control', 'placeholder' => 'Description', 'rows' => 4, 'cols' => 40])}}
                    {{Form::label('fon_description', 'Description :')}}
                </div>
            </div>

            <!-- ***** -->
            <div id="parentDivId" class="form_full_width no_border">
            @php ($i = 1)
            @foreach($champs as $champ )
                <div id="quiz" class="dividedside_from">
                    <p>Champs n° {{$i}}</p>
                    <div class="form_wrapper">
                        {{Form::text('inf_titre'.$i, $champ->cha_titre, ['class' => 'form-control', 'placeholder' => 'Permis de conduire'])}}
                        {{Form::label('inf_titre'.$i, 'Titre du champs :')}}
                    </div>
                    
                    <div class="form_wrapper">
                        <select class="form-control" id="inf_type{{$i}}" >
                            @foreach($type as $types)
                                <option value="{{ $types}}"  {{ $champ->cha_type == $types  ? 'selected' : '' }}>{{ $types}}</option>
                            @endforeach
                        </select>
                        {{Form::label('inf_type'.$i, 'Type :')}}
                    </div>

                        @if($champ->cha_type === 'Champs simple')

                                <div id="champsSimple{{$i}}">
                                    <div class="form_wrapper">
                                        <select class="form-control" id="inf_format{{$i}}" >
                                            @foreach($format as $formats)
                                                <option value="{{ $formats}}" {{ $champ->cha_format == $formats  ? 'selected' : '' }}>{{ $formats}}</option>
                                            @endforeach
                                        </select>
                                        {{Form::label('cha_format'.$i, 'Format :')}}
                                    </div>
                                </div>
                                <div id="listeDéroulante{{$i}}" style="display: none;" >
                                    <div class="form_wrapper">
                                        {{Form::text('cha_'.$i.'val4', '', ['class' => 'form-control space_under'])}}
                                        {{Form::text('cha_'.$i.'val5', '', ['class' => 'form-control space_under'])}}
                                        {{Form::text('cha_'.$i.'val6', '', ['class' => 'form-control space_under'])}}
                                        {{Form::text('cha_'.$i.'val3', '', ['class' => 'form-control space_under', 'placeholder' => 'Permis Poids lourd'])}}
                                        {{Form::text('cha_'.$i.'val2', '', ['class' => 'form-control space_under', 'placeholder' => 'Permis B'])}}
                                        {{Form::text('cha_'.$i.'val', '', ['class' => 'form-control', 'placeholder' => ' Permis A'])}}
                                        {{Form::label('cha_'.$i.'val', 'Valeur :')}}
                                    </div>
                                </div>
                        @else
                                <div id="champsSimple{{$i}}" style="display: none;">
                                    <div class="form_wrapper">
                                        <select class="form-control" name="inf_format{{$i}}" >
                                            @foreach($format as $formats)
                                                <option value="{{ $formats}}">{{ $formats}}</option>
                                            @endforeach
                                        </select>
                                        {{Form::label('cha_format'.$i, 'Format :')}}
                                    </div>
                                </div>
                                <div id="listeDéroulante{{$i}}"  >
                                    <div class="form_wrapper">
                                        {{Form::text('cha_'.$i.'val6', $champ->cha_val6, ['class' => 'form-control space_under'])}}
                                        {{Form::text('cha_'.$i.'val5', $champ->cha_val5, ['class' => 'form-control space_under'])}}
                                        {{Form::text('cha_'.$i.'val4', $champ->cha_val4, ['class' => 'form-control space_under'])}}
                                        {{Form::text('cha_'.$i.'val3',$champ->cha_val3, ['class' => 'form-control space_under', 'placeholder' => 'Permis Poids lourd'])}}
                                        {{Form::text('cha_'.$i.'val2', $champ->cha_val2, ['class' => 'form-control space_under', 'placeholder' => 'Permis B'])}}
                                        {{Form::text('cha_'.$i.'val', $champ->cha_val, ['class' => 'form-control', 'placeholder' => ' Permis A'])}}
                                        {{Form::label('cha_'.$i.'val', 'Valeur :')}}
                                    </div>
                                </div>

                        @endif
                </div>
                @php ($i++)
            @endforeach
            </div>

            <div class="form_wrapper_wide">
                <button class="btn_ajouter_seance" type="button" onclick="addChamps()"/><i class="fas fa-plus"></i>&nbsp;&nbsp;Ajouter un champs</button>
                {{ Form::button('<i class="fas fa-check"></i>&nbsp;&nbsp;Confirmer', ['class' => 'btn_modifier', 'type' => 'submit']) }}
            </div>
        </div>
    {!! Form::close() !!}
@endsection
<script type="text/javascript">



    $(document).ready(function(){
        $('#inf_type1').on('change', function(){
            console.log('salut');
            if( $(this).val()==="Liste déroulante"){
                $("#listeDéroulante1").show();
                $("#champsSimple1").hide()
            }
            else{
                $("#champsSimple1").show();
                $("#listeDéroulante1").hide()
            }
        });

    });
    $(document).ready(function(){
        $('#inf_type2').on('change', function(){
            console.log('salut');
            if( $(this).val()==="Liste déroulante"){
                $("#listeDéroulante2").show();
                $("#champsSimple2").hide()
            }
            else{
                $("#champsSimple2").show();
                $("#listeDéroulante2").hide()
            }
        });

    });


</script>

<script>
    var limit = 4; // Max questions
    var count = 2; // There are 4 questions already



    function addChamps()
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
                var titre = document.createElement("LABEL");
                var type = document.createElement("LABEL");
                var format = document.createElement("LABEL");
                var valeur = document.createElement("LABEL");
                var newP2 = document.createElement('p');
                var newP3 = document.createElement('p');
                var newP4 = document.createElement('p');
                newDiv.className = "dividedside_from";
                newP.innerHTML = 'Champs n° ' + (count + 1);
                titre.innerHTML = 'Titre du champs :';
                type.innerHTML = 'Type :';
                format.innerHTML = 'Format :';
                valeur.innerHTML = 'Valeur : '

                // Create the new text box
                wrapper1.className = "form_wrapper";
                wrapper2.className = "form_wrapper";
                wrapper3.className = "form_wrapper";
                wrapper4.className = "form_wrapper";
                var newInput = document.createElement('input');
                newInput.type = 'text';
                newInput.name = 'inf_titre' + (count + 1);
                newInput.className = 'form-control';
                var array = ["Champs simple","Liste déroulante"];
                var array2 = [ 'Lettres et chiffres','Chiffres uniquement', 'Dates'];
                var newInput2 = document.createElement('select');
                newInput2.id = 'inf_type' + (count + 1);
                newInput2.name = 'inf_type'+ (count + 1);
                newInput2.className = 'form-control';
                for(var i = 0; i< array.length; i++){
                    var option = document.createElement('option');
                    option.value = array[i];
                    option.text = array[i];
                    newInput2.appendChild(option);
                }
                var champsSimple = document.createElement('div');
                champsSimple.id = 'champsSimple' + (count + 1);
                var listeD = document.createElement('div');
                listeD.id  = 'listeDéroulante' + (count + 1);
                listeD.style = 'display : none';
                var newInput3 = document.createElement('select');
                newInput3.id = 'cha_format' + (count + 1);
                newInput3.name = 'cha_format'+ (count + 1);
                newInput3.className = 'form-control';
                for(var j = 0; j< array2.length; j++){
                    var option2 = document.createElement('option');
                    option2.value = array2[j];
                    option2.text = array2[j];
                    newInput3.appendChild(option2);
                }

                var newInput4 = document.createElement('input');
                newInput4.type = 'text';
                newInput4.name = 'cha_'+ (count + 1) + 'val';
                newInput4.className = 'form-control space_under';
                var newInput5 = document.createElement('input');
                newInput5.type = 'text';
                newInput5.name = 'cha_'+ (count + 1) + 'val2';
                newInput5.className = 'form-control space_under';
                var newInput6 = document.createElement('input');
                newInput6.type = 'text';
                newInput6.name = 'cha_'+ (count + 1) + 'val3';
                newInput6.className = 'form-control space_under';
                newInput6.placeholder = 'Permis Poids Lourd';
                var newInput7 = document.createElement('input');
                newInput7.type = 'text';
                newInput7.name = 'cha_'+ (count + 1) + 'val4';
                newInput7.className = 'form-control space_under';
                var newInput7 = document.createElement('input');
                newInput7.type = 'text';
                newInput7.name = 'cha_'+ (count + 1) + 'val5';
                newInput7.className = 'form-control space_under';
                newInput7.placeholder = 'Permis B';
                var newInput8 = document.createElement('input');
                newInput8.type = 'text';
                newInput8.name = 'cha_'+ (count + 1) + 'val6';
                newInput8.className = 'form-control';
                newInput8.placeholder = 'Permis A';

                // Good practice to do error checking
                if (newInput && newP)
                {
                    // Add the new elements to the form
                    newDiv.appendChild(newP);

                    newDiv.appendChild(wrapper1);
                    newDiv.appendChild(wrapper2);
                    newDiv.appendChild(wrapper3);
                    // newDiv.appendChild(wrapper4);



                    // newDiv.appendChild(titre);
                    // newDiv.appendChild(newInput);
                    wrapper1.appendChild(newInput);
                    wrapper1.appendChild(titre);
                    // newDiv.appendChild(newP3);
                    wrapper2.appendChild(newInput2);
                    wrapper2.appendChild(type);
                    // newDiv.appendChild(newP4);
                    wrapper3.appendChild(newInput3);
                    wrapper3.appendChild(format);;
                    newDiv.appendChild(champsSimple);
                    // newDiv.appendChild(newP2);
                    newDiv.appendChild(listeD);
                    listeD.appendChild(wrapper4);

                    wrapper4.appendChild(newInput4);
                    wrapper4.appendChild(newInput5);
                    wrapper4.appendChild(newInput6);
                    wrapper4.appendChild(newInput7);
                    wrapper4.appendChild(newInput8);
                    wrapper4.appendChild(valeur);

                    //form.appendChild(newDiv);

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
        $(document).ready(function(){
            $('#inf_type3').on('change', function(){
                console.log('salut');
                if( $(this).val()==="Liste déroulante"){
                    $("#listeDéroulante3").show();
                    $("#champsSimple3").hide()
                }
                else{
                    console.log('justin');
                    $("#champsSimple3").show();
                    $("#listeDéroulante3").hide()
                }
            });

        });
        $(document).ready(function(){
            $('#inf_type4').on('change', function(){
                console.log('salut');
                if( $(this).val()==="Liste déroulante"){
                    $("#listeDéroulante4").show();
                    $("#champsSimple4").hide()
                }
                else{
                    console.log('justin');
                    $("#champsSimple4").show();
                    $("#listeDéroulante4").hide()
                }
            });

        });
    }
</script>
<script>


</script>

