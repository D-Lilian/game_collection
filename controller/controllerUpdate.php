<?php
require './model/modelGameCollection.php';

$Id_Jeu=htmlspecialchars($_GET["Id_Jeu"]);
$game=getGamePlayer("liliane.daura@tg.com", $Id_Jeu);

if(isset($_POST["update"])){
    $timeSpendOnGame=htmlspecialchars($_POST["timeSpendOnGame"]);
    updateTimeGamePlayer("liliane.daura@tg.com",$Id_Jeu, $timeSpendOnGame);
    header('Location: home');
}

if(isset($_POST["delete"])){
    deleteLinkGamePlayer("liliane.daura@tg.com",$Id_Jeu);
    header('Location: home');
}

require './view/viewUpdate.php';
?>