<?php
session_start();
?>

<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body> </html>
<?php
include '_conf.php';
if ($_SESSION["type"] ==1) //si connexion en prof
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    </ul> </html> <?php
if (isset($_GET['nom'])) {
if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
  $recup = $_GET['nom'];
  $requete = "SELECT * FROM UTILISATEUR WHERE UTILISATEUR.nom = '$recup'";
  $resultat = mysqli_query($connexion, $requete);
  while ($donnees = mysqli_fetch_assoc($resultat)) {
  
    echo  "num:  ",$donnees['num'],"<br>";
    echo "nom: " ,$donnees['nom'], "<br>";
    echo "prenom:  ",$donnees['prenom'],"<br>";
    echo "tel:  ",$donnees['tel'],"<br>";
    echo "login:  ",$donnees['login'],"<br>";
    echo "type:  ",$donnees['type'],"<br>";
    echo "email:  ",$donnees['email'],"<br>";
    echo "option:  ",$donnees['option'],"<br>";
    echo "num_stage:  ",$donnees['num_stage'],"<br>";
    echo "<br>";
  
  
    }
  
  }
}
else {

    echo "exiqste pas";
}

}