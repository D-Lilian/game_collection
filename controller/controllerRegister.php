<?php

var_dump($_POST);
if (isset($_POST['email'])){ 
    
    require("./model/modelGameCollection.php");
    //appel du modèle pour check si mail uti already used
    
    //appel du modèle pour insertion en db

    session_start();

    
    
    $nom = $_POST['lastName'];
    $prenom = $_POST['firstName'];
    $Mail_Uti = $_POST['email'];
    if (isAPlayerInDataBase($Mail_Uti)){//il y a deja un compte mais on gere pas encore le cas ou il a deja un compte
        require('./view/viewRegister.php');
    }else {

    $_SESSION ["Mail_Uti"]=$Mail_Uti;    
    $_GET['page']="login";
    header('index.php/login');
}
}





    