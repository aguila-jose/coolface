<?php
/*
require ('connexion.php');
//$db = new Connexion("localhost","3306","minifacebook","phpmyadmin","digital2018");
//$db2 = new Connexion("localhost","3306","adminMiniFacebook","phpmyadmin","digital2018");

// Je crée mon objet connexion
$appliDB = new Connexion();

//EXERCICE 3

$appliDB->setHobby("Bateaux Voile");
$Hobbys = $appliDB->getAllHobby();
foreach($Hobbys as $hobby){//parcour moi chaque element dans le tableau hobbys 
echo '<input type="checkbox">'.$hobby->type.'</input><br/>';//affiche moi le type de element en cour
 }; 


//EXERCICE 4
// $appliDB->setMusique("Slow");
// $musiques = $appliDB->getAllMusique();
// foreach($musiques as $musique){//parcour moi chaque element dans le tableau musiques 
// echo $musique->type;//affiche moi le type de element en cour
// }


//$appliDB->setPersonne('julia', 'maragarita', 'image.png', '1980.04.22', 'Liberal');

/* $personnes = $appliDB->getAllPersonne();
foreach($personnes as $personne){
echo '<input type="checkbox">'.$personne->Nom ." ".$personne->Prenom." "
.$personne->URL_Photo." ".$personne->Date_Naissance." ".$personne->Status_couple.'</input><br/>';
}
  
// Exercise 11,selectioner
$resultatPatern = $appliDB->getSelectPersonneNomPrenomLike("r");
foreach($resultatPatern as $personne){
echo '<input type="checkbox">'.$personne->Nom ." ".$personne->Prenom.'</input><br/>'; 
}
    

$personne = $appliDB->selectPersonneById(1);
echo '<input type="checkbox">'.$personne->Nom ." ".$personne->Prenom.'</input><br/>'; 
?>


*/

require ('connexion.php');


$appliDB = new Connexion();

var_dump($appliDB->selectPersonneById(1));



?>