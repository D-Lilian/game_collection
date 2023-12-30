<?php
require './model/modelGameCollection.php';

session_start();
$UserInformation=getGamerInformation($_SESSION["Mail_Uti"]);
$_SESSION["prenom"] = $UserInformation[0]["Prenom_Joueur"];
$_SESSION["Nom"] = $UserInformation[0]["Nom_Joueur"];
require './view/viewProfil.php';



if(isset($_POST["update"])){
    if (isset($_POST['password']) && isset($_POST['confPassword'])) {
        $password = $_POST['password'];
        $confPassword = $_POST['confPassword'];
        if ($password == $confPassword) {
            $pwd = $password;
        } else {
            header('Location: index.php/profil');
        }
    }


    /*modele ($_POST["mail"],$_POST["lastName"],$_POST["firstName"],$pwd)*/
    header('Location: profil');
}

if(isset($_POST["delete"])){
    /*modele delete pwd avec mail en parametre*/ 
    header('Location: register');
}

if(isset($_POST["disconnect"])){

// Détruisez toutes les variables de session et la session en elel même
    $_SESSION = array();
    session_destroy();
    header('Location: login');
}
?>