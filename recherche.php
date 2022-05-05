<?php
require_once 'includes/header.php';
//constante d'envoronnement
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "autocompletion");

//DSN de connexion (data source name)
$dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;

// on va se connecter a la base a travers un try catch pour gerer l'exeption levé par pdo
try {
    //on va instancie PDO
    $bdd = new PDO($dsn, DBUSER, DBPASS);

    //On s'assure d'envoyer les données en utf8
    $bdd->exec("SET NAMES utf8");

    //on definit le mode de fetch par defaut
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur de connexion a la base: " . $e->getMessage());
}

?>

<?php if (isset($_GET['search']) && !empty($_GET['search'])) :

    $search = strip_tags($_GET['search']);

    $sqlVerif = "SELECT * FROM `country` WHERE name LIKE :search ORDER BY name ";

    //ON PREPARE LA REQUETE
    $requete = $bdd->prepare($sqlVerif);

    //ON EXECUTE LA REQUETE
    $requete->execute(array(':search' => '%' . $search . '%'));



    $select = $requete->fetchAll();

?>

    <?php foreach ($select as $value) : ?>
        <a href="element.php?id=<?= $value['id'] ?>">
            <img src="images/<?= $value['flagImage'] ?>" alt="">
            <span><?= $value['name'] ?></span>
        </a>
    <?php endforeach ?>











    <!-- <a href="element.php?<?= 'id' ?>"><?= $_GET['search'] ?></a> -->
<?php else : ?>
    <?php header('Location: ../index.php')    ?>
<?php endif ?>