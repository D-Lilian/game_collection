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
            <h1><?php echo $game[0]['Nom_Jeu']; ?></h1>
            <p><?php echo $game[0]['Desc_Jeu']; ?></p>
            <br>
            <p>Temps passé : <?php echo $game[0]['Nb_Heure']; ?> h</p>
            <br>
            <p><?php echo $game[0]['Plateforme_Jeu']; ?></p>
            <br><br>
            <h2>Ajouter du temps passé sur le jeu</h2>
            <br>
            <p class="info">Temps passé sur le jeu</p>
            <input class="text" type="number" name="timeSpendOnGame" value="<?php echo $game[0]['Nb_Heure']; ?>" min=0 maxlength=100
                required>
            <button class="update" name="update" value="yes" type="submit">AJOUTER</button>
            <button class="delete" name="delete" value="yes" type="submit">SUPPRIMER LE JEU DE MA BIBLIOTHEQUE</button>
        </form>
        <div class="image-container">
            <a href="<?php echo $game[0]['Url_Site_Jeu']; ?>">
            <img src="<?php echo $game[0]['Url_Cover_Jeu']; ?>" alt="image de <?php echo $game[0]['Nom_Jeu']; ?>" class="side-image">
            </a>
        </div>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>


