<?php
require("vendor/autoload.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Your controller logic goes here
$action = isset($_GET['action']) ? $_GET['action'] : 'default';

switch ($action) {
    case 'addGame':
        // Handle form submission
        include('./controller/controllerHome.php');
        break;
    case 'default':
        // Default action
        include('./controller/controllerAdding.php');
        break;
    // Add more cases as needed
}

//require('./controller/controllerAdding.php');

?>