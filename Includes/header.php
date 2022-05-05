<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?= isset($title) ? $title : 'Recherche' ?> </title>
    <!-- link css -->
    <link rel="stylesheet" href="Css/header.css">
    <link rel="stylesheet" href="Css/footer.css">

    <!-- link js-->
    <script src="Js/script.js" type="text/javascript"></script>

</head>

<body>

    <header>

        <img class='logo' src="Images/logo2.png" alt="">
        <section>
            <form action="recherche.php" method="get">
                <input type="search" name="search" id="search" placeholder="Rechercher un pays" value="<?= isset($_GET['search'])? strip_tags($_GET['search']):'' ?>">
                <button type="submit">
                    <img src="Images/loupe.png" alt="">
                </button>

            </form>

            <div>
                <span id="searchResult"></span>
                <span id="searchSuggestion"></span>
            </div>
        </section>

     
    </header>
   <hr>
    <!-- <div class="message">

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

    </div> -->


    <main>