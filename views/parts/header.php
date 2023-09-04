<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/group.css">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/search.css">
    <link rel="stylesheet" href="../assets/css/profile.css">

    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Lato&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <script
      src="https://kit.fontawesome.com/17e72c725f.js"
      crossorigin="anonymous"
    ></script>
    
    <title><?= $title ?></title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../../accueil">Accueil</a></li>
                <li><a href="../../recherche">Recherche</a></li>
                <li><a href="../../accueil"><span>Plan&Go</span></a></li>
                <li><a href="../../groupe">Groupe</a></li>
                <li><a href="../../profil">Profil</a></li>
            </ul>
            <button id="openModal"><i class="fa-solid fa-user"><a href="connexion"></a></i></button>
            
        </nav>
    </header>