<?php
/**
 * Created by IntelliJ IDEA.
 * User: omarl
 * Date: 02.05.2019
 * Time: 16:15
 */
?>
@if (!auth()->guest())
<link rel="stylesheet" href="{{asset('css/navbar.css')}}" media="all">
<link rel="stylesheet" href="{{asset('css/home.css')}}" media="all">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<header>
    <!--  Remove dark nav  -->
    <nav class="nav dark-nav">
        <div class="container">
            <div class="nav-heading">
                <button class="toggle-nav" data-toggle="open-navbar1"><i class="fa fa-align-right"></i></button>
                <a class="brand" href="#">PGM</a>
            </div>
            <div class="menu" id="open-navbar1">
                <ul class="list">
                    <li><a href="/">Home</a></li>
                    <li><a href="/members">Members</a></li>
                    <li><a href="/coursAsso">Cours Assoc</a></li>
                    <li><a href="/teams">Cours Equipe</a></li>
                    <li><a href="/saisons">Saisons</a></li>
                    <li><a href="/cats">Categories</a></li>
                    <li><a href="/fonctions">Fonctions</a></li>
                    <li><a href="/evenements">Event</a></li>
                    @if(Auth::guest())
                        <li><a href="{{route('login')}}">Sign in</a></li>
                        <li><a href="{{route('register')}}">Sign up</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{Auth::user()->name}}<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/home">Mon tableau de bord</a></li>
                                <li>
                                    <a href="{{route('logout')}}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Se déconnecter
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>


<script type="text/javascript" src="{{asset('js/navbar.js') }}"></script>
<script type="text/javascript" src="{{asset('js/home.js') }}"></script>
@endif
