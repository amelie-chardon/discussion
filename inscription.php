<?php 
session_start();
?>
<html>

<head>
<meta charset="utf-8">
<title>Inscription</title> <!-- Page d'inscription au site -->
    <link href="style.css" rel="Stylesheet">
    <link rel="short icon" href="img/logoprojet.png">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

</head>


<header>
<?php
 require ("nav.php"); 
?>
   
</header>

<body>
    <main>
<?php 
            if (isset($_SESSION["login"])) 
            {
              ?>
                <h1 class="error_already_co">Hey, <?php $_SESSION["login"] ?> Tu as déjà un compte, tu ne peux pas te réinscrire !<br></h1>
                <form action="index.php" method="post">
	            <input name="deconnexion" value="Deconnexion" type="submit" />
                </form>
             <?php


if (isset($_POST["deconnexion"]))
    {
 session_unset();
 session_destroy();
 header ('location:index.php');
    }
?>
<?php
            } 
            else 
            {
                ?>  
                <section>
                <h1> Inscription </h1>
   
                <form  action="inscription.php" method="post" class="formulaire">
                    <label>Ton login</label>
                    <input type="text" name="login" required>
                    <label>Ton password</label>
                    <input type="password" name="password" required>
                    <label>Encore</label>
                    <input type="password" name="password1" required>
                    <input id="submit"  type="submit" value="S'inscrire" name="valider">
                    </form>

                </section>
                 <?php
                 
                if (isset($_POST["valider"])) 
                {
                    $login = $_POST["login"];
                    $password = password_hash($_POST["password"], PASSWORD_BCRYPT, array('cost' => 6));
                    $connect = mysqli_connect("localhost", "root", "", "discussion");
                    $request = "SELECT login FROM utilisateurs WHERE login = '$login'";
                    $execute = mysqli_query($connect, $request);
                    $result = mysqli_fetch_all($execute);
                    if (!empty($result)) 
                    {
                    
                        echo "Non disponible, désolée..."; 
                    } 
                    elseif ($_POST["password"] != $_POST["password1"]) 
                    {
                        echo "Erreur";
                    } 
                    else 
                    {
                        $request_insert = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')";
                        $query = mysqli_query($connect, $request_insert);
                        header('Location:connexion.php');
                    }
                }
            }
            ?>
           </main>
<footer>
<p class="text_footer">Created by Amélie & Sarah | 2019</p>
</footer>
</body>
</html>

<?php
if (isset($_POST["deconnexion"]))
{
    session_unset();
    session_destroy();
}
?>