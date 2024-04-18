<?php
session_start();// Démarrer la session

include ("connexion_bdd.php");

if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["groupe"])) {
// Si la saisie a été effectuée
if ($_POST["email"] != "" && $_POST["password"] != "" && $_POST["groupe"] != "" ) {
// Si tous les champs sont renseignés
$email = $_POST["email"];
$motDePasse = $_POST["password"];
$idGroupe = $_POST["groupe"];



$hashed_password = password_hash($motDePasse, PASSWORD_DEFAULT);

//on insère dans la bdd
$requete = 'INSERT INTO user (email, motDePasse, idGroupe) VALUES ("' . $email . '","' . $hashed_password . '","' . $idGroupe . '")';
$ok = $connexion->exec($requete); 
if ($ok){
    echo ("votre compte est créé, vous pouvez vous connecter");
}
?>
<p><a href="login.php">Connexion</a></p>
<?php
} else {
echo("erreur de création de compte");
}
}
?>