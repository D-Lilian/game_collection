<?php
session_start();

function secure($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if (isset($_POST['email'])){ 
    
    require("./model/modelGameCollection.php");

    
    $nom = $_POST['lastName'];
    $prenom = $_POST['firstName'];
    $Mail_Uti = $_POST['email'];
    
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
        insertNewUser($prenom, $Mail_Uti, $pwd, $prenom)
        $_SESSION["Mail_Uti"]=$Mail_Uti;
        header('index.php/user');
    }
}





    