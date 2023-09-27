<?php
session_start();
include '_conf.php';

if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
    $num = $_GET['id'];
    $requete = "SELECT CR.description FROM CR WHERE CR.num = $num;";
    $resultat = mysqli_query($connexion, $requete);
    while($donnees = mysqli_fetch_assoc($resultat))
    {
        $descri = $donnees['description'];   
    }
}

?>

<html>
<head>
    <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
</head>

<ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
</ul>

<FORM method="post" action="cr.php">
    <input type="hidden" name="num" value="<?php echo $num; ?>">
    <div> <font size=20 align="center"> Modifier un compte rendu  </font> </div>
    <br>
    <div> contenu <textarea name="contenu" rows=10 cols=40><?php echo $descri; ?></textarea>
    <br>
    <input type="submit" name="envoiemodif" value="Envoyer"> <!-- Bouton pour envoyer le formulaire -->
</FORM>

</html>
