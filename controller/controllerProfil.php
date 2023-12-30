<?php
require './model/modelGameCollection.php';
function secure($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
$currentEmail=htmlspecialchars($_SESSION["Mail_Uti"]);
$UserInformation=getGamerInformation($currentEmail);
$prenom = $UserInformation[0]["Prenom_Joueur"];
$nom = $UserInformation[0]["Nom_Joueur"];
require './view/viewProfil.php';
if(isset($_POST["update"])){
    if (isset($_POST['password']) && isset($_POST['confPassword'])) {//secure
        $password = secure($_POST['password']);
        $confPassword = secure($_POST['confPassword']);
        if ($password == $confPassword) {
            $pwd = $password;
        } else {
            header('Location: index.php/profil');
        }
    }else{
        $pwd = $UserInformation[0]["Mdp_Joueur"];
    }
    updatePlayer($_SESSION["Mail_Uti"], $prenom, $nom, $pwd);
    header('Location: profil');
}

if(isset($_POST["delete"])){
    deletePlayer($_SESSION["Mail_Uti"]);
    header('Location: register');
    
    $_SESSION = array();
    session_destroy();
}

if(isset($_POST["disconnect"])){

// Détruisez toutes les variables de session et la session en elel même
    $_SESSION = array();
    session_destroy();
    header('Location: login');
}
?>


