@extends('layouts.app')

@section('content')


    <div class="detail_box">
        <h3>{{$emails->ema_titre}}</h3>
        <h4><span>Lieu et Date de l'envoi:</span>&nbsp;&nbsp;{{$emails->ema_lieu}}&nbsp;&nbsp;{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($emails->ema_dateJour))->format('d.m.Y') }}</h4>
        <h4><span>Destinataire:</span>&nbsp;&nbsp;{{$emails->ema_mail}}</h4>
        <hr>


            <h4><span>Intro:</span>&nbsp;&nbsp;{{$emails->ema_intro}}</h4>

        <h4><span>Paragraphes 1:</span></h4>
                <p>{{$emails->ema_p}}</p>

        <h4><span>Paragraphes 12:</span></h4>
        <p>{{$emails->ema_p2}}</p>

        <h4><span>Salutations:</span></h4>
        <p>{{$emails->ema_salutations}}</p>

    </div>

@endsection

