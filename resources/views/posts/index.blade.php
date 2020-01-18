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
    <h1>Articles</h1>
    <hr>
    <a href="/posts/create" class="btn btn-lg btn-primary" style="margin-bottom: 15px;">Créer un nouvel article</a>
    @if(count($posts) >= 1)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>écrit le {{$post->created_at}}</small>
                <p>{{$post->body}}</p>
                <hr>
                <p><a href="/posts/{{$post->id}}">Lire la suite... </a></p>
            </div>

         @endforeach
    @else
        <p>Aucun article existant</p>
    @endif
@endsection
