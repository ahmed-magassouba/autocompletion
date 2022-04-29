<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>

    <!-- link css-->
    <link rel="stylesheet" href="Css/home.css">

    <!-- link js-->
    <script src="Js/script.js" type="text/javascript"></script>
</head>

<body>
    <header>


    </header>

    <div class="message">
        <?php if (!empty($_SESSION['message'])) : ?>
            <div>
                <?php echo $_SESSION['message'];
                unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['erreur'])) : ?>
            <div>
                <?php echo $_SESSION['erreur'];
                unset($_SESSION['erreur']); ?>
            </div>
        <?php endif; ?>
    </div>

    <main>

        <form action="">
            <label for="search"></label>
            <input type="search" name="search" id="search">
            <input type="submit" name="submit" value="">
        </form>
    </main>

    <footer>

    </footer>
</body>

</html>