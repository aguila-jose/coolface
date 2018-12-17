<?php

class Connexion{
    private $connection;
    
    public function getConnection(){
        return $this->connection;
    }


    // public function __construct($PARAM_host,$PARAM_port,$PARAM_nom_bd,$PARAM_nom_utilisateur,$PARAM_mot_de_passe){
    public function __construct() {
        $PARAM_host="localhost";
        $PARAM_port="3306";
        $PARAM_nom_bd="minifacebook";
        $PARAM_nom_utilisateur="phpmyadmin";
        $PARAM_mot_de_passe="digital2018"; 

        try{
        $this->connection  = new PDO('mysql:host='.$PARAM_host.
            ';dbname='.$PARAM_nom_bd, $PARAM_nom_utilisateur, $PARAM_mot_de_passe);

        }catch(Exception $e){
            echo 'Erreur : '.$e->getMessage().'<br />';
            echo 'N° : '.$e->getCode();
        } 
    }

    //EXERCICE 3 et 4
    //insertion des Hobbya dans la bases de données
    public function setHobby($nouveauHobby){
        $requete_prepare = $this->connection->prepare("INSERT INTO Hobby (type) values(:misHobby)");
        $requete_prepare->execute(array('misHobby'=>$nouveauHobby));
    
    }
    public function getPersonneHobbyById($id){
        $requete_prepare = $this->connection->prepare("SELECT ");
    }
    public function getAllHobby(){
        $requete_prepare = $this->connection->prepare("SELECT type FROM Hobby");
        $requete_prepare->execute();
        $resultatRequete=$requete_prepare->fetchAll(PDO::FETCH_OBJ);//me devuelve un tablero
        return $resultatRequete;

    }


    //EXERCICE 5 et 6
    // insertion des Musique dans la bases de données
     public function setMusique(string $nouveauMusique){
        $requete_prepare = $this->connection->prepare("INSERT INTO Musique (type) values(:misMusique)");
        $requete_prepare->execute(array('misMusique'=>$nouveauMusique));
    
    }

    public function getAllMusique(){
        $requete_prepare = $this->connection->prepare("SELECT type FROM Musique");
        $requete_prepare->execute();
        $resultatRequete=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $resultatRequete;

    }

    //EXERCICE 7 et 8
     // insertion des personne dans la bases de données
    public function setPersonne($nom, $prenom, $url_photo, $date_naissance, $status_couple){
        $requete_prepare = $this->connection->prepare("INSERT INTO Personne (Nom, Prenom, URL_Photo ,Date_Naissance, Status_couple)
        values(:nom, :prenom, :url_photo, :date_naissance, :status_couple)");
        $requete_prepare->execute(array('nom' => $nom, 'prenom' => $prenom, 'url_photo' => $url_photo,
        'date_naissance'=> $date_naissance, 'status_couple' => $status_couple));
    } 

    public function getAllPersonne(){
        $requete_prepare = $this->connection->prepare("SELECT * FROM Personne");
        $requete_prepare->execute();
        $resultatRequete=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $resultatRequete;  
    }

    // Excercise 10 selectioner les de table de musique
    function selectPersonneById($id){// declare functio qui prend le paramettre id
        $requete_prepare = $this->connection->prepare(

        "SELECT * FROM Personne WHERE ID = :id");//selectio tout ce qui est dans la table personne avec un id
                                        //que on donne al afunction (la façon de declarer un variable sql :id

        $requete_prepare->execute(array("id"=>$id));//execute la requete et pass la parametre de la function et stoke la reponse de la base de donnée a notre variable

        $resultat = $requete_prepare->fetch(PDO::FETCH_OBJ);//apres que la base de donnée nous done une reponse il faut 
                                                //stoke dans un variable 
                                                //quand on appelle on appelle la function donne le resultat qu'on a ubtenue
        return $resultat;//depuis la la function retourne la resultat 

    }  

    //////  DEPUIS ICI POUR REVIsER AVEC RODENS /trouve les personne qui les noms ou prenom contien la variable $patter 

    public function getSelectPersonneNomPrenomLike($patern){
        $requete_prepare = $this->connection->prepare("SELECT * FROM Personne WHERE Nom Like :nom OR Prenom Like :prenom");
        $requete_prepare->execute(array("nom"=>"%".$patern."%", "prenom"=>"%".$patern."%"));
           
        $resultatPatern=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $resultatPatern;
        
    }  
 
}
?>

