<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 15:54
 */
?>
@extends('layouts.app')

@section('content')
    <h1>Modifier l'article</h1>
    {!! Form::open(['action' =>['PostsController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Titre')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Titre'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Contenu')}}
        {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Contenu de votre article...'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Modifier votre article', ['class' => 'btn btn-lg btn-primary'])}}
    {!! Form::close() !!}
@endsection

