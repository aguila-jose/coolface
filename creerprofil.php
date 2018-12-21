<?php
    require ('connexion.php');
    $appliDB = new Connexion();
    $hobbys = $appliDB->getAllHobby();
    $musiques = $appliDB->getAllMusique();
    $listePersonne = $appliDB->getAllPersonne();

   

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Facecool</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <script src="javascript/javascript.js"></script>
    <script src="javascript/jquery-1.6.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav>
        <div id="menu-secondaire">
            <a href="profil.php">FACECOOL INSCRIPTION</a>
            <!--<form method="GET" action="creerprofil.php">
                <div>
                    <input type="search" id="search" name="recherche" placeholder="Trouver vos amis">
                </div>
                <button id="button-search">search</button>
            </form>-->
        </div>
        <!--<div id="toggle-menu">Menu</div>-->
        <ul class="menu">
            <!--<li><a href="#">FACECOOL</a></li>-->
            <!--<li><a href="#">ANNUAIRE</a></li>-->
            <li><a href="creerprofil.php">CREER NOUVEAUX PROFIL</a></li>
            <li><a href="annuaire.php">LISTE DES AMIS ANNUAIRE</a></li>
        </ul>
    </nav>
    <form method="post" action="envoyer.php">
        <div id="container-flex-inscrip">
            <section id="container-formulaire">
            
                <h1>FaceCool Inscription</h1>
                <p><label for="nom">Nom :<label></p>
                <p><input type="text" name="nom" id="nom" placeholder="Ecrivez votre nom..." required></p>

                <p><label for="prenom">Prenom :<label></p>
                <p><input type="text" name="prenom" id="prenom" placeholder="Ecrivez votre prenom..." required></p>

                <p><label for="date-naissance">Votre date de naissance :<label></p>
                </p><input id="date-naissance" type="date" name="date" required></p>

                <p><label for="photo">Votre Photo :<label></p>
                <p><input type="text" id="photo" name="photo" placeholder="Lien de votre photo" required></p>
            
            </section>
        </div>
            <div>
                <section id="container-formulaire3">
                    <div class="Situation-amoureuse">
                        <h3>Situation amoureuse</h3>
                        <p>
                            <input type="radio" id="celibataire" value="celibataire" name="etat">
                            <label for="celibataire">celibataire</label>
                        </p>
                        <P>
                            <input type="radio" id="marié" value="marié" name="etat">
                            <label for="marié">marié</label>
                        </p>
                        <P>
                            <input type="radio" id="marié"  value="En couple"  name="etat">
                            <label for="marié">En couple</label>

                        </p>
                        <P>
                            <input type="radio" id="autre"   value="autre" name="etat">
                            <label for="autre">autre</label>

                        </P>
                    </div>
                </section>

                <section id="container-formulaire4">
                    <div>
                        <h3>Musique</h3>
                        <!--Affiche tous les type de musiques de la base de donnees, il sont tous 
                        inserer tous dans input checkbox-->
                            <?php 
                            foreach($musiques as $musique){
                            echo '<p><input type="checkbox" name="musiques[]" value='.$musique->id.'>
                            <label for="nom">'.$musique->type.'<label>';
                            }
                            ?>
                    </div>
                    <div>
                        <h3>Hobbies</h3>

                            <!--Affiche tous les type de hobbys de la base de donnees, il sont tous 
                            inserer tous dans input checkbox-->
                            <?php
                            foreach($hobbys as $hobby){
                                echo '<p><input type="checkbox" name="hobbies[]" value='.$hobby->id.'>
                                <label for="nom">'.$hobby->type.'</label></p>';
                            }
                            ?>
                    </div>
                </section>
              
        </div>

        <!--section id="container-formulaire5">
            <div id="menu-secondaire2"> 
                <form method="GET" action="creerprofil.php">
                    <div>
                        <label for="search">TROUVES VOS AMIS :</label><br/><br/>
                        <input type="search" id="search" name="recherche" placeholder="Trouver vos amis">
                    </div>
                    <button id="button-search">search</button>
                </form>
            </div>
        </section-->

        <section id="caca">
        <?php
            foreach($listePersonne as $personne){

            echo '<article class="container-list-amis2">
           
           

                <div id="image-amis" class="flex-item2">
                    <a href="profil.php?id='.$personne->ID.'"><img src="'.$personne->URL_Photo.'" />
                </div>

                <div>
                    <div class="donees">NOM :'.$personne->Nom.' </div>
                    <div class="donees">PRENOM :'.$personne->Prenom.' </div>
                </div></a>

                    
                        <select name="amitier['.$personne->ID.']">

                        <option selected="selected" value="">Aucun relation-</option>
                            <option value="famille">Famille</option>
                            <option value="amis">Amis</option>
                            <option value="collegue">Collegue</option>
                            <option value="je veux le/a connaitre">Je veux le/a connaitre</option>
                        </select>
                  
            </article>';
            }
        ?>


        </section>
        <section id="container-flex-inscrip2">
            <p>
                <a class="inscription" href="profil.php">
                    <input id="envoyer-inscription" type="submit" name="envoyer" value="envoyer"></a>
            </p>
        </section>
    </form>


</body>

</html>