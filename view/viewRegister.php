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
            <input class="text" type="text" name="lastName" value="" minlength=1
                maxlength=100>
            <p class="info">Prénom :</p>
            <input class="text" type="text" name="firstName" value="" minlength=1
                maxlength=100>
            <p class="info">Email :</p>
            <input class="text" type="text" name="email" value="" minlength=1 maxlength=500>
            <p class="info">Mot de passe :</p>
            <input class="text" type="password" name="password" value="" minlength=1 maxlength=100>
            <p class="info">Confirmation du mot de passe :</p>
            <input class="text" type="password" name="confPassword" value="" minlength=1 maxlength=100>
            <button class="button" type="submit">S'INSCRIRE</button>
            <br>
            <button class="button" name="login" id="login" value="yes" type="submit">Se connecter</a>
        </form>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>