<?php
 function dbConnect(){
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
    return $bdd;
 }


 function getAllGames(){
    $bdd = dbConnect();
    $allGameQuery = $bdd->query('SELECT * FROM JEU');
    $returnAllGameQuery = $allGameQuery->fetchAll(PDO::FETCH_ASSOC);
    return $returnAllGameQuery;
}


function getGamesOfPlayer(){
    $bdd = dbConnect();
    // IMPORTANT METTRE UNE VARIABLE POUR IDENTIFIER LE JOUEUR, NON FOJNCTIONNEL
    $gamesOfPlayerQuery = $bdd->query('SELECT Nb_Heure, Id_Jeu, Nom_Jeu, Editeur_Jeu, Plateforme_Jeu, Sortie_Jeu, Desc_Jeu, Url_Cover_Jeu, Url_Site_Jeu FROM JOUEUR INNER JOIN COLLECTION ON JOUEUR.Email_Joueur = COLLECTION.Email_Joueur INNER JOIN JEU ON COLLECTION.Id_Jeu = JEU.Id_Jeu WHERE Email_Joueur=\'test\'');
    $returnGamesOfPlayerQuery = $gamesOfPlayerQuery->fetchAll(PDO::FETCH_ASSOC);
    return $returnGamesOfPlayerQuery;
}

?>