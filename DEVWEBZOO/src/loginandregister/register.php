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
            <li class="nav-item"><a href="/loginregister">Se connecter/Mon compte</a></li>
        </div>
    </nav>
    
    <div class="auth-form">
    <?php
            if(isset($_GET['login_err']))
            {
                $err = htmlspecialchars($_GET['login_err']);  

                    switch($err)
                    {
                        case 'succes' :
                            ?>
                            <div class="alert">
                                <strong>Erreur</strong> Inscription reussie
                            </div>
                        <?php
                        break;
                        case 'email' :
                            ?>
                            <div class="alert">
                                <strong>Erreur</strong> email non valide
                            </div>
                        <?php
                        break;
                        case 'pseudo_length' :
                            ?>
                            <div class="alert">
                                <strong>Erreur</strong> pseudo trop long
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
        <form action="register_treatment.php" method="post">
            <h1> Inscription </h1>

            <div class="inputs">
              <input type="text" name="pseudo" class="form-control" placeholder="pseudo" required="required" autocomplete="off">
              <input type="email" name="email" class="form-control" placeholder="e-mail" required="required" autocomplete="off">
              <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
              <input type="password" name="re_password" class="form-control" placeholder="Confirmation mdp   " required="required" autocomplete="off">
            
           </div>
        
            <div>
               <button type="submit"> S'inscrire</button>
            </div>

         </form>
    </div>
        
</body>