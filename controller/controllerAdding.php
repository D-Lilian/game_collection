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
if ($_POST["idOfGame"]>0){
    header('Location: ./controller/controllerHome.php');
    exit();
}


require './view/viewAdding.php';
?>