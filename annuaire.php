<!DOCTYPE html>

<html class="no-js">


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
  <?php
        // recupere coonnexion.php
        require "connexion.php";

        // Je cree ma connexion
        $connexion = new Connexion();

        $pattern = "";
        if($_GET["recherche"] != null){
            $pattern = $_GET["recherche"];
        }
        $listePersonne = $connexion->getSelectPersonneNomPrenomLike( $pattern);
    ?>
      <nav rol="navigation">
        <div id="menu-secondaire">
        <a href="profil.php">FACECOOL INSCRIPTION</a>
            <form method="GET" action="annuaire.php">
                <div>
                    <input type="search" id="search" name="recherche" placeholder="Trouver vos amis">
                </div>
                <button>search</button>
            </form>
        </div>
        <!--<div id="toggle-menu">Menu</div>-->
        <ul class="menu">
            <!--<li><a href="#">FACECOOL</a></li>-->
            <!--<li><a href="#">ANNUAIRE</a></li>-->
            <li><a href="creerprofil.php">CREER NOUVEAUX PROFIL</a></li>
            <li><a href="annuaire.php">LISTE DES AMIS ANNUAIRE</a></li>
        </ul>
    </nav>
    <div id="container-principal">
       <?php foreach($listePersonne as $personne){
            echo '<article class="container-list-amis">';
            echo '<div id="image-amis" class="flex-item2">';
            echo '<img src='.$personne->URL_Photo.' />';
            echo '</div>';
            echo ' <div>';
            echo '<div class="donees">'.$personne->Nom.'</div>';
            echo ' <div class="donees">'.$personne->Prenom.'</div>';
            echo ' </div>';
            echo '<button>PROFIL</button>';
            echo ' </article>';
        }
        ?>

        <div id="container-flex-annuaire">
            <article class="container-list-amis">
                <div id="image-amis" class="flex-item2">
                    <img src="imgs/amis1.png" />
                </div>
                <h2>bla bla bla</h2>
                <div>
                    <div class="donees">NOM : </div>
                    <div class="donees">PRENOM : </div>
                </div>
                <button>PROFIL</button>
            </article>
    
           
         
          
        </div><!--container-principal-->
    </div>

</body>
</html>
