<?php

// Informations de connexion à la base de données
$dbhost="localhost";
$dbport=3306; //port par default pour MariaDB
$db="corpany_project_intranet";
$dbuser="root";
$dbpasswd="";

// Connexion à la base de données avec PDO
$connexion = new PDO("mysql:host=$dbhost;port=$dbport;dbname=$db", $dbuser, $dbpasswd);
    
// Configuration des options de PDO
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connexion->exec("SET CHARACTER SET utf8");
?>
