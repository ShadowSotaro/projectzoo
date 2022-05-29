<!DOCTYPE html>
<html lang="fr-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="shop.css">
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
 <!--
        We need config.php to connect to the db
        and panier.class.php for the class panier
    -->
<?php
require "config.php";
require "panier.class.php";
$panier = new panier();
?>

 <!--
        We create our cards with the ID of the product (pictures), the name and the price which are on the DB
    -->
    <h1> Boutique </h1>
    <section class="shopcards">
        <?php $products = $bdd->prepare('SELECT * FROM products');
              $products->execute(); ?>
        <?php foreach($products as $products): ?>
        <div class="card">
            <div class="img-container">
                <img src="<?= $products['id'];?>.jpg" alt=""/>  
            </div>
            <div class = "card-header">
                <h4 class="title"> <?= $products['name']; ?> </h4>
                <h4 class="price"> <?= number_format($products['price'] ,2, ',', ' '); ?> € </h4>
                <a href = "addpanier.php?id=<?= $products['id']; ?>">Ajouter au panier</a>
            </div>
            
        </div>
      <?php endforeach ?>
    </section>

</body>
</html>