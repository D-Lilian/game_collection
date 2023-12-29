<?php
require './model/modelGameCollection.php';

$gamesOfPlayer=getGamesOfPlayer("liliane.daura@tg.com");

if(isset($_POST["addNewGame"])){
    header('Location: update');
}

if(isset($_POST["goToGame"])){
    $goToGame=htmlspecialchars($_POST["goToGame"]);
    header('Location: update?'.$goToGame);
}

require './view/viewHome.php';
?>