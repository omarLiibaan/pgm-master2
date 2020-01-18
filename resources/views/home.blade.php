@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mon tableau de bord </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-lg btn-primary" style="margin-bottom: 15px;">Créer un nouvel article</a>
                        <hr>
                        <h3>Vos articles</h3>
                        @if(count($posts) > 0 )
                        <table class="table table-striped">
                            <tr>
                                <th>Titre</th>
                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Editer l'article</a></td>
                                    <td>
                                        {!! Form::open(['action' =>['PostsController@update', $post->id], 'method' => 'POST']) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Supprimer', ['class' => 'btn btn-lg btn-primary'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>Vous n'avez aucun article.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
