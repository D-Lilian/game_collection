<?php
require './model/modelGameCollection.php';
session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);

$Id_Jeu=htmlspecialchars($_GET["Id_Jeu"]);
$game=getGamePlayer($currentEmail, $Id_Jeu);

if(isset($_POST["update"])){
    $timeSpendOnGame=htmlspecialchars($_POST["timeSpendOnGame"]);
    updateTimeGamePlayer($currentEmail ,$Id_Jeu, $timeSpendOnGame);
    header('Location: home');
}

if(isset($_POST["delete"])){
    deleteLinkGamePlayer($currentEmail ,$Id_Jeu);
    header('Location: home');
}

require './view/viewUpdate.php';
?>