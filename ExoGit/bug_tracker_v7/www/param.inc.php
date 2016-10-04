<?php

try {


    $monUrl = $_SERVER['HTTP_HOST'];

    //echo $monUrl;

    
    if ($monUrl == "localhost")
    {
        //Identifiant serveur du mac
        $dns = 'mysql:host=localhost;dbname=colin';
        $utilisateur = 'root';
        $motDePasse = "localhost";
    } else {
        //Identifiant serveur EEMI
        $dns = 'mysql:host=localhost;dbname=colin';
        $utilisateur = 'colin';
        $motDePasse = '638835';
    }


    //option de connexion
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    $connexion = new PDO($dns, $utilisateur, $motDePasse, $options);

} catch (Exeception $e) {
    die("probleme SQL");
}
