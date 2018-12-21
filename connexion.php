<?php

class Connexion {
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
        $requete_prepare = $this->connection->prepare("SELECT * FROM Hobby");
        $requete_prepare->execute();
        $resultatRequete=$requete_prepare->fetchAll(PDO::FETCH_OBJ);//me devuelve un tablero
        return $resultatRequete;
    }

    //Funcion que va recuperar los hobys de la persona
    public function getPersonneHobby($personne_id){
        $requete_prepare = $this->connection->prepare(
        "SELECT type 
        FROM RelationHobby 
        INNER JOIN Hobby ON Hobby_Id = id
        WHERE  Personne_Id = :id");

        $requete_prepare->execute(array("id"=>$personne_id));
        $Hobbys=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $Hobbys;
    }

    //EXERCICE 5 et 6
    //insertion des Musique dans la bases de données
     public function setMusique(string $nouveauMusique){
        $requete_prepare = $this->connection->prepare("INSERT INTO Musique (type) values(:misMusique)");
        $requete_prepare->execute(array('misMusique'=>$nouveauMusique));
    }

    public function getPersonneMusique($personne_id){
        $requete_prepare = $this->connection->prepare(
            "SELECT type 
            FROM Musique 
            INNER JOIN RelationMusique ON musique_id = id
            WHERE  personne_id = :id");

        $requete_prepare->execute(array("id"=>$personne_id));
        $musique=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $musique;
    }

    //tabla relacion personas amis
    public function getRelationPersonne($personneId){

        $requete_prepare =$this->connection->prepare(
        "SELECT * FROM RelationPersonne
        INNER JOIN Personne ON RelationPersonne.relation_id = Personne.ID
        WHERE RelationPersonne.personne_id = :id");

        $requete_prepare->execute(array("id"=>$personneId));

        $relation=$requete_prepare->fetchAll(PDO::FETCH_OBJ);
        return $relation;
    }

    public function getAllMusique(){
        $requete_prepare = $this->connection->prepare("SELECT * FROM Musique");
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

        $id = $this->connection->lastInsertId();
        return $id;
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
    //Inserer des hobiies a des personnes
    public function insertPersonneHobbies($id_personne, $hobbies){
        $requete_prepare = $this->connection->prepare(
            "INSERT INTO RelationHobby(Personne_Id, Hobby_Id) values (:id_personne, :id_hobby)"
        );

        foreach($hobbies as $hobbie){
            $requete_prepare->execute(array("id_personne"=>$id_personne, "id_hobby"=>$hobbie ));
            // var_dump($requete_prepare->errorInfo());
        }  
    }

    //Inserer des musiques personnes
    //creer un function est on lui passe en paramettre ($id_personne, $musique)
    public function insertPersonneMusiques($id_personne, $musiques){
        //prepare la requete connection
        $requete_prepare = $this->connection->prepare(
        //insert dans RelationMusique le id de la personne et le id de la musique 
        "INSERT INTO RelationMusique(personne_id, musique_id) values(:id_personne, :id_musique)"
        );

        foreach($musiques as $musique){
            $requete_prepare->execute(array("id_personne"=>$id_personne, "id_musique"=>$musique));
            // var_dump($requete_prepare->errorInfo());
            }
        }

        // inserer des relations
        public function inserPersonneRelation($id_personne,$id_relation, $relation_type ){
            $requete_prepare = $this->connection->prepare(
            "INSERT INTO RelationPersonne (personne_id,relation_id,relation_type) values(:id_personne, :id_relation, :id_type)"
        );
            $requete_prepare->execute(array("id_personne"=>$id_personne, "id_relation"=>$id_relation,"id_type"=>$relation_type));
    }

   
}

?>