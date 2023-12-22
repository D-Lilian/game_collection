<?php
require './model/modelGameCollection.php';

//filter use, or not
if (!isset($_POST["nameOfGame"])){
    $games=getAllGames();
}
else{
    $games=getGamesWithSearch($_POST["nameOfGame"]);
}


//add a new game, add it
if (isset($_POST["idOfGame"])){
    insertLinkGamePlayer("liliane.daura@tg.com",$_POST["idOfGame"]);
    header('Location: home');
    exit();
}


require './view/viewAdding.php';
?>