<?php
 function dbConnect(){
    $host = $_ENV['DB_HOST'];
    $dbname = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$password);
    return $bdd;
 }

 function getAllGames($emailGamer){
     $bdd = dbConnect();
     $query = 'SELECT * FROM JEU WHERE Id_Jeu NOT IN (SELECT Id_Jeu FROM COLLECTION WHERE Email_Joueur = :emailGamer)';
     $allGameQuery = $bdd->prepare($query);
     $allGameQuery->bindParam(':emailGamer', $emailGamer, PDO::PARAM_STR);
     $allGameQuery->execute();
     $returnAllGameQuery = $allGameQuery->fetchAll(PDO::FETCH_ASSOC);
     $allGameQuery->closeCursor();
     return $returnAllGameQuery;
 }


 function getGamesWithSearch($emailGamer, $filter){
     $bdd = dbConnect();
     $query = 'SELECT * FROM JEU WHERE Nom_Jeu LIKE :filter AND Id_Jeu NOT IN (SELECT Id_Jeu FROM COLLECTION WHERE Email_Joueur = :email)';
     $allGameQuery = $bdd->prepare($query);
     $filterParam = '%' . $filter . '%';
     $allGameQuery->bindParam(':filter', $filterParam, PDO::PARAM_STR);
     $allGameQuery->bindParam(':email', $emailGamer, PDO::PARAM_STR);
     $allGameQuery->execute();
     $returnAllGameQuery = $allGameQuery->fetchAll(PDO::FETCH_ASSOC);
     $allGameQuery->closeCursor();
     return $returnAllGameQuery;
 }
 

 function getGamesOfPlayer($emailGamer){
     $bdd = dbConnect();
     $query = 'SELECT Nb_Heure, JEU.Id_Jeu, Nom_Jeu, Editeur_Jeu, Plateforme_Jeu, Sortie_Jeu, Desc_Jeu, Url_Cover_Jeu, Url_Site_Jeu FROM JOUEUR INNER JOIN COLLECTION ON JOUEUR.Email_Joueur = COLLECTION.Email_Joueur INNER JOIN JEU ON COLLECTION.Id_Jeu = JEU.Id_Jeu WHERE JOUEUR.Email_Joueur = :emailGamer';
 
     $gamesOfPlayerQuery = $bdd->prepare($query);
     $gamesOfPlayerQuery->bindParam(':emailGamer', $emailGamer, PDO::PARAM_STR);
     $gamesOfPlayerQuery->execute();
     $returnGamesOfPlayerQuery = $gamesOfPlayerQuery->fetchAll(PDO::FETCH_ASSOC);
     $gamesOfPlayerQuery->closeCursor();
     return $returnGamesOfPlayerQuery;
 }
 

function isAPlayerInDataBase($emailGamer){
    $bdd = dbConnect();
    $query = 'SELECT * FROM JOUEUR WHERE Email_Joueur = :emailGamer';
    $gamerInformationQuery = $bdd->prepare($query);
    $gamerInformationQuery->bindParam(':emailGamer', $emailGamer, PDO::PARAM_STR);
    $gamerInformationQuery->execute();
    $returnGamerInformationQuery = $gamerInformationQuery->fetchAll(PDO::FETCH_ASSOC);
    $gamerInformationQuery->closeCursor();
    if (count($returnGamerInformationQuery)>0){
        return true;
    }
    return false;
}


function getGamerInformation($emailGamer){
    $bdd = dbConnect();
    $query = 'SELECT * FROM JOUEUR WHERE Email_Joueur = :emailGamer';
    $gamerInformationQuery = $bdd->prepare($query);
    $gamerInformationQuery->bindParam(':emailGamer', $emailGamer, PDO::PARAM_STR);
    $gamerInformationQuery->execute();
    $returnGamerInformationQuery = $gamerInformationQuery->fetchAll(PDO::FETCH_ASSOC);
    $gamerInformationQuery->closeCursor();
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


function insertLinkGamePlayer($emailPlayer, $idGame){
    $bdd = dbConnect();
    $numberGamePlayerQuery = $bdd->prepare('SELECT MAX(Numero_Jeu_Joueur) FROM COLLECTION WHERE Email_Joueur = :emailPlayer');
    $numberGamePlayerQuery->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $numberGamePlayerQuery->execute();
    $returnNumberGamePlayer = $numberGamePlayerQuery->fetchAll(PDO::FETCH_ASSOC);
    $numberGamePlayerQuery->closeCursor();
    $maxi = intval($returnNumberGamePlayer[0]["MAX(Numero_Jeu_Joueur)"]) + 1;
    $insertNewGameCommande = $bdd->prepare('INSERT INTO COLLECTION VALUES (:emailPlayer, :idGame, :maxi, 0)');
    $insertNewGameCommande->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $insertNewGameCommande->bindParam(':idGame', $idGame, PDO::PARAM_INT);
    $insertNewGameCommande->bindParam(':maxi', $maxi, PDO::PARAM_INT);
    $insertNewGameCommande->execute();
}


function getGamePlayer($emailPlayer, $idGame){
    $bdd = dbConnect();
    $gamePlayerQuery = $bdd->prepare('SELECT * FROM JEU INNER JOIN COLLECTION ON COLLECTION.Id_Jeu = JEU.Id_Jeu WHERE Email_Joueur = :emailPlayer AND JEU.Id_Jeu = :idGame');
    $gamePlayerQuery->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $gamePlayerQuery->bindParam(':idGame', $idGame, PDO::PARAM_INT);
    $gamePlayerQuery->execute();
    $returnGamePlayer = $gamePlayerQuery->fetchAll(PDO::FETCH_ASSOC);
    $gamePlayerQuery->closeCursor();
    return $returnGamePlayer;
}


function deleteLinkGamePlayer($emailPlayer, $idGame) {
    $bdd = dbConnect();
    $deleteLinkGamePlayer = "DELETE FROM COLLECTION WHERE Email_Joueur= :emailPlayer AND Id_Jeu= :idGame;";
    $stmt = $bdd->prepare($deleteLinkGamePlayer);
    $stmt->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $stmt->bindParam(':idGame', $idGame, PDO::PARAM_INT);
    $stmt->execute();
}


function updateTimeGamePlayer($emailPlayer, $idGame, $nbHour) {
    $bdd = dbConnect();
    $updateHourGamePlayer = "UPDATE COLLECTION SET Nb_Heure = :nbHour WHERE Email_Joueur = :emailPlayer AND Id_Jeu = :idGame;";
    $stmt = $bdd->prepare($updateHourGamePlayer);
    $stmt->bindParam(':nbHour', $nbHour, PDO::PARAM_INT);
    $stmt->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $stmt->bindParam(':idGame', $idGame, PDO::PARAM_INT);
    $stmt->execute();
}


function getTenBestPlayers(){
    $bdd = dbConnect();
    $tenBestGamers = $bdd->query('SELECT JOUEUR.Email_Joueur, Nom_Joueur, Prenom_Joueur, SUM(collection.Nb_Heure) AS TempsDeJeuTotal, (SELECT Nom_Jeu FROM COLLECTION INNER JOIN JEU ON COLLECTION.Id_Jeu = JEU.Id_Jeu WHERE COLLECTION.Email_Joueur = JOUEUR.Email_Joueur ORDER BY COLLECTION.Nb_Heure DESC LIMIT 1) AS JeuPrefere FROM JOUEUR INNER JOIN COLLECTION ON COLLECTION.Email_Joueur = JOUEUR.Email_Joueur INNER JOIN JEU ON COLLECTION.Id_Jeu = JEU.Id_Jeu GROUP BY JOUEUR.Email_Joueur, Nom_Joueur, Prenom_Joueur ORDER BY TempsDeJeuTotal DESC LIMIT 10;');
    $returnTenBestGamers = $tenBestGamers->fetchAll(PDO::FETCH_ASSOC);
    return $returnTenBestGamers;
}


function insertNewUser($mail, $firstName, $lastName, $pwd){
    $bdd = dbConnect();
    $query = 'INSERT INTO JOUEUR VALUES (:mail, :firstName, :lastName, :pwd)';
    $insertNewUserCommande = $bdd->prepare($query);

    $insertNewUserCommande->bindParam(':mail', $mail, PDO::PARAM_STR);
    $insertNewUserCommande->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $insertNewUserCommande->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $insertNewUserCommande->bindParam(':pwd', password_hash($pwd, PASSWORD_DEFAULT), PDO::PARAM_STR);

    $insertNewUserCommande->execute();
    $insertNewUserCommande->closeCursor();
}


function isItPlayerPassword($email, $pwd){
    $emailAVerifier = htmlspecialchars($email);
    $pwdAVerifier = htmlspecialchars($pwd);
    $bdd = dbConnect();
    $query = 'SELECT * FROM JOUEUR WHERE Email_Joueur = :email';
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':email', $emailAVerifier, PDO::PARAM_STR);
    $stmt->execute();
    $returnEmailGamers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($returnEmailGamers) > 0 && password_verify($pwdAVerifier, $returnEmailGamers[0]["Mdp_Joueur"])) {
        return true;
    }

    return false;
}



function deletePlayer($emailPlayer){
    $bdd = dbConnect();
    $deleteGamePlayer = "DELETE FROM COLLECTION WHERE Email_Joueur = :emailPlayer";
    $deleteGamePlayerCommand = $bdd->prepare($deleteGamePlayer);
    $deleteGamePlayerCommand->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $deleteGamePlayerCommand->execute();
    $deleteGamePlayerCommand->closeCursor();
    $deletePlayer = "DELETE FROM JOUEUR WHERE Email_Joueur = :emailPlayer";
    $deletePlayerCommand = $bdd->prepare($deletePlayer);
    $deletePlayerCommand->bindParam(':emailPlayer', $emailPlayer, PDO::PARAM_STR);
    $deletePlayerCommand->execute();
    $deletePlayerCommand->closeCursor();
}



function updatePlayer($email, $firstName, $lastName){
    $bdd = dbConnect();
    $query = "UPDATE JOUEUR SET Prenom_Joueur = :firstName, Nom_Joueur = :lastName WHERE Email_Joueur = :email";
    $updatePlayerCommand = $bdd->prepare($query);
    $updatePlayerCommand->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $updatePlayerCommand->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $updatePlayerCommand->bindParam(':email', $email, PDO::PARAM_STR);
    $updatePlayerCommand->execute();
    $updatePlayerCommand->closeCursor();
}

function updatePwdPlayer($email, $pwd){
    $bdd = dbConnect();
    $query = "UPDATE JOUEUR SET Mdp_Joueur = :pwd WHERE Email_Joueur = :email";
    $updatePlayerCommand = $bdd->prepare($query);
    $updatePlayerCommand->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    $updatePlayerCommand->bindParam(':email', $email, PDO::PARAM_STR);
    $updatePlayerCommand->execute();
    $updatePlayerCommand->closeCursor();
}

?>