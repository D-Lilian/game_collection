<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Modifier les informations</title>
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/register.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <style>
        body {
            background: rgba(33, 31, 42, 1);
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            position: absolute;
            width: 50%;
            background-color: rgba(37, 40, 54, 1);
            border-radius: 20px;
            transform: translate(-50%, 50%);
            padding: 20px;
        }

        .title {
            margin-top: 0;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 200%;
        }

        .info {
            font-size: 16px;
        }

        .text {
            width: 100%;
            height: 40px;
            background: rgba(43, 47, 64, 1);
            border: none;
            margin-bottom: 10px;
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            color: rgba(255, 255, 255, 1);
        }

        .button {
            width: 100%;
            height: 40px;
            background: rgba(103, 87, 214, 1);
            border: none;
            border-radius: 10px;
            text-align: center;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
        }

        .login {
            display: block;
            margin-top: 10px;
            color: rgba(255, 255, 255, 1);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="container">
            <h1 class="title">Modifier les informations</h1>
            <p class="info">Nom :</p>
            <input class="text" type="text" name="lastName" value="<?php echo $_ENV["userLastName"] ?>">
            <p class="info">Prénom :</p>
            <input class="text" type="text" name="firstName" value="<?php echo $_ENV["$userFirstName"] ?>">
            <p class="info">Email :</p>
            <input class="text" type="text" name="email" value="<?php echo $_ENV["$userEmail"] ?>">
            <p class="info">Mot de passe :</p>
            <input class="text" type="password" name="password" value="<?php echo $_ENV["$userPassword"] ?>">
            <p class="info">Confirmation du mot de passe :</p>
            <input class="text" type="password" name="confPassword" value="<?php echo $_ENV["$userConfPassword"] ?>">
            <button class="button" type="submit">Enregistrer les modifications</button>
            <br>
            <a href="./view/viewLogin.php" class="login">Se connecter</a>
        </div>
    </form>
    <?php require('./assets/footer.php'); ?>
</body>
</html>
