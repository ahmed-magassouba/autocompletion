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

<?php if (isset($_GET['id']) && !empty($_GET['id'])) :

    $id = strip_tags($_GET['id']);

    $sqlVerif = "SELECT * FROM `country` WHERE id = :id";

    //ON PREPARE LA REQUETE
    $requete = $bdd->prepare($sqlVerif);

    //ON EXECUTE LA REQUETE
    $requete->execute(array(':id' => $id));

    $select = $requete->fetch();


?>


    <div class="singlePage">
        <section class="image">
            <img src="Images/<?= $select['countryMapImage'] ?>" alt="">
        </section>
        <section class="description">
            <h3><?= $select['name'] ?></h3>

            <div>
                <span>
                   <p> Capitale</p>
                    <?= $select['capitalCity'] ?>
                </span>
                <span>
                    <p> Drapeau</p>
                    <img src="Images/<?= $select['flagImage'] ?>" alt="">
                </span>
                <span>
                   <p>Population</p> 
                    <?= $select['population'] ?>
                </span>
                <span>
                  <p>Superficie</p>  
                    <?= $select['area'] ?>
                </span>
                <span>
                    <p>Devise</p>  
                    <?= $select['currency'] ?>
                </span>

            </div>

            <span>
                <p>Description</p>
                <hr>
                <?= $select['description'] ?>
           </span> 


        </section>
        <!-- <?php var_dump($select);  ?> -->
    </div>



<?php else : ?>
    <?php header('Location: ../index.php')    ?>
<?php endif ?>