<?php

class ADHERENT
{
    private $nom;
    private $prenom;
    private $numeroCarte;
    private $DateAdhesion;


    public function __construct($lenom, $leprenom, $lenumeroCarte, $laDateAdhesion)
    {
        $this -> nom = $lenom;
        $this -> prenom = $leprenom;
        $this -> numeroCarte = $lenumeroCarte;
        $this -> DateAdhesion = $laDateAdhesion;
    }


public function get_nom()
{
    return $this -> nom;
}

public function set_nom($lenom)
{
    $this -> nom = $lenom;
}




public function get_prenom()
{
    return $this -> prenom;
}

public function set_prenom($leprenom)
{
    $this -> prenom = $leprenom;
}




public function get_numeroCarte()
{
    return $this -> numeroCarte;
}

public function set_numeroCarte($lenumeroCarte)
{
    $this -> numeroCarte = $lenumeroCarte;
}




public function get_DateAdhesion()
{
    return $this -> DateAdhesion;
}

public function set_DateAdhesion($leDateAdhesion)
{
    $this -> DateAdhesion = $leDateAdhesion;
}

}

$adherent1 = new ADHERENT("Bliotek", "Billy", "10001", "10/09/2022");

$adherent2 = new ADHERENT("Hugo", "Victor", "10002", "0");


$monDico = array();

$monDico["10001"] = $adherent1;
$monDico["10002"] = $adherent2;


foreach($monDico as $laCle => $unAdherent)
{
    if($unAdherent -> get_DateAdhesion()=="0")
    {
        echo $unAdherent -> get_nom();
    }


    

}

if(isset($monDico["10003"]))
{
    echo "l'adherent existe";
}

else
{
    echo "l'adherent n'existe pas";
}







?>