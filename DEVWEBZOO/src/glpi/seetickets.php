<!DOCTYPE html>
<html lang="fr-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href ="glpi.css">
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

    <?php

        $host = 'localhost';
        $dbname = 'zooproject';
        $username = 'root';
        $password = '';
        // if the user is an admin, he can see all tickets but if the user is not an admin, he can only see his own tickets
        $dsn = "mysql:host=$host;dbname=$dbname"; 
        session_start();
        if ($_SESSION['admin'] = true)
        {
            $sql = "SELECT * FROM `ticket` ORDER BY prio DESC";
            ?> <h1>Liste de tous les tickets (admin)</h1> <?php
        } else {
        $var = $_SESSION['user'];
        $sql = "SELECT * FROM `ticket` WHERE pseudo ='$var' ORDER BY prio DESC";
        ?> <h1>Liste de vos tickets</h1> <?php
        }

        try{
            $pdo = new PDO($dsn, $username, $password);
            $stmt = $pdo->query($sql);
            
            if($stmt === false){
             die("Erreur");
            }
            
           }catch (PDOException $e){
             echo $e->getMessage();
           }
         
         ?>

      
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Pseudo</th>
                    <th>Sujet</th>
                    <th>Description</th>
                    <th>Prio</th>
                    <th>Secteur</th>
                    <th>Statut</th>
                </tr>
         </thead>
      
         <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
          <!--
        We dress a table with all the data we have in the database
    -->
       <td><?php echo htmlspecialchars($row['id']); ?></td>
       <td><?php echo htmlspecialchars($row['date']); ?></td>
       <td><?php echo htmlspecialchars($row['pseudo']); ?></td>
       <td><?php echo htmlspecialchars($row['sujet']); ?></td>
       <td><?php echo htmlspecialchars($row['description']); ?></td>
       <td><?php echo htmlspecialchars($row['prio']); ?></td>
       <td><?php echo htmlspecialchars($row['secteur']); ?></td>
       <td><?php echo htmlspecialchars($row['statut']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>

</body>