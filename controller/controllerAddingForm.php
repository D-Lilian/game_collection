<?php
require './model/modelGameCollection.php';

if (!isset($_POST["addNewGame"])){
    $_POST["addNewGame"]="no";
}

if($_POST["addNewGame"]=="yes"){
    $name = htmlspecialchars($_POST["nameGame"]);
    $editor = htmlspecialchars($_POST["editor"]);
    $dateOfRelease = htmlspecialchars($_POST["date"]);
    $description = htmlspecialchars($_POST["description"]);
    $gamePictureUrl = htmlspecialchars($_POST["urlCover"]);
    $gameWebsiteUrl = htmlspecialchars($_POST["urlWebsite"]);

    $plateform="";
    if (isset($_POST['pc'])) $plateform.=" PC " ;
    if (isset($_POST['playstation'])) $plateform.=" Playstation " ;
    if (isset($_POST['xbox'])) $plateform.=" Xbox " ;
    if (isset($_POST['switch'])) $plateform.=" Switch " ;
    if (isset($_POST['mobile'])) $plateform.=" Mobile" ;

    insertNewGame($name,$editor,$plateform, $dateOfRelease, $description, $gamePictureUrl, $gameWebsiteUrl);
    header('Location: add');
}

require './view/viewAddingForm.php';
?>