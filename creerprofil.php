<?php
    require ('connexion.php');
    $appliDB = new Connexion();
    $hobbys = $appliDB->getAllHobby();
    $musiques = $appliDB->getAllMusique();
    $pattern = "deb";//aqui le decimos que si no tienes nada devuelme las personas que empiezan por (deb)
        if($_GET["recherche"] != null){
            $pattern = $_GET["recherche"];
        }
        $listePersonne = $appliDB->getSelectPersonneNomPrenomLike( $pattern);
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
    <title>Formation javascript</title>
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
            <a href="index.php">FACECOOL</a>
            <form method="GET" action="creerprofil.php">
                <div>
                    <input type="search" id="search" name="recherche" placeholder="Trouver vos amis">
                </div>
                <button id="button-search">search</button>
            </form>
        </div>
        <!--<div id="toggle-menu">Menu</div>-->
        <ul class="menu">
            <!--<li><a href="#">FACECOOL</a></li>-->
            <!--<li><a href="#">ANNUAIRE</a></li>-->
            <li><a href="creerprofil.html">CREER NOUVEAUX PROFIL</a></li>
            <li><a href="annuaire.html">LIST DES AMIS ANNUAIRE</a></li>
        </ul>
    </nav>
    <div id="container-flex-inscrip">
        <section id="container-formulaire">
            <h1>FaceCool Inscription</h1>
            <p>C’est gratuit (mais pour combien de temps ...)</p>
     

            <p><label for="nom">Nom :<label></p>
            <p><input type="text" name="nom" id="nom" placeholder="votre nom s'il vous plait" required></p>

            <p><label for="prenom">Prenom :<label></p>
            <p><input type="text" name="prenom" id="prenom" placeholder="votre prenom s'il vous plait" required></p>

            <p><label for="prenom">Mot de passe :<label></p>
            <p><input type="password" name="pass" placeholder="votre mot de passe s'il vous plait" required></p>

            <p><label for="prenom">Confiermer mot de passe :<label></p>
            <p><input type="password" name="conpass" placeholder="confirmez s'il vous plait" required></p>

            <p><label for="prenom">Votre date de naissance :<label></p>
            </p><input type="date" name="date" required></p>

            <p><label for="prenom">Votre Photo :<label></p>
            <p><input type="text" name="photo" placeholder="le lien de votre photo s'il vous plait" required></p>
        </section>

        <div>
            <section id="container-formulaire3">
                <div class="Situation-amoureuse">
                    <h3>Situation amoureuse</h3>
                    <p>
                        <input type="radio" id="celibataire" name="etat">
                        <label for="celibataire">celibataire</label>
                    </p>
                    <P>
                        <input type="radio" id="marié" name="etat">
                        <label for="marié">marié</label>
                    </p>
                    <P>
                        <input type="radio" id="marié" name="etat">
                        <label for="marié">En couple</label>

                    </p>
                    <P>
                        <input type="radio" id="autre" name="etat">
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
                    echo '<p><input type="checkbox" name="Techno">
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
                echo '<p><input type="checkbox" name="Velo">
                <label for="nom">'.$hobby->type.'</label></p>';
            }

            ?>
                <br>
            </div>
            </section>
        </div>
       
    </div>
    <section id="container-formulaire5">
    <?php
        foreach($listePersonne as $personne){

        echo '<article class="container-list-amis2">
            <div id="image-amis" class="flex-item2">
                <img src="imgs/amis1.png" />
            </div>

            <div>
                <div class="donees">NOM :'.$personne->Nom.' </div>
                    <div class="donees">PRENOM :'.$personne->Prenom.' </div>
                </div>

                <form action="/action_page.php">
                    <select name="amitier">
                        <option value="famille">Famille</option>
                        <option value="samisaab">Amis</option>
                        <option value="collegue">Collegue</option>
                        <option value="je veux le/a connaitre">Je veux le/a connaitre</option>
                    </select>
                </form>
        </article>';
        }
    ?>
    </section>
    <section id="container-flex-inscrip2">
        <p>
            <a class="inscription" href="#">
                <input id="envoyer-inscription" type="submit" name="envoyer" value="envoyer"></a>
        </p>
    </section>



</body>

</html>