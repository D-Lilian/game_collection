<!DOCTYPE HTML>
<html>

<head>
    <title>Home page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/home.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <?php require('./assets/header.php'); ?>
    <div class="banner">
        <br>
        <div class="nonBanner">SALUT liliane.daura@tg.com
            <br>PRÊT A AJOUTER DES
            <br>JEUX A TA COLLECTION ?
        </div>
    </div>
    <div>

    </div>
    <div>
        <div class="myGames">
            <h1>Mes jeux</h1>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <?php
                    //var_dump($games);
                    foreach ($gamesOfPlayer as $game){
                    ?>
                        <div class="col-4">
                            <!-- Box -->
                            <section>
                                <form method="post">
                                    <input type="hidden" name="goToGame" value="<?php echo $game['Id_Jeu']; ?>">
                                    <button class="boxcontainer" type="submit" style="background-image: url('<?php echo $game['Url_Cover_Jeu']; ?>');">
                                        <div class="content">
                                            <div class="text">
                                                <h2><?php echo $game["Nom_Jeu"]?></h2>
                                                <div>
                                                    <p class="platform"><?php echo $game["Plateforme_Jeu"]?></p>
                                                    <p class="hours"><?php echo $game["Nb_Heure"]?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </section>
                        </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>