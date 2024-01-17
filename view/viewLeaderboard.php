<!DOCTYPE HTML>
<html>

<head>
    <title>Home page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/leaderboard.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <?php require('./assets/header.php'); ?>
    <div class="flex-container">
        <h1 class="title">Classement des temps passés</h1>
        <table id="board">
            <tbody>
                <tr>
                    <td>Joueur</td>
                    <td>Temps passé</td>
                    <td>Jeu Favori</td>
                </tr>
                <?php
                    foreach ($bestPlayers as $player){
                ?>
                    <tr>
                        <td><?php echo($player["Prenom_Joueur"]." ".strtoupper($player["Nom_Joueur"])) ?></td>
                        <td><?php echo($player["TempsDeJeuTotal"]) ?></td>
                        <td><?php echo($player["JeuPrefere"]) ?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>