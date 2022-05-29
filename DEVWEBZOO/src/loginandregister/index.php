<!DOCTYPE html>
<html lang="fr-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="login_register.css">
    <link rel="stylesheet" href ="/style.css">
    <title> Le ZOwO</title>
</head>

<body>
    <nav>
        <div class="navbar">
            <li class="nav-item"><a href="/">Accueil</a></li>
            <li class="nav-item"><a href="/shop">Boutique</a></li>
            <li class="nav-item"><a href="/glpi">Déclarer un incident</a></li>
            <li class="nav-item"><a href="/loginandregister">Se connecter/Mon compte</a></li>
        </div>
    </nav>
    <?php

        session_start();
        if(isset($_SESSION["valid"]) && $_SESSION["valid"]) {
            header("Location: landing.php");    	
        }
    ?>
    <div class="auth-form">
        <?php
            if(isset($_GET['login_err']))
            {
                $err = htmlspecialchars($_GET['login_err']);  

                    switch($err)
                    {
                        case 'password' :
                            ?>
                            <div class="alert">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;
                        case 'email' :
                            ?>
                            <div class="alert">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;
                        case 'already' :
                            ?>
                            <div class="alert">
                                <strong>Erreur</strong> compte inexistant
                            </div>
                        <?php
                        break;
                    }
            }
            ?>
        <form action="connection.php" method="post">
            <h1> Se connecter </h1>

            <div class="inputs">
              <input type="email" name="email" class="form-control" placeholder="e-mail" required="required" autocomplete="off">
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
            </div>
            <div>
               <button type="submit"> Se connecter</button>
              
            </div>
        <div class="incription">
            <p > Je n'ai pas de compte. Je m'en crée un. </p>
            <p><a href = "register.php">Inscription</a></p>
          </div>
         </form>
    </div>
        
</body>

