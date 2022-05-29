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
        </nav>
    
    <div class="ticket-form">
    <form action="sendticket.php" method="post">
            <h1> Ticket </h1>
             <!--
        We put the inputs necessary to kwnow the reason and the priority of the incident
    -->
            <div class="inputs">
                <input type="text" name="sujet" class="form-control" placeholder="sujet" required="required" autocomplete="off">
                <textarea type="text" name="description" class="form-control" placeholder="description" required="required" autocomplete="off" rows="5"></textarea>
                <select name="prio"  class="form-control">
                            <option value="0">--Choisissez un priorité--</option>
                            <option value="1">Bénine</option>
                            <option value="2">Acceptable</option>
                            <option value="3">Classique</option>
                            <option value="4">Urgent</option>

                        </select>

                <input type="text" name="secteur" class="form-control" placeholder="Secteur" required="required" autocomplete="off">
            
            </div>
            <div>
               <button type="submit"> Envoyer le rapport</button>
              
            </div>
         </form>
         <p><a href = "seetickets.php">Voir les tickets</a></p>         
    </div>
        


       
        
</body>