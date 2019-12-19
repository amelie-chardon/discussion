<?php

if (isset($_SESSION['login']))
 {
?>

<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="profil.php">Profil</a></li>
        <li><a href="discussion.php">Le salon de discussion</a></li>
    </ul>
 </nav>
<?php 

}
else
 {
?>


<nav>
    <ul>
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="inscription.php"> Inscription</a></li>
            <li><a href="connexion.php"> Connexion</a></li>
            <li><a href="discussion.php"> Le salon de discussion</a></li>    
     </ul>
</nav>

<?php
 }
?>
