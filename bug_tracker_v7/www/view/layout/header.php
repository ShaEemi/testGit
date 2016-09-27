<!DOCTYPE html>
<html lang="fr">
<head>
    
    <title>Affichage du blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/materialize.min.css">

    <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="assets/css/mobile.css" rel="stylesheet" media="all and (max-width: 400px)">
    <meta charset="UTF-8">
</head>
<body class="grey lighten-5">
<!-- 
//	HEADER
 -->
<nav class="brown lighten-3 white-text" id="nav_bug_tracker">
    <div class="nav-wrapper">
      <a href="?module=bug_tracker&action=index" class="brand-logo"><img class="logo" src="assets/img/logo_light.png"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><span class="cyan-text text-accent-4">
          <?php if (isset($_SESSION['user'])) { echo $_SESSION['user']['login']; } ?>
        </span></li>
        <li><a href="?module=bug_tracker&action=form_projet" ><span class="white-text" >Ajouter un projet</span></a></li>
        <li><a href="?module=user&action=logout"><i class="petite material-icons white-text">power_settings_new</i></a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><span class="cyan-text text-accent-4">
          <?php if (isset($_SESSION['user'])) { echo $_SESSION['user']['login']; } ?>
        </span></li>
        <li><a href="?module=bug_tracker&action=form_projet" class="black-text">Ajouter un projet</a></li>
        <li><a href="?module=user&action=logout"><i class="petite material-icons black-text">power_settings_new</i></a></li>
      </ul>
    </div>
  </nav>