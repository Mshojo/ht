<html>
<head>
</head>
<body>
#oubli mot de passe

<?php 
if (isset($_POST['email']))
{
     $lemail=$_POST['email'];
     echo "le formulaire a été envoyé avec comme email la valeur :".$lemail;
     include "_conf.php";
    if($connexion=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
	    echo "<br>connexion OK<br>";
        $requete="Select * from utilisateur WHERE email='$lemail'";
        $resultat = mysqli_query($connexion, $requete);
        $login=0;
	        while($donnees = mysqli_fetch_assoc($resultat))
	        {
		        $login =$donnees['id']; //mettre le nom du champ dans la table
		        $mdp =$donnees['motdepasse'];	
	        }
    if ($login==0)
    {
        echo "<br> erreur l'email n'est pas présent dans la BDD <br>";
    }
    else {
	     echo "<br> mot de passe = $mdp";
     $to      = $lemail;
     $subject = 'Mot de passe perdu';
     $message = 'Bonjour ! voici votre mot de passe : '.$mdp;


     mail($to, $subject, $message);
    }
	


    }
    else {
	    echo "erreur de connexion";
    }

}
else
{
	
    ?>
    <br>
    <form action="oubli.php" method="post">
    email : <input type="text" name="email"><br>

    <input type="submit" value="Confirmer" name="bouton">
    </form>
    <?php
}
?>


</body>
</html>