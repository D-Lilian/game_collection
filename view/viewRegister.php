<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="./assets/css/login.css" />
        <link rel="stylesheet" href="./assets/css/main.css" />
	</head>
    <body>
        <form method="post">
        <div class="container">
            <h1 class="title">Modifier les informations</h1>
            <p class="info">Nom :</p>
            <input class="text" type="text" name="lastName" value="<?php echo $_ENV["LastName"] ?>">
            <p class="info">Prénom :</p>
            <input class="text" type="text" name="firstName" value="<?php echo $_ENV["$FirstName"] ?>">
            <p class="info">Email :</p>
            <input class="text" type="text" name="email" value="<?php echo $_ENV["$mail"] ?>">
            <p class="info">Mot de passe :</p>
            <input class="text" type="password" name="password" value="">
            <p class="info">Confirmation du mot de passe :</p>
            <input class="text" type="password" name="confPassword" value="">
            <button class="button" type="submit">Enregistrer les modifications</button>
            <br>
            <a href="./view/viewLogin.php" class="login">Se connecter</a>
        </div>
        </form>
        <?php require('./assets/footer.php'); ?>
    </body>
</html>



       