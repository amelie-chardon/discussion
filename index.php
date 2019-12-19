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
<div id="wrapper">
    <div id="container">
<h1>Bienvenue sur le site d'Amelie et Sarah</h1>
</div>
</div>

         <?php 
         
            if (isset($_SESSION['login']))
            {

         ?>

<section class="zone_info_index">



    <h1>Nos coup de coeur</h1>
    

    <article>

<figure class="category">
    <div class="img" id="Hugo"></div>
    <figcaption class="caption-cat">Saumon avec legumes</figcaption>
    
</figure>
<figure class="category">
    <div class="img" id="Enzo"></div>
    <figcaption class="caption-cat">Soupe Potiron</figcaption>
    
</figure>
<figure class="category">
    <div class="img" id="Amar"></div>
    <figcaption class="caption-cat"> Cassoulet à l'agneau</figcaption>
    
</figure>
<figure class="category">
    
    <div class="img" id="Mimi"></div>
    <figcaption class="caption-cat">Pancakes Vegan</figcaption>
    
</figure>

</article>

<form  action="index.php" method="post">
	            <input name="deconnexion" value="Deconnecter" type="submit" id="deconnexion" />
                </form><br></p>
				
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
                <p>N'hésite pas à te connecter ou t'inscrire afin de voir notre selection de chef et de pouvoir participer à notre fil de discussion </p>
                <?php
            }
            ?>
</section>

</main>
<footer>
<p class="text_footer">Creat by Amelie & Sarah | 2019</p>

</footer>
</body>

</html>



