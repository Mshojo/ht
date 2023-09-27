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

if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
  $id = $_SESSION["id"];
  $requete = "SELECT * FROM UTILISATEUR ";
  $resultat = mysqli_query($connexion, $requete);
  while ($donnees = mysqli_fetch_assoc($resultat)) {
  
    
    echo "nom: <a href='afficheperso.php?nom=" . $donnees['nom'] . "'>" . $donnees['nom'] . "</a><br>";
    
  
    }
  
  }
  }
else
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    </ul> </html> <?php


if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
$id = $_SESSION["id"];
$requete = "SELECT * FROM UTILISATEUR where UTILISATEUR.num=$_SESSION[id]";
$resultat = mysqli_query($connexion, $requete);
while ($donnees = mysqli_fetch_assoc($resultat)) {

  echo  "num:  ",$donnees['num'],"<br>";
  echo "nom:  ",$donnees['nom'],"<br>";
  echo "prenom:  ",$donnees['prenom'],"<br>";
  echo "tel:  ",$donnees['tel'],"<br>";
  echo "login:  ",$donnees['login'],"<br>";
  echo "type:  ",$donnees['type'],"<br>";
  echo "email:  ",$donnees['email'],"<br>";
  echo "option:  ",$donnees['option'],"<br>";
  echo "num_stage:  ",$donnees['num_stage'],"<br>";



  }

}
  }

    ?>

