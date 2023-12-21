<!DOCTYPE HTML>
<html>

<head>
    <title>Home page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.00, user-scalable=yes" />
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/addingForm.css" />
    <link rel="stylesheet" href="./assets/css/main.css" />
</head>

<body>
    <?php require('./assets/header.php'); ?>
    <div class="flex-container">
        <form method="post">
            <h1 class="title">Ajouter un jeu à sa bibliothèque</h1>
            <p>Le jeu que vous souhaitez ajouter n'existe pas ! Vous pouvez le créer, celui-ci sera automatiquement
                ajouter à votre bibliothèque !</p>
            <br><br>
            <p class="info">Nom du jeu :</p>
            <input class="text" type="text" name="nameGame" placeholder="Nom du jeu" minlength=1 maxlength=200 required>
            <p class="info">Editeur du jeu :</p>
            <input class="text" type="text" name="editor" placeholder="Editeur de jeu" minlength=1 maxlength=200
                required>
            <p class="info">Sortie du jeu :</p>
            <input class="text" type="date" name="date" required>
            <h3 class="info">Platefomes :</h3>
            <p class="info">PC :</p>
            <label class="container">
                <input class="checkbox" type="checkbox" name="pc" checked>
                <span class="checkmark"></span>
            </label>
            <p class="info">Playstation :</p>
            <label class="container">
                <input class="checkbox" type="checkbox" name="playstation">
                <span class="checkmark"></span>
            </label>
            <p class="info">Xbox :</p>
            <label class="container">
                <input class="checkbox" type="checkbox" name="xbox">
                <span class="checkmark"></span>
            </label>
            <p class="info">Nintendo :</p>
            <label class="container">
                <input class="checkbox" type="checkbox" name="switch">
                <span class="checkmark"></span>
            </label>
            <p class="info">Mobile :</p>
            <label class="container">
                <input class="checkbox" type="checkbox" name="mobile">
                <span class="checkmark"></span>
            </label>
            <p class="info">Description du jeu :</p>
            <input class="description" type="textarea" name="description" placeholder="Description du jeu" required>
            <p class="info">URL de la cover :</p>
            <input class="text" type="url" name="urlCover" placeholder="URL de la cover" minlength=1 maxlength=500
                required>
            <p class="info">URL du site :</p>
            <input class="text" type="url" name="urlWebsite" placeholder="URL du site" minlength=1 maxlength=500
                required>
            <button class="button" type="submit">AJOUTER LE JEU</button>
        </form>
    </div>
    <?php require('./assets/footer.php'); ?>
</body>

</html>