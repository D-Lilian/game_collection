<!DOCTYPE HTML>
<html>

<head>
    <title>Home page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/update.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <?php require('./assets/header.php'); ?>
    <div class="flex-container">
        <form method="post">
            <br><br><br>
            <h1>Name of the game</h1>
            <p>Description</p>
            <br>
            <p>Temps passé : </p>
            <br>
            <p>Platform</p>
            <br><br>
            <h2>Ajouter du temps passé sur le jeu</h2>
            <br>
            <p class="info">Temps passé sur le jeu</p>
            <input class="text" type="text" name="lastName" value="last number of hours" minlength=1 maxlength=100
                required>
            <button class="update" type="submit">AJOUTER</button>
            <button class="delete" type="submit">SUPPRIMER LE JEU DE MA BIBLIOTHEQUE</button>
        </form>
        <div class="image-container">
            <img src="./assets/pictures/home_picture.png" class="side-image">
        </div>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>