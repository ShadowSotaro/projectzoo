<?php

require_once 'config.php';
session_start();
if (!$_SESSION["valid"])
{
    header("Location:/loginandregister/index.php");
}

if(isset($_SESSION['user']) && isset($_POST['sujet']) && isset($_POST['description']) && isset($_POST['prio']) && isset($_POST['secteur']))
{
      
    $pseudo  = $_SESSION['user'];
    $sujet  = htmlspecialchars($_POST['sujet']);
    $description = ($_POST['description']);
    $prio = ($_POST['prio']);
    $secteur = ($_POST['secteur']);
   
    //We insert in the database the data that the user write in the input
    
    $insert = $bdd->prepare('INSERT INTO ticket(pseudo, sujet, description, prio, secteur) VALUES(:pseudo, :sujet, :description, :prio, :secteur)');
    $insert->execute(array(
                        'pseudo' => $pseudo,
                        'sujet' => $sujet,
                        'description' => $description,
                        'prio' => $prio,
                        'secteur' => $secteur,

    ));

    header('Location:landinglpi.php');
                        
        
}     
  