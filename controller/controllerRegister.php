<?php
session_start();
require './view/viewRegister.php';
require("./model/modelGameCollection.php");

function secure($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['email'])){ 
        
    $Nom = secure($_POST['lastName']);
    $Prenom = secure($_POST['firstName']);
    $Mail_Uti = secure($_POST['email']);
    $_SESSION["Nom"] = $Nom;
    $_SESSION["Preom"] = $Prenom;
    if (isset($_POST['password']) && isset($_POST['confPassword'])) {
        $password = secure($_POST['password']);
        $confPassword = secure($_POST['confPassword']);
        if ($password == $confPassword) {
            $pwd = $password;
            echo "Les mots de passe sont identiques.";
        } else {
            header('Location: register');
        }
    }
    if (isAPlayerInDataBase($Mail_Uti)){
        header('Location: login');    
    }else {
        insertNewUser($Mail_Uti, $Prenom, $Nom,  $pwd);
        $_SESSION["Mail_Uti"]=$Mail_Uti;
        header('Location: profil');    
    }
}





    