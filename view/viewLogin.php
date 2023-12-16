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
                <h1 class="title">Se connecter a Game Collection</h1>
                <p class="info">Email :</p>
                <input class="text" type="text" name="email" >
                <p class="info">Mot de passe :</p>
                <input class="text" type="password" name="password" >
                <button class="button" type="submit">SE CONNECTER</button>
                <br>
                <a href="./assets/register.php" class="register">S'inscrire</a>
            </div>
        </form>
        <?php require('./assets/footer.php'); ?>
    </body>
</html>