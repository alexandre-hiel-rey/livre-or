<?php include("config.php");

    $db = $_SESSION['db'];
    $requete = "SELECT commentaires.titre, commentaires.commentaire, commentaires.date, utilisateurs.id, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY commentaires.id DESC";
    $recup = mysqli_query($db, $requete);
    $result = mysqli_fetch_all($recup);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body>
    <main id="livreor">
    <div id="h_menu">
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
        if(!empty($result))
        {
            $i = 0;
            foreach($result as $key)
            {
                $titre = $result[$i][0];
                $message = $result[$i][1];
                $date = $result[$i][2];
                $iduser = $result[$i][3];
                $user = $result[$i][4];
                
                ?>
                <div class="post">
                    <div class="head_com">
                        <div class="pseudo"><?php echo $user?></div>
                        <div class="titre"><?php echo $titre?></div>
                        <div class="date_post"><?php echo $date?></div>
                    </div>
                    <div class="commentaire"><?php echo $message?></div>
                </div>


                <?php
            $i++;
            }
        }
        else
        {
            echo "<p style=\"text-align: center;color:white;font-size:50px\">Il n'y a pas d'avis actuellement.</p>";
        }
        ?>
    </main>
</body>
</html>
