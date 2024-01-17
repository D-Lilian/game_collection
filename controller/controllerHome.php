<?php
require './model/modelGameCollection.php';
session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);
$informationsOfPlayer=getGamerInformation($currentEmail);
$nom=strtoupper($informationsOfPlayer[0]["Nom_Joueur"]);
$prenom=$informationsOfPlayer[0]["Prenom_Joueur"];

$gamesOfPlayer=getGamesOfPlayer($currentEmail);

if(isset($_POST["addNewGame"])){
    header('Location: update');
}

if(isset($_POST["goToGame"])){
    $goToGame=htmlspecialchars($_POST["goToGame"]);
    header('Location: update?Id_Jeu='.$goToGame);
}

require './view/viewHome.php';
?>