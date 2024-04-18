<?php
session_start(); // Démarrer la session
if (empty($_POST["email"]) || empty($_POST["password"])){
    // si le mail ou le mot de passe est vide, on réaffiche simplement le formulaire de connexion
    echo ("il faut saisir les deux champs");
?>
    <p><a href="login.php">Retour</a></p>
<?php
} else {
    // Sinon, on récupère les données POST du formulaire d'authentification
    $email=$_POST["email"];
    $motDePasse=$_POST["password"];

    // on vérifie l'authentification
    //on se connecte à la bdd
    include "connexion_bdd.php";
    //on effectue une requête SQL de recherche de l'utilisateur
    $reponse = $connexion->query('SELECT * FROM user WHERE email="'.$email.'" and motDePasse="'.$motDePasse.'"');
    //on compte le nombre d’enregistrements retournés
    $numEnreg = $reponse->rowCount();
    if ($numEnreg == 0){
        echo ("erreur dans le mail ou mot de passe");
?>
        <p><a href="login.php">Retour</a></p>
<?php
    } else {
        //utilisateur est connecté
        $_SESSION['utilisateur_connecte'] = true; // Définir une variable de session pour indiquer que l'utilisateur est connecté
        header('Location: dash_board.html');
    }
}
?>