
<?php

class Livre {

    private  $ISBN;
    private  $Titre;
    private  $Prix;
    private $Dispo;


    public function __construct($ISBNNew,$TitreNew,$PrixNew)
    {

            $this->ISBN = $ISBNNew;
            $this->Titre = $TitreNew;
            $this->Prix = $PrixNew;
            $this->Dispo = true; 
    }

    public function getISBN(){

        return $this->ISBN;
    }

    public function setISBN($nouvellevaleur){

        $this->ISBN = $nouvellevaleur;

    }

    public function getTitre(){

        return $this->Titre;
    }

    public function setTitre($nouvellevaleur){

        $this->Titre = $nouvellevaleur;

    }


    public function getPrix(){

        return $this-> Prix;
    }

    public function setprix($nouvellevaleur){

        $this->Prix = $nouvellevaleur;

    }


    public function getDispo(){

        return $this->Dispo;
    }

    public function setDispo($nouvellevaleur){

        $this->Dispo = $nouvellevaleur;

    }





    }

    $livre1 = new Livre("EE032","programmer en C",10,0);
    $livre2 = new Livre("JAV44","programmer en java",50,0);


    $collecton = array();


    $collecton[$livre1->getISBN()] = $livre1;
    $collecton[$livre2->getISBN()] = $livre2;

    $collecton["EE032"]->setDispo(false);

    foreach($collecton as $unlivre){

        if(!$unlivre->getDispo()){
            echo $unlivre->getTitre();
        }


    }
    $a = 0;
     $somme = 0;

    echo "<br>";
    
    foreach ($collecton as $livre) {
      
        $a += $livre->getPrix();

        $somme = ($a / count($collecton));
    
        }
         echo $somme;

echo "<br>";
if(isset($collecton["EE22"])){

    echo "existe";

} 
else {
    echo "existe pas";
}

echo "<br>";
   
if(isset($collecton["EE032"])){

    echo "existe";

} 
else {
    echo "existe pas";
}

   /*
    $collecton[$livre1->getISBN()] = $livre1;
    $collecton[$livre2->getISBN()] = $livre2;

    $collecton["EEE032"]->setDispo(false);
    echo $collecton["EEE032"]->getDispo();

    foreach ($collecton as $Livre) {
        if($Livre->getDispo()==false){
            echo ($Livre->getTitre());
        }
    };

$a = 0;

echo "<br>";

foreach ($collecton as $Livre) {
  
    $a += $Livre->getPrix();

    }
   

    echo "<br>";

 echo ($a  / count($collecton) );

 echo "<br>";


 if(isset($collecton["E22"]) or isset($collecton["EEE032"]) ){
    echo "il existe";
  } else {
    echo "introuvable";
  }
?>

*/



