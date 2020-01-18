<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 15:12
 */
?>

@extends('layouts.app')

@section('content')
    <h1>Création d'articles</h1>
    {!! Form::open(['action' =>'PostsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Titre')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Contenu')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Contenu de votre article...'])}}
        </div>
        {{Form::submit('Créer votre article', ['class' => 'btn btn-lg btn-primary'])}}
    {!! Form::close() !!}
@endsection
