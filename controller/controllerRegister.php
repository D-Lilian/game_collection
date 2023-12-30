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
        
    $Nom = $_POST['lastName'];
    $Prenom = $_POST['firstName'];
    $Mail_Uti = $_POST['email'];
    $_SESSION["Nom"] = $nom;
    $_SESSION["Preom"] = $prenom;
    if (isset($_POST['password']) && isset($_POST['confPassword'])) {
        $password = $_POST['password'];
        $confPassword = $_POST['confPassword'];
        if ($password == $confPassword) {
            $pwd = $password;
            echo "Les mots de passe sont identiques.";
        } else {
            header('Location: index.php/login');
        }
    }
    if (isAPlayerInDataBase($Mail_Uti)){
    header('index.php/login');
    }else {
        insertNewUser($nom, $Mail_Uti, $pwd, $prenom);
        $_SESSION["Mail_Uti"]=$Mail_Uti;
        header('index.php/user');
    }
}





    