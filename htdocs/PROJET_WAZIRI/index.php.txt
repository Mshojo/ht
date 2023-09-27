<?php
include 'conf.php';
?>


<?php
if($bdd = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
{
echo "connexion BDD réuissie !";

}
else

{
echo "Erreur";
}


?>