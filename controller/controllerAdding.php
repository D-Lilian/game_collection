<?php
require './model/modelGameCollection.php';

if (!isset($_POST["nameOfGame"])){
    $games=getAllGames();
}
else{
    $games=getGamesWithSearch($_POST["nameOfGame"]);
}


require './view/viewAdding.php';
?>