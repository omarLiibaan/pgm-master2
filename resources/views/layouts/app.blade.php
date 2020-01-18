<html lang="fr">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="Projection">
    <link rel="shortcut icon" type="image/x-icon" href="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- <meta name="theme-color" content="#0e374c"> -->
    <title>PGM</title>

    <!-- Font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Nunito+Sans:700,900" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('css/navs.css')}}" media="all">
</head>
<body>
    <div class="app_content">
        <div class="app_uppernav">
            @include('inc.uppernav')
        </div>
        <div class="app_sidenav">
            @include('inc.sidenav')
        </div>
        <div class="app_body">
            <div class="title">
                <!-- Tableau de bord title -->
                <span class="{{ Request::is('home') ? 'activeTitle' : 'inactiveTitle' }}"><i class="fas fa-home"></i></i>&nbsp;&nbsp;Tableau de bord</span>
                <span class="{{ Request::is('posts/create') ? 'activeTitle' : 'inactiveTitle' }}"><a href="/"><i class="fas fa-home"></i></i>&nbsp;&nbsp;Tableau de bord</a>&nbsp;&nbsp;<i class="fas fa-info-circle"></i>&nbsp;&nbsp;Créer&nbsp;un&nbsp;article</span>

                <!-- Membre title -->
                <span class="{{ Request::is('membres') ? 'activeTitle' : 'inactiveTitle' }}"><b></b><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Membres</span>
                <span class="{{ Request::segment(1) =='membres' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;membre</span>
                <span class="{{ Request::segment(1) =='membres' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Afficher/Modifier&nbsp;un&nbsp;membre</span>

                <!-- Cours title -->
                <span class="{{ Request::is('coursAsso') ? 'activeTitle' : 'inactiveTitle' }}"><b></b><i class="fas fa-network-wired"></i>&nbsp;&nbsp;Cours</span>
                <span class="{{ Request::segment(1) =='coursAsso' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;cours</span>
                <span class="{{ Request::segment(1) =='coursAsso' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Info&nbsp;du&nbsp;cours/Modifier</span>

                <!-- Equipes title -->
                <span class="{{ Request::is('equipes') ? 'activeTitle' : 'inactiveTitle' }}"><b></b><i class="fas fa-users"></i>&nbsp;&nbsp;Equipes</span>
                <span class="{{ Request::segment(1) =='equipes' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;équipe</span>
                <span class="{{ Request::segment(1) =='equipes' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Info&nbsp;de&nbsp;l'équipe/Modifier</span>

                <!-- Saison title -->
                <span class="{{ Request::is('saisons') ? 'activeTitle' : 'inactiveTitle' }}" href="/saisons"><b></b><i class="far fa-calendar-alt"></i>&nbsp;&nbsp;Saisons</span>
                <span class="{{ Request::segment(1) =='saisons' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;saison</span>
                <span class="{{ Request::segment(1) =='saisons' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Détails/Modifier</span>

                <!-- Saison title -->
                <span class="{{ Request::is('categories') ? 'activeTitle' : 'inactiveTitle' }}" href="/categories"><b></b><i class="fas fa-list"></i>&nbsp;&nbsp;Catégories</span>
                <span class="{{ Request::segment(1) =='categories' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;catégorie</span>
                <span class="{{ Request::segment(1) =='categories' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Détails/Modifier</span>

                <!-- Saison title -->
                <span class="{{ Request::is('fonctions') ? 'activeTitle' : 'inactiveTitle' }}" href="/fonctions"><b></b><i class="fas fa-user-cog"></i>&nbsp;&nbsp;Fonctions</span>
                <span class="{{ Request::segment(1) =='fonctions' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;une&nbsp;fonction</span>
                <span class="{{ Request::segment(1) =='fonctions' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Détails/Modifier</span>

                <!-- Saison title -->
                <span class="{{ Request::is('evenements') ? 'activeTitle' : 'inactiveTitle' }}" href="/evenements"><b></b><i class="far fa-calendar-check"></i>&nbsp;&nbsp;Évenements</span>
                <span class="{{ Request::segment(1) =='evenements' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;évenement</span>
                <span class="{{ Request::segment(1) =='evenements' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Détails/Modifier</span>

                <!-- ajouter joueur title -->
                <span class="{{ Request::is('membresCours') ? 'activeTitle' : 'inactiveTitle' }}" href="/membresCours"><b></b><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter un joueur</span>
                <span class="{{ Request::segment(1) =='membresCours' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Ajouter&nbsp;un&nbsp;Joueur</span>
                <span class="{{ Request::segment(1) =='membresCours' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Détails/Modifier</span>

                <!-- factures cours title -->
                <span class="{{ Request::is('facturescours') ? 'activeTitle' : 'inactiveTitle' }}" href="/facturescours"><b></b><i class="fa fa-file"></i>&nbsp;&nbsp;Factures</span>
                <span class="{{ Request::segment(1) =='facturescours' && Request::segment(2) =='create' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Factures</span>
                <span class="{{ Request::segment(1) =='facturescours' && Request::segment(2) !='create' && Request::segment(2) !='' ? 'activeTitle' : 'inactiveTitle' }}"><div onclick="previous()"><i class="fas fa-chevron-left"></i>&nbsp;&nbsp;Retour</div><i class="fas fa-info-circle"></i>&nbsp;&nbsp;Détails/Modifier</span>

            </div>
            @yield('content')
            @include('inc.errorsuccess')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{asset('js/myjs.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

