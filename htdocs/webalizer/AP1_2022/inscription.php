<!DOCTYPE html>
<html>
<head>
   
   
    <title>INSCRIPTION</title>
   
   
    <meta charset="utf-8">
   
</head>
<body>
   
<h1>Inscription<h1>
   
    <form method="post" action="inscription.php">
        <p>Nom</p>
        <input type="text" name="Nom">
        <p>Prenom</p>
        <input type="text" name="Prenom">
        <p>email</p>
        <input type="email" name="email">
        <p>Password</p>
        <input type="password" name="password">
        <p>Répetez votre password</p>
        <input type="password" name="repeatpassword"><br><br>
        <input type="submit" name="submit" value="Valider">
   
    </form>
   
<?php
   
if (isset($_POST['submit']))
{
   
$Nom = htmlspecialchars(trim($_POST['Nom']));
$Prenom = htmlspecialchars(trim($_POST['Prenom']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));
$repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));
   
if ($Nom&&$Prenom&&$email&&$password&&$repeatpassword)
        {
        if (strlen($password)>=6)
            {
                if ($password==$repeatpassword)
                {
            // On crypte le mot de passe
                $password = md5($password);
 
 // on se connecte à MySQL et on sélectionne la base
    $c = new mysqli ("localhost","root","","ecobank");
 
 
 
/* Vérification de la connexion */
if ($mysqli->connect_errno)
    printf("Echec de la connexion: %s\n", $mysqli->connect_error);
    exit();
}
 
if (!$mysqli->query("SET a=1")) {
    printf("Message d'erreur : %s\n", $mysqli->error);
 
  
 //On créé la requête
$sql = "INSERT INTO newclient VALUES ('','$Nom','$Prenom','email','$password')";
  
    // On envoie la requête
$res = $c->query($sql);
       // on ferme la connexion
mysqli_close($c);
  
}else echo "Les mots de passe ne sont pas identiques";
}else echo "Le mot de passe est trop court !";
}else echo "Veuillez saisir tous les champs !";
   
}
 
?>
</body>
</html>
