<?php
require './model/modelGameCollection.php';

$bestPlayers=getTenBestPlayers();

require './view/viewLeaderboard.php';
?>