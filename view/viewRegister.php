<!DOCTYPE HTML>
<html>
	<head>
		<title>Register</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="./assets/css/register.css" />
        <link rel="stylesheet" href="./assets/css/main.css" />
	</head>
    <body>
    <div class="flex-container">
        <form method="post" class="container">
            <h1 class="title">Inscritption</h1>
            <p class="info">Nom :</p>
            <input class="text" type="text" name="lastName" value="<?php echo $_ENV["LastName"] ?>">
            <p class="info">Prénom :</p>
            <input class="text" type="text" name="firstName" value="<?php echo $_ENV["FirstName"] ?>">
            <p class="info">Email :</p>
            <input class="text" type="text" name="email" value="<?php echo $_ENV["mail"] ?>">
            <p class="info">Mot de passe :</p>
            <input class="text" type="password" name="password" value="">
            <p class="info">Confirmation du mot de passe :</p>
            <input class="text" type="password" name="confPassword" value="">
            <button class="button" type="submit">S'inscrire</button>
            <br>
            <a href="./view/viewLogin.php" class="register">Se connecter</a>
        </form>
    </div>
    <?php require('./assets/footer.php'); ?>
    </body>
</html>



       