<!DOCTYPE HTML>
<html>
	<head>
		<title>Home page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="./assets/css/profil.css" />
        <link rel="stylesheet" href="./assets/css/main.css" />
	</head>
    <body> 
    <?php require('./assets/header.php'); ?>
    <div class="flex-container">
            <form method="post">
                <h1 class="title">Mon profil</h1>
                <p class="info">Nom :</p>
                <input class="text" type="text" name="lastName" value="<?php echo $_ENV["LastName"] ?>" minlength=1 maxlength=100>
                <p class="info">Prénom :</p>
                <input class="text" type="text" name="firstName" value="<?php echo $_ENV["FirstName"] ?>" minlength=1 maxlength=100>
                <p class="info">Email :</p>
                <input class="text" type="text" name="email" value="<?php echo $_ENV["mail"] ?>" minlength=1 maxlength=500>
                <p class="info">Mot de passe :</p>
                <input class="text" type="password" name="password" value="" minlength=1 maxlength=100>
                <p class="info">Confirmation du mot de passe :</p>
                <input class="text" type="password" name="confPassword" value="" minlength=1 maxlength=100>
                <button class="update" type="submit">MODIFIER</button>
                <button class="disconnect" type="submit">SE DÉCONNECTER</button>
                <button class="delete" type="submit">SUPPRIMER MON COMPTE</button>
            </form>
        </div>
    <?php require('./assets/footer.php'); ?>
    </body>
</html>