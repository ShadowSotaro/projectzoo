<?php
    session_start();    
?>  

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
 <!--
        The page when the connection is successful, the deconnection button is on this page 
    -->
<nav>
        <div class="navbar">
            <li class="nav-item"><a href="/">Accueil</a></li>
            <li class="nav-item"><a href="/shop">Boutique</a></li>
            <li class="nav-item"><a href="/glpi">Déclarer un incident</a></li>
            <li class="nav-item"><a href="/loginandregister">Se connecter/Mon compte</a></li>
        </div>
    </nav>
    <h1> Bonjour <?php echo $_SESSION['user']; ?></h1>
    <form action="disconnection.php" method="post">
            <div>
               <button type="submit"> Se deconnecter</button>
              
            </div>
    </form>
</body>