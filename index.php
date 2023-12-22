<?php
require('./vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if($_GET['page'] === 'login' || $_GET['page'] == null || isset($_GET['page'])){
    require('./controller/controllerLogin.php');
}

if($_GET['page'] === 'register'){
    require('./controller/controllerRegister.php');
}

if($_GET['page'] === 'home'){
    require('./view/viewHome.php');
}

if($_GET['page'] === 'add'){
    require('./controller/controllerAdding.php');
}

if($_GET['page'] === 'addgame'){
    require('./controller/controllerAddingForm.php');
}

if($_GET['page'] === 'user'){
    require('./controller/controllerUser.php');
}

if($_GET['page'] === 'update'){
    require('./controller/controllerUpdate.php');
}

if($_GET['page'] === 'leaderboard'){
    require('./controller/controllerLeaderboard.php');
}

?>