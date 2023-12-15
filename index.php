<?php
require("vendor/autoload.php");

require('./vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require('./view/viewLogin.php');

?>