<?php
session_start();
?>   
     
<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body>

<?php
include '_conf.php';
if (isset($_POST['update'])) //recupere données de ccr.php
      {
        $date=$_POST['date'];
        $contenu= addslashes($_POST['contenu']);
        $id=$_SESSION["id"];
$connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD);
        $requete="INSERT INTO CR (date,datetime,description,num_utilisateur) VALUES ('$date',NOW(),'$contenu','$id');"; //crée nouveau compte rendu avec infos recuperees
echo "<br>$requete<hr>";
        if(!mysqli_query($connexion,$requete)) 
            {
            echo "erreur";
            }
        else //si possibilité de faire la requete :
            {
           echo "nouveau compte-rendu crée";
           header("Refresh:0");

            }
        }

if ($_SESSION["type"] ==1) //si connexion en prof
  {
 ?>
  
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    </ul> 
 

<?php
    if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
        $id = $_SESSION["id"];
        
        $requete = "SELECT CR.*, utilisateur.nom, utilisateur.prenom  FROM CR, utilisateur, stage, tuteur WHERE cr.num_utilisateur=utilisateur.num ;";
        $resultat = mysqli_query($connexion, $requete);

        while ($donnees = mysqli_fetch_assoc($resultat)) {
            
            echo "nom : ". $donnees['nom'], "<br>"; 
            echo "Date : " . $donnees['date'] . "<br>";
            echo  "Description : " . $donnees['description'] . "<br>";
            echo"<br>";

        }


    }
    ?>



<?php 
}
else //si connexion en eleve
  { 
    ?>
    
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li> 
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    </ul>  <?php
    
       if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
      {
        $id=$_SESSION["id"];     
        $requete="SELECT CR.* FROM CR,UTILISATEUR WHERE UTILISATEUR.num = CR.num_utilisateur AND UTILISATEUR.num=$_SESSION[id] ORDER BY date DESC"; //recupere tous les comptes rendus par date decroissante
        $resultat = mysqli_query($connexion, $requete);
        while($donnees = mysqli_fetch_assoc($resultat))
          {
            $num=$donnees['num'];//numéro CR
            $contenu=$donnees['description'];
            $date=$donnees['datemodif'];
            $datecrea=$donnees['datetime'];
            
            
            
            echo "<table border=2><thead> <tr> <th colspan=2> <u>n°$num</u> </th> </tr> </thead>
            <tbody> <tr> <td>  $contenu</td> </tr> <tr> <td> date de creation : $datecrea</td> </tr>  <tr> <td> date modif : $date </td> </tr> <tr> <td> <a href='modif.php?id=$num'>Modifier</a> </td> </tr> </tbody> </table> <br>";  //affiche tous les compte rendus du plus recent au plus ancien + lien pour modifier
          }
    }

 
    }
    
    
  
  if(isset($_POST['envoiemodif'])){
      $num = $_POST['num'];
      echo $num;
      $dateFormate = date('Y-m-d H:i:s'); // Format YYYY-MM-DD HH:MM:SS
      $newcontenu = addslashes($_POST['contenu']);
      $requete = "UPDATE CR SET CR.description = '$newcontenu *modifie*' WHERE CR.num = $num";
      $majDate = "UPDATE CR SET CR.datemodif = '$dateFormate' WHERE CR.num = $num";
      echo "requete : ". $requete;
      
      if(mysqli_query($connexion, $requete)) {
          echo "Compte rendu modifié avec succès.";
          header("Refresh:0");
      } else {
          echo "Erreur : " . mysqli_error($connexion);
      }

      if(mysqli_query($connexion, $majDate)) {
        echo "maj modifié avec succès.";
    } else {
        echo "Erreur : " . mysqli_error($connexion);
    }
  }
  


?>
