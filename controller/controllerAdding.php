<?php
require './model/modelGameCollection.php';
session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);

if (!isset($_POST["nameOfGame"])){
    $games=getAllGames($currentEmail);
}
else{
    $games=getGamesWithSearch($currentEmail, $_POST["nameOfGame"]);
}

if (isset($_POST["idOfGame"])){
    insertLinkGamePlayer($currentEmail , $_POST["idOfGame"]);
    header('Location: home');
    exit();
}


require './view/viewAdding.php';
?>