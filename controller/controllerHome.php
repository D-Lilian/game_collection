<?php
require './model/modelGameCollection.php';
session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);

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