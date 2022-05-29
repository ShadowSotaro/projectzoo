<html lang="fr-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="shop.css">
    <link rel="stylesheet" href ="/style.css">
    <title> Le ZOwO</title>
</head>

<?php
require "config.php";
require "panier.class.php";
$panier = new panier();

if(isset($_GET['id'])){

              $req = $bdd->prepare('SELECT id FROM products WHERE id = id');
              $req->execute(); 
              $array = array('id' => $_GET['id']);
              if(empty($array)){
                  die("Ce produit n'existe pas");
              }
              $panier->add($array['id']);
           
              

}else{
    die("Vous n'avez pas selectionné de produit à ajouter au pannier");
}
?>  
<body>
<div>
<a href="index.php"> Le produit a bien été ajouté à votre panier, retourner au catalogue </a>
</div>
</body>