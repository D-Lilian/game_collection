<!DOCTYPE HTML>
<html>

<head>
    <title>Home page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/adding.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <?php require('./assets/header.php'); ?>
    <div>
        <div class="myGames">
            <h1>Ajouter un jeu à sa bibliothèque</h1>
        </div>
        <div class="myGames">
            <form method="post">
                <input class="textAdd" type="text" name="nameOfGame" placeholder="Rechercher un jeu">
                <button class="button" type="submit">RECHERCHER</button>
            </form>
        </div>
    </div>
    </div>
    <div>
        <div class="myGames">
            <h1>Mes jeux</h1>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <section>
                            <!-- Box -->
                            <div class="boxcontainer">
                                <div class="content">
                                    <div class="text">
                                        <h2>name of the game</h2>
                                        <div>
                                            <p class="platform">Pc, Xbox serie X, Xbox serie S, Sbox one, Playstation 4,
                                                Playstation 5, Nintendo Switch, Android phone, IOS phone</p>
                                            <button class="button" type="submit">AJOUTER A LA BIBLIOTHÈQUE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>