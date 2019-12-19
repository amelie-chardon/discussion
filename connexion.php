<?php 
session_start();
?>

<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Se connecter</title> <!-- Page pour se connecter au site -->
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<header>
<?php require ("nav.php");?>
</header>
<body>
<main>
<section>
<?php 
$connect = mysqli_connect("localhost", "root", "", "discussion");
if(isset($_SESSION['login']))
{
    ?>
    <h1 class="error_already_co"> Tu es déjà connecté ! </h1>
    <form action="index.php" method="post">
	<input type="submit" class="mybutton"  name="deco" value="Deconnexion" />
    </form>
    <?php
}
if(!isset($_SESSION['login'])) {
    ?>
    <h1> Connexion </h1>
    <form action="connexion.php" method="post" class="formulaire">
    <label>Login </label>
    <input name="login" type="text" required />
    <label>Password</label>
    <input name="password" type="password" required />
    <input id="submit"  name="connexion" value="Connexion" type="submit" />
    </form>
    <?php
}
if(isset($_POST['login'])&& isset($_POST['password']))
{
    $connect = mysqli_connect("localhost", "root", "", "discussion");
    $request = "SELECT * FROM utilisateurs WHERE login ='" .$_POST['login']. "'";
    $query = mysqli_query($connect, $request);
    $result = mysqli_fetch_array($query);
    if (!empty($result)) 
        {
        if (password_verify($_POST['password'], $result['password'])) 
            {
            $_SESSION['login'] = $_POST['login'];
            header('Location:index.php');
            }
        }
}


?>
</section>
</main>
<footer>
<p class="text_footer">Created by Amélie & Sarah | 2019</p>
</footer>
</body>
</html>
