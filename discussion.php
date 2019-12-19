<?php

//Démarrage de la session
session_start();

//Création de la connexion à a base de données
$connexion=mysqli_connect("localhost","root","","discussion");

//Préparation de la requête SQL
$requete="SELECT * FROM messages RIGHT JOIN utilisateurs ON utilisateurs.id=messages.id_utilisateur ORDER BY messages.date DESC";

//Execution de la requête SQL
$query=mysqli_query($connexion,$requete);

?>

<!DOCTYPE html>

<html lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Discussion</title> <!-- Page discussion -->
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <?php require ("nav.php");?>
</header>
<main class="discussion">
<h1>Discussion</h1>
<section class="messages">
    <?php

//On récupère l'identifiant de l'utilisateur connecté
if(isset($_SESSION['login']))
{
    $id=$_SESSION['login'];
}

while ($messages = (mysqli_fetch_all($query)))
{
    foreach ($messages as $message)
    {
        if($message[0]!=null)
        {
            $date=date('d/m/Y', strtotime($message[3]));
            ?>
            <p class="titre_message">Posté le <?php echo $date ?> par <?php echo $message[5]?></p>
            <p class="texte_message"><?php echo $message[1]?></p><?php

            
            //Si un message a été posté par l'utilisateur connecté
            if(isset($_SESSION['login']) and $message[5]==$id)
            {
                //L'utilisateur peut supprimer son message
                ?>
                <form method="post" action="discussion.php" id="suppression">
                <button type="submit" id="submit" name="<?php echo $message[0] ?>">Supprimer le message</button>
                </form>
                <?php
            }
            if (isset($_POST["$message[0]"]))
            {
                $suppr="DELETE FROM messages WHERE id=$message[0]";
                $result=mysqli_query($connexion,$suppr);
                header('Location:discussion.php');
                unset($_POST);
            }
        }
    }
}

    ?>
</section>

<?php
if($_SESSION==NULL)
{
    ?><p>Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de laisser votre message.</p><?php
}
else
{
    include "message.php";
}

?>

</main>
<footer>
<p class="text_footer">Created by Amélie & Sarah | 2019</p>
</footer>
</body>
</html>



