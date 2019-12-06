<?php include("config.php");

    $db = $_SESSION['db'];
    if(isset($_GET['disc']))
    {
    session_destroy();
    header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cinécritic</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>
        <div class="menu-wrap">
            <input type="checkbox" class="toggler">
            <div class="hamburger">
                <div></div>
            </div>
            <div class="menu">
                <div>
                    <div>
                        <ul>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="livre-or.php">Livre d'or</a></li>
                            <?php 
                                if(isset($_SESSION['login'])){?>
                            <li><a href="commentaire.php">Ajouter un commentaire</a></li>
                            <li><a href="profil.php">Profil</a></li>
                            <li><a href="index.php?disc">Déconnecter</a></li>
                                <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="hamburger_menu"></div>
    </div>

    <?php 
    if(!isset($_SESSION['login']))
    { ?>
    <main>
        <div id="main_t"><h1>Bienvenue</h1></div>
        <div id="main_button">
            <div id="button1" id="button_border"><a href="connexion.php"><input type="submit" name="submit" value="Se connecter"></a></div>
            <div id="button2"><a href="inscription.php"><input type="submit" name="submit" value="Pas inscrit ?"></a></div>
        </div>
    </main>
    <?php } 
    else
    { $pseudo = $_SESSION['login'];?>
    <main>
        <div id="main_t"><h1>Bienvenue <br><?php echo $pseudo ?></h1></div>
    </main>
    <?php } ?>

    <section id="section1">
        <div id="present">
            <fieldset><legend>Mettez-votre avis</legend>
               <p>L'objectif de ce site est de permettre à tous nos visiteurs de donner leurs avis
               sur les derniers gros succés du cinéma sous forme de post que nous vous invitons
               à essayer une fois inscrit sur notre site et ainsi vous pourrez voir les avis d'autres cinéphiles !</p> 
            </fieldset>
        </div>
    </section>
    <section id="section2">
        <div id="descript"><fieldset><legend>Livre d'or</legend>
               <p>Joker</p> 
            </fieldset></div>
        <div id="affiche"></div>
        <div id="section2_button"><a href="livre-or.php"><input type="submit" name="submit" value="Voir le livre d'or"></a></div>
    </section>
</body>
</html>