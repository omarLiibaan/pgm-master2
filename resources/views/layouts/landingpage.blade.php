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
    <link rel="stylesheet" href="{{asset('css/landingpage.css')}}" media="all">

</head>
<body>
    <div class="login_wrapper">
        <header class="j_width">
            <div class="help">
                <i class="fas fa-question-circle"></i>&nbsp;Aide
            </div>

            <div class="soc_media">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-google-plus-g"></i></a>
            </div>
        </header>

        <div class="login_content">
            <div class="logo">PGM</div>
            <h1 class="{{ Request::is('login') ? 'loginH1' : 'hideH1' }}">Veuillez saisir votre identifiant et votre mot de passe pour accéder au système.</h1>
            <h1 class="{{ Request::is('password/reset') ? 'resetH1' : 'hideH1' }}">Veuillez saisir votre adresse e-mail.</h1>
            <div class="login_box">
                @yield('content')
            </div>
        </div>
    </div>
    @include('inc.errorsuccess')    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
</html>