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
if(isset($_POST["update_with_form"])){
    $prenom=htmlspecialchars($_POST["firstName"]);
    $nom=htmlspecialchars($_POST["lastName"]);
    $newMail=htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($UserInformation[0]["Mdp_Joueur"]);
    if (isset($_POST['password']) && isset($_POST['confPassword']) && $_POST['password']!="") {
        $password = secure($_POST['password']);
        $confPassword = secure($_POST['confPassword']);
        if ($password == $confPassword) {
            $pwd = password_hash($password, PASSWORD_DEFAULT); 
            updatePwdPlayer($_SESSION["Mail_Uti"], $pwd);
        } 
        else {
            header('Location: index.php/profil');
        }
    }
    updatePlayer($_SESSION["Mail_Uti"], $prenom, $nom, $newMail);
    var_dump($_POST);
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


