<?php
require './model/modelGameCollection.php';

$bestPlayers=getBestPlayers();

require './view/viewLeaderboard.php';
?>