<?php 
session_start();
?>


<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Accueil</title> <!-- Page d'accueil -->
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

</head>
<body>

<header>
        <?php require ("nav.php")?>
</header>

<main class="accueil">
<h1>Bienvenue sur le site d'Amélie et Sarah</h1>

<?php 
if (isset($_SESSION['login']))
{

?>

<section class="zone_info_index">

<h1>Nos coups de coeur</h1>

<article>

<figure class="category">
    <div class="img" id="img1"></div>
    <figcaption class="caption-cat">Saumon avec légumes</figcaption>
    
</figure>
<figure class="category">
    <div class="img" id="img2"></div>
    <figcaption class="caption-cat">Soupe potiron</figcaption>
    
</figure>
<figure class="category">
    <div class="img" id="img3"></div>
    <figcaption class="caption-cat"> Cassoulet à l'agneau</figcaption>
    
</figure>
<figure class="category">
    <div class="img" id="img4"></div>
    <figcaption class="caption-cat">Pancakes vegan</figcaption>
    
</figure>

</article>

<form  action="index.php" method="post">
<input name="deconnexion" value="Déconnexion" type="submit" id="deconnexion" />
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
                <p>N'hésite pas à te <a href="connexion.php">connecter</a> ou t'<a href="inscription.php">inscrire</a> afin de voir notre selection de chef et de pouvoir participer à notre fil de discussion </p>
                <?php
            }
            ?>
</section>

</main>
<footer>
<p class="text_footer">Created by Amélie & Sarah | 2019</p>
</footer>
</body>
</html>



