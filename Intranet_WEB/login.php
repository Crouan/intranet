<?php include("connexion_bdd.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-------------------------------- Primary meta tags ---------------------------------------------->
    <title>Corpany - Login Page</title>
    <meta name="title" content="Corpany - Loagin Page">
    <meta name="description" content="This is login page of the Corpany company">

    <!-------------------------------- Google font link ----------------------------------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Philosopher&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    
    <!-------------------------------- Custom css link ------------------------------------------------>
    <link rel="stylesheet" href="style.css">

</head>
<body>

    <div class="boximage">
        <img src="images/fd_1.jpg">
        <div class="overlay_1">
            <p>A WISE QUOTE</p>
        </div>
        <div class="overlay_2">
            <div class="p1">
                <p>Get <br> Everything <br> You Want</p>
            </div>
            <div class="p2">
                <p>You can get everything you want if you work hard, trust <br> the process, and stick to the plan.</p>
            </div>
        </div>
    </div>

    <div class="espace"></div>

    <div class="boxlogin">
        <div class="logo">
            <img src="images/corpany_logo.png" alt="Logo de la compagnie Corpagny">
            <p>Corpany</p>
        </div>
        <div class="googlelogin">
            <div class="titre_login_google">
                <h1> Welcome Back</h1>
                <p>Entrer your email and password to acces your account</p>
            </div>
            <div class="container_saisie_login_google">
                <form action="connexion_client.php" method='post'>
                    <div class="saisie_login_google">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
                <div class="option">
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Remember me</label>
                    <a href="forgot_password.html">Forgot Password</a>
                </div>
                <div class="boutons_login">
                    
                    <button class="modal-btn modal-trigger">Sign In</button>
                    
                    <a href="https://accounts.google.com/">
                    <button class="bouton_second">Sign In with Google</button>
                    </a>
                    <a href="https://github.com/login">
                        <button class="bouton_second">Sign In with GitHub</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------ Overlay create accounte ------------------------------------------------------------------------------>
    <div class="modal-container">
        <div class="overlay modal-trigger">
            <div class="modal">
                <button class="close-modal modal-trigger">X</button>
                <h1>Create Account</h1>
                <form method="post" action="inscriptionClient.php">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="Password" name="password" placeholder="Password">
                    <input type="Password" name="password" placeholder="Re-Entrer Password">

                    <div class="#">
                        <select name="groupe" placeholder="Choisir groupe"> 
                            <?php
                            // Requête pour récupérer les ID et libellés des groupes
                            $reponse = $connexion->query('SELECT * FROM groupe');
            
                            // Récupération des résultats sous forme d'un tableau associatif PDO::FETCH_ASSOC
                            $res = $reponse->fetchAll();
                            // Affichage des options de la liste déroulante
                            foreach ($res as $row) {
                                echo "<option value='" . $row['idGroupe'] . "'>" . $row['Libelle'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="terms">
                        <input type="checkbox" id="checkbox">
                        <label for="checkbox"><a href="accounte_conditions.html">I agree to these conditions</a></label>
                    </div>
                    <button type="submit">Sign Up</button>
                    <div class="member">
                        Already a member? <a href="connexion_client.php">Login here</a>
                    </div>
                </form>x
            </div>
        </div>
    </div>

</body>
<script src="overlay.js"></script>
</html>