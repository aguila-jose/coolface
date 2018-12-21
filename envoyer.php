<?php

require_once ('connexion.php');
    $appliDB = new Connexion();
 
    //incription formulaire envoyer
    $id= $appliDB->setPersonne($_POST["nom"],$_POST["prenom"],$_POST["photo"],$_POST["date"],$_POST["etat"]);

    // Insertion des relations hobby
    $hobbies = $_POST["hobbies"];
    $appliDB->insertPersonneHobbies($id, $hobbies);
    // Insertion des relations musique
    $musiques = $_POST["musiques"];
    $appliDB->insertPersonneMusiques($id, $musiques);
    
    // Insertion des relations personnes
   $type_relation=$_POST["amitier"];
   foreach($type_relation as $relation_id=>$rt){
    if($rt != ""){
        $appliDB->inserPersonneRelation($id, $relation_id, $rt);
    }   
   }
    //rediriger sur vers la page profile
    header('Location: profil.php?id='.$id);

    ?>