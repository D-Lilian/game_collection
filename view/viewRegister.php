<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
        <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="./assets/css/register.css" />
        <link rel="stylesheet" href="./assets/css/main.css" />
	</head>
    <body>
        <form method="post">
            <div class="container">
                <h1 class="title">Inscritpion</h1>
                <p class="info">Nom :</p>
                <input class="text" type="text" name="lastName" >
                <p class="info">Prénom :</p>
                <input class="text" type="text" name="firstName" >
                <p class="info">Email :</p>
                <input class="text" type="text" name="email" >
                <p class="info">Mot de passe :</p>
                <input class="text" type="password" name="password" >
                <p class="info">Confirmation du mot de passe :</p>
                <input class="text" type="password" name="confPassword" >
                <button class="button" type="submit">S'ENSCRIRE</button>
                <br>
                <a href="./view/viewLogin.php" class="login">Se connecter</a>
            </div>
        </form>
        <?php require('./assets/footer.php'); ?>
    </body>
</html>