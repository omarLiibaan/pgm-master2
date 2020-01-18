@if (!auth()->guest())
<nav>
    <div class="userlogged">
        <span>{{Auth::user()->name[0]}}</span>
        <div>
            <h1>{{Auth::user()->name}}</h1>
            <p>{{Auth::user()->email}}</p>
        </div>
    </div>
    <legend><i class="fas fa-bars"></i>&nbsp;MENU</legend>
    <!-- <a class="{{ Request::is('home','posts/create') ? 'activeItem' : '' }}" href="/"><i class="fas fa-home"></i></i>&nbsp;&nbsp;Tableau de bord<span class="curtain"></span></a> -->
    <a class="{{ Request::is('membres','membres/*') ? 'activeItem' : '' }}" href="/membres"><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Membres<span class="curtain"></span></a>
    <a class="{{ Request::is('coursAsso','coursAsso/*') ? 'activeItem' : '' }}" href="/coursAsso"><i class="fas fa-network-wired"></i>&nbsp;&nbsp;Cours<span class="curtain"></span></a>
    <a class="{{ Request::is('equipes','equipes/*') ? 'activeItem' : '' }}" href="/equipes"><i class="fas fa-users"></i>&nbsp;&nbsp;Équipe<span class="curtain"></span></a>
    <a class="{{ Request::is('saisons','saisons/*') ? 'activeItem' : '' }}" href="/saisons"><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Saisons<span class="curtain"></span></a>
    <a class="{{ Request::is('categories','categories/*') ? 'activeItem' : '' }}" href="/categories"><i class="fas fa-list"></i>&nbsp;&nbsp;Catégories<span class="curtain"></span></a>
    <a class="{{ Request::is('fonctions','fonctions/*') ? 'activeItem' : '' }}" href="/fonctions"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Fonctions<span class="curtain"></span></a>
    <a class="{{ Request::is('evenements','evenements/*') ? 'activeItem' : '' }}" href="/evenements"><i class="far fa-calendar-check"></i>&nbsp;&nbsp;Évenements<span class="curtain"></span></a>
    <a class="{{ Request::is('membresCours','membresCours/*') ? 'activeItem' : '' }}" href="/membresCours"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajout joueur<span class="curtain"></span></a>
    <a class="{{ Request::is('facturesCours','facturesCours/*') ? 'activeItem' : '' }}" href="/facturesCours"><i class="fa fa-file"></i>&nbsp;&nbsp;Factures cours<span class="curtain"></span></a>
    <img class="six_sides_img" src="{{asset('img/6sides.svg')}}">
</nav>
@endif
