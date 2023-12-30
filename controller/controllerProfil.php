<?php
require './model/modelGameCollection.php';

session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);
$UserInformation=getGamerInformation($currentEmail);
$prenom = $UserInformation[0]["Prenom_Joueur"];
$nom = $UserInformation[0]["Nom_Joueur"];
require './view/viewProfil.php';
if(isset($_POST["update"])){
    if (isset($_POST['password']) && isset($_POST['confPassword'])) {//secure
        $password = $_POST['password'];
        $confPassword = $_POST['confPassword'];
        if ($password == $confPassword) {
            $pwd = $password;
        } else {
            header('Location: index.php/profil');
        }
    }else{
        $pwd = $UserInformation[0]["Mdp_Joueur"];
    }
    updatePlayer($_SESSION["Mail_Uti"], $prenom, $nom, $pwd)
    header('Location: profil');
}

if(isset($_POST["delete"])){
    header('Location: register');
}

if(isset($_POST["disconnect"])){

// Détruisez toutes les variables de session et la session en elel même
    $_SESSION = array();
    session_destroy();
    header('Location: login');
}
?>