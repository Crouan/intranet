<?php
session_start(); // Démarrer la session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3">
    <title>Organigramme</title>
    <link rel="stylesheet" href="Style_3.css">
</head>
<body>
    <div id="bloc_page">	
        <header>
            <!-- En-tête de la page -->
            <h1 class="Titre"> Organigramme</h1>
        </header>

        <section>
            <article>
                <!-- <div id="tabEmploye">
                    <div class="Employe">  -->
                    <?php
                        include ("connexion_bdd.php"); 
                        $requete = 'select * from info_user';
                        $req = $connexion->prepare($requete);
                        $req->execute();

                        echo '<div id="tabEmploye">';
                        while ($donnees = $req->fetch()) {
                            echo '<div class="Employe">';
                                echo '<img class="imageEmployé" src="' . $donnees['photo'] . '">';
                                echo '<div>' . $donnees['prenom'] . ' ' . $donnees['nom'] . '</div>';
                                echo '<div>' . $donnees['poste'] . '</div>';
                                echo '<div>' . $donnees['numTel'] . '</div>';
                            echo '</div>';
                        }
                        echo '</div>';
                    ?>
            </article>
        </section>
    </div>
</body>
</html>