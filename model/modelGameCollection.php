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


function getGamesOfPlayer($emailGamer){
    $bdd = dbConnect();
    $gamesOfPlayerQuery = $bdd->query('SELECT Nb_Heure, Id_Jeu, Nom_Jeu, Editeur_Jeu, Plateforme_Jeu, Sortie_Jeu, Desc_Jeu, Url_Cover_Jeu, Url_Site_Jeu FROM JOUEUR INNER JOIN COLLECTION ON JOUEUR.Email_Joueur = COLLECTION.Email_Joueur INNER JOIN JEU ON COLLECTION.Id_Jeu = JEU.Id_Jeu WHERE Email_Joueur=\''.$emailGamer.'\'');
    $returnGamesOfPlayerQuery = $gamesOfPlayerQuery->fetchAll(PDO::FETCH_ASSOC);
    return $returnGamesOfPlayerQuery;
}


function isAPlayerInDataBase($emailGamer){
    $bdd = dbConnect();
    $allGamerInformationQuery = $bdd->query('SELECT * FROM JOUEUR WHERE Email_Joueur=\''.$emailGamer.'\'');
    $returnAllGamerInformationQuery = $allGamerInformationQuery->fetchAll(PDO::FETCH_ASSOC);
    if (count($returnAllGamerInformationQuery)>0){
        return true;
    }
    return false;
}


function getGamerInformation($emailGamer){
    $bdd = dbConnect();
    $gamerInformation = $bdd->query('SELECT * FROM JOUEUR WHERE Email_Joueur=\''.$emailGamer.'\'');
    $returnGamerInformationQuery = $gamerInformation->fetchAll(PDO::FETCH_ASSOC);
    return $returnGamerInformationQuery;
}




?>