  <?php
session_start();
?>

<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body> </html>
<?php
include 'conf.php';

if ($_SESSION["type"] ==1) //si connexion en prof
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    </ul> </html> <?php

//Afficher le profil du prof
       
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
  }



  
?>

<?php

//Afficher le profil de l'eleve
if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))

      {
        $id=$_SESSION["id"];     
        $requete="SELECT * FROM utilisateur WHERE utilisateur.num=$_SESSION[id]"; 
   
        $resultat = mysqli_query($connexion, $requete);
        
        while($donnees = mysqli_fetch_assoc($resultat))
        {
          $nom=$donnees['nom'];
          $prenom=$donnees['prenom'];
          $dateNaissance=$donnees['dateNaissance'];
          //$dateNaissance = "20-06-1996";
          $aujourdhui = date("Y-m-d");
          $diff = date_diff(date_create($dateNaissance), date_create($aujourdhui));
          $email=$donnees['email'];
          $tel=$donnees['tel'];

            echo " Votre nom: $nom <br>";
            echo " Votre prenom: $prenom <br>";
            echo "Votre age est: ".$diff->format('%yans');
            echo "<br>";
            //echo " Votre date de naissance: $dateNaissance <br>";
            echo " Votre email: $email <br>";
            echo " Votre numéro de telephone: $tel <br>";

        }
                
           
           
          }

          ?>

<?php
          //afficher les infos du tuteur
          if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))

          {
            $id=$_SESSION["id"];     
            $requete="SELECT tuteur.* FROM tuteur, stage, utilisateur WHERE tuteur.num=stage.num_tuteur AND utilisateur.num_stage=stage.num AND utilisateur.num=$_SESSION[id] ";
            $resultat = mysqli_query($connexion, $requete);
            echo"<br><br>";
            while($donnees = mysqli_fetch_assoc($resultat))
            {
              $nom=$donnees['nom'];
              $prenom=$donnees['prenom'];
              $email=$donnees['email'];
              $tel=$donnees['tel'];
                echo "Ton tuteur <br>";
                echo " Nom: $nom <br>";
                echo " Prenom: $prenom <br>";
                echo " Email: $email <br>";
                echo " Numéro de telephone: $tel <br>";
    
            }
                    
               
              }

?>

