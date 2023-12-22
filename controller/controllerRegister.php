<?php



session_start();

$nom = $_POST['lastName'];
$prenom = $_POST['firstName'];
$Mail_Uti = $_POST['email'];

//appel du modèle pour check si mail uti already used
//appel du modèle pour insertion en db

if (true){
$_SESSION ["Mail_Uti"]=$Mail_Uti;
}
require('../view/viewLogin.php');





    