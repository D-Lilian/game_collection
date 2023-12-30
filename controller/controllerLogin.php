<?php

function secure($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$erreur="";

if(isset($_POST['email']) && $_POST['email'] != null && isset($_POST['password']) && $_POST['password'] != null){

    require('./model/modelGameCollection.php');
    $email = secure($_POST['email']);
    $pwd = secure($_POST['password']);
    if(isItPlayerPassword($email, $pwd)){
        session_start();
        $_SESSION["Mail_Uti"] = $email;
        header('Location: home');
    }else{
        $erreur="Mauvaise adresse mail ou mot de passe";
        require('./view/viewLogin.php');
    }
} else{
    require('./view/viewLogin.php');
}
?>
