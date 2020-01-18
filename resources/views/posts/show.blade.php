<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 03.05.2019
 * Time: 14:47
 */
?>
@extends('layouts.app')

@section('content')
    <h1>{{$post->title}}</h1>
    <small>écrit le {{$post->created_at}}</small>
    <div>
        <p>{!! $post->body !!}</p>
    </div>
    @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-lg btn-primary" style="margin-bottom: 15px;">Modifier l'article</a>
                {!! Form::open(['action' =>['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-danger'])}}
                {!! Form::close() !!}
            @endif
    @endif
@endsection
