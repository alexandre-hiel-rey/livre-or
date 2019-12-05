<?php include("config.php");
    $output= NULL;
    if(!isset($_SESSION['login']))
    {
        header('Location: connexion.php');
    }

    $output= NULL;
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $id = $_SESSION['id'];
    if(isset($_POST["titre"]) && isset($_POST["comment"]))
    {
        if(!empty($_POST["titre"]) && !empty($_POST["comment"]))
        {
            $titre = $mysqli->real_escape_string($_POST["titre"]);
            $message = $mysqli->real_escape_string($_POST["comment"]);

            if(strlen($titre)>=22)
            {
                $output = "Titre trop long merci de faire plus court";
            }

            else
            {
            $query = "INSERT INTO commentaires (titre, commentaire, id_utilisateur, date) VALUES ('$titre','$message', '$id', NOW())";
            $result = mysqli_query($mysqli, $query);
            }
        } 
        header("Location: livre-or.php");   
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Commentaire</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="box">
            <h2>Commentaire</h2>
            <form method="POST">
                <div class="inputbox">
                    <input type="text" name="titre" required>
                    <label>Titre</label>
                </div>
                <textarea type="text" name="comment" required style= resize:none;width:415px;height:150px;color:white;background:transparent;></textarea>
                <div class="error_and_button">
                <?php echo '<div style="color:white; text-align:center">'.$output.'</div>'?><br>
                <input type="submit" name="submit" value="Valider">
                </div>
                <div class="link">
                    <h3><a href="index.php">Accueil</a><h3>
                </div>
            </form>
        </div>
    </body>
</html>