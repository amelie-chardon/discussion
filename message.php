<form class="formulaire_message" method="post" action="discussion.php">
        <label for="message">Votre message (max. 1000 caractères) :</label>
        <textarea name="message" id="message" maxlength="1000" rows="3" required></textarea>
        <input type="submit" name="submit" id=submit value="Ajouter un message">
</form>


<?php
//On récupère l'identifiant de l'utilisateur connecté
$id=$_SESSION['login']; 

//Création de la connexion à a base de données
$connexion=mysqli_connect("localhost","root","","discussion");

//Préparation de la requete SQL
$requete="SELECT * FROM utilisateurs WHERE login=\"$id\"" ;

//Execution de la requête SQL
$query=mysqli_query($connexion,$requete);

//Récupération du résultat de la requête
$resultat=mysqli_fetch_assoc($query);

$id_utilisateur=$resultat["id"];

//On vérifie si le formulaire a déjà été envoyé
if(!isset($_POST["submit"]))
{
}
else
{ 
    //On récupère les données du formulaire
    $message=$_POST["message"];
    
    if($message!="")
    {
        //Préparation de la requête SQL pour ajouter le message à la bdd
        $insert="INSERT INTO messages (id, message, id_utilisateur, date) VALUES (NULL, \"$message\",\"$id_utilisateur\", CURRENT_DATE())";

        //Execution de la requête SQL pour màj les données dans la bdd
        $query_update=mysqli_query($connexion,$insert);
        header("Location: discussion.php");
    }
    else
    {
        ?><p>Veuillez entrer un message.</p><?php
    }    
}

?>

