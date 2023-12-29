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
    $allGameQuery = $bdd->query('SELECT * FROM JEU WHERE Id_Jeu NOT IN (SELECT Id_Jeu FROM COLLECTION WHERE Email_Joueur="liliane.daura@tg.com")');
    $returnAllGameQuery = $allGameQuery->fetchAll(PDO::FETCH_ASSOC);
    return $returnAllGameQuery;
}


function getGamesWithSearch($filter){
    $bdd = dbConnect();
    $allGameQuery = $bdd->query('SELECT * FROM JEU WHERE Nom_Jeu LIKE \'%'.$filter.'%\' AND Id_Jeu NOT IN (SELECT Id_Jeu FROM COLLECTION WHERE Email_Joueur="liliane.daura@tg.com");');
    $returnAllGameQuery = $allGameQuery->fetchAll(PDO::FETCH_ASSOC);
    return $returnAllGameQuery;
}


function getGamesOfPlayer($emailGamer){
    $bdd = dbConnect();
    $gamesOfPlayerQuery = $bdd->query('SELECT Nb_Heure, JEU.Id_Jeu, Nom_Jeu, Editeur_Jeu, Plateforme_Jeu, Sortie_Jeu, Desc_Jeu, Url_Cover_Jeu, Url_Site_Jeu FROM JOUEUR INNER JOIN COLLECTION ON JOUEUR.Email_Joueur = COLLECTION.Email_Joueur INNER JOIN JEU ON COLLECTION.Id_Jeu = JEU.Id_Jeu WHERE JOUEUR.Email_Joueur=\''.$emailGamer.'\'');
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


function insertNewGame($name,$editor,$plateform, $dateOfRelease, $description, $gamePictureUrl, $gameWebsiteUrl){
    $bdd = dbConnect();
    $insertNewGameCommande = "INSERT INTO JEU(Nom_Jeu, Editeur_Jeu, Plateforme_Jeu, Sortie_Jeu, Desc_Jeu, Url_Cover_Jeu, Url_Site_Jeu) VALUES (:name, :editor, :plateform, :dateOfRelease, :description, :gamePictureUrl, :gameWebsiteUrl)";
    $bindInsertNewGameCommande = $bdd->prepare($insertNewGameCommande);
    $bindInsertNewGameCommande->bindParam(':name', $name, PDO::PARAM_STR);
    $bindInsertNewGameCommande->bindParam(':editor', $editor, PDO::PARAM_STR);
    $bindInsertNewGameCommande->bindParam(':plateform', $plateform, PDO::PARAM_STR);
    $bindInsertNewGameCommande->bindParam(':dateOfRelease', $dateOfRelease, PDO::PARAM_STR);
    $bindInsertNewGameCommande->bindParam(':description', $description, PDO::PARAM_STR);
    $bindInsertNewGameCommande->bindParam(':gamePictureUrl', $gamePictureUrl, PDO::PARAM_STR);
    $bindInsertNewGameCommande->bindParam(':gameWebsiteUrl', $gameWebsiteUrl, PDO::PARAM_STR);
    $bindInsertNewGameCommande->execute();
}

function insertLinkGamePlayer($emailPlayer,$idGame){
    $bdd = dbConnect();
    $emailGamer="liliane.daura@tg.com";
    $numberGamePlayer = $bdd->query('SELECT MAX(Numero_Jeu_Joueur) FROM COLLECTION WHERE Email_Joueur=\''.$emailGamer.'\'');
    $returnNumberGamePlayer = $numberGamePlayer->fetchAll(PDO::FETCH_ASSOC);
    $maxi=intval($returnNumberGamePlayer[0]["MAX(Numero_Jeu_Joueur)"])+1;
    $insertNewGameCommande = "INSERT INTO COLLECTION VALUES ('$emailPlayer',".intval($idGame).",".$maxi.",0);";
    $bdd->query($insertNewGameCommande);
}
?>