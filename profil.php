<?php include('config.php'); 
$db = $_SESSION['db'];
$output = NULL;
$login = $_SESSION['login'];

if(isset($_POST['modif']))
{
    if(isset($_POST['login']))
    {
        if($_POST['login'] != $_SESSION['login'])
        {
            $id = $_SESSION['id'];
            $login = htmlspecialchars($_POST['login']);
            $query = "UPDATE utilisateurs SET login='$login' WHERE id='$id'";
            $execquery = mysqli_query($db, $query);
            $_SESSION['login'] = $login;
        }

    }

            if(isset($_POST['pass']))
            {
                $password = htmlspecialchars($_POST["pass"]);
                $password = password_hash($_POST['pass'],PASSWORD_BCRYPT);
                $id = $_SESSION['id'];
                $query = "UPDATE utilisateurs SET password='".$password."' WHERE id='$id'";
                $execquery = mysqli_query($db, $query);
                $_SESSION['password'] = $password;

            }

}
            
                    $admin_query= ("SELECT * FROM utilisateurs WHERE login = '$login'");
                    $exec_admin_query=mysqli_query($db,$admin_query);
                    $row= mysqli_fetch_array($exec_admin_query);

if(!isset($_SESSION['login']))
    {
        header('Location: connexion.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profil</title>
        <link rel="stylesheet" href="style.css">
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
        <div class="box2">
                <h4>Modifier votre profil</h4>
                <fieldset>
                <legend>Identifiants</legend>
                <form method="POST" action="profil.php">
                <div class="inputbox2">
                        <input type="text" name="login" value="<?php echo $row['login'] ?>" required>
                        <label>Pseudo</label>
                    </div>
                    <div class="inputbox2">
                        <input type="password" name="pass" required>
                        <label>Mot de passe</label>
                    </div>
                    <div class="inputbox2">
                        <input type="password" name="pass2" required>
                        <label>Confirmer mot de passe</label>
                    </div>
                </fieldset>
                <?php echo '<div style="color:white; text-align:center">'.$output.'</div>'?><br>
                <div class="bouton">
                <input type="submit" name="modif" value="Modifier">
                </div>
                </form>
        </div>
    </body>
</html>