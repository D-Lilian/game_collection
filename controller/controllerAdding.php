<?php
require './model/modelGameCollection.php';
session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);

//filter use, or not
if (!isset($_POST["nameOfGame"])){
    $games=getAllGames($currentEmail);
}
else{
    $games=getGamesWithSearch($currentEmail, $_POST["nameOfGame"]);
}


//add a new game, add it
if (isset($_POST["idOfGame"])){
    insertLinkGamePlayer($currentEmail , $_POST["idOfGame"]);
    header('Location: home');
    exit();
}


require './view/viewAdding.php';
?>