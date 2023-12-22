<?php
require('./vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if($_GET['page'] === 'register'){
    require('./controller/controllerRegister.php');
}

if($_GET['page'] === 'login'){
    require('./controller/controllerLogin.php');
}

if($_GET['page'] === 'home'){
    require('./view/viewHome.php');
}


?>