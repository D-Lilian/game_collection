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
    <div class="flex-container">
        <form method="post" class="container">
            <h1 class="title">Se connecter à Game Collection</h1>
            <p class="info">Email :</p>
            <input class="text" type="email" name="email" values="<?php if (isset($_SESSION['Mail_Uti'])) { echo $_SESSION["Mail_Uti"]; }?> "minlength=1 maxlength=500 required>
            <p class="info">Mot de passe :</p>
            <input class="text" type="password" name="password" minlength=1 maxlength=100 required>
            <button class="button" type="submit">SE CONNECTER</button>
            <br>
            <a href="register" class="register">S'inscrire</a>
        </form>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>