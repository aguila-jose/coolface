<!--

   <?php
    require ('connexion.php');

        // recupere coonnexion.php
            
    //TEST
            // Je cree ma connexion
            $appliDB = new Connexion();

            $id = null;
            if(!empty($_GET["id"])){

                $id = $_GET["id"];
            }

        $recupereAffiche = $appliDB->selectPersonneById($id);

    ?>-->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>facecool</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <script src="javascript/javascript.js"></script>
    <script src="javascript/jquery-1.6.3.min.js"></script>
</head>

<body>
    <nav>
        <div id="menu-secondaire">
        <a href="profil.php">FACECOOL</a>
            <form method="GET" action="annuaire.php">
                <div>
                    <input type="search" id="search" name="recherche" placeholder="Trouver vos amis">
                </div>
                <button>search</button>
            </form>
        </div>
        <!--<div id="toggle-menu">Menu</div>-->
        <ul class="menu">
            <li><a href="creerprofil.php">CREER NOUVEAUX PROFIL</a></li>
            <li><a href="annuaire.php">LISTE DES AMIS ANNUAIRE</a></li>
        </ul>
    </nav>

    <section class="container-profil">

        <div class="bck-img">
            <div class="container-img">
                <img src="<?php echo $recupereAffiche->URL_Photo;?>" alt="">
            </div>

            <div class="appelle border">NOM :
                <?php echo $recupereAffiche->Nom ?>
            </div>

            <div class="appelle border">PRENOM :
                <?php echo $recupereAffiche->Prenom ?>
            </div>

            <div class="appelle border">DATE NAISSANCE :
                <?php echo $recupereAffiche->Date_Naissance ?>
            </div>

            <div class="appelle border">STATUS-SOCIAL :
                <?php echo $recupereAffiche->Status_couple ?>
            </div>
        </div>

        <div class="donnes-perso">
            <div class="date-status">
                <div class="appelle">
                    <p>HOBBY PRÉFÉRÉ :</p>
                    
                    <?php
                    $hobbys = $appliDB->getPersonneHobby($id);
                    foreach($hobbys as $hobby){

                    echo '<div class="flex_container">

                        <p>'.$hobby->type.'</p>
                       
                    </div>';
                    }
                    ?>
                    <!-- <?php echo $personne->Nom ?>-->
                </div>
            </div>
            <div class="date-status">
                <div class="appelle">
                    <p>MUSIQUES PRÉFÉRÉES :</P>
                    <?php
                    $musiques = $appliDB->getpersonneMusique($id);
                    foreach($musiques as $musique){

                      echo '<div class="flex_container">

                        <p>'.$musique->type.'</p>
                      
                    </div>';
                }
                ?>
              
                </div>
            </div>

            <div class="flex-amis">
            <?php
            $amis = $appliDB->getRelationPersonne($id);
            foreach ($amis as $ami) { ?>
                <article class="container-list-amis3">


                    <div id="image-amis" class="flex-item2">
                        <img src="<?php echo $ami->URL_Photo ?>" />
                    </div>

                    <div>
                        <div class="donees">NOM :<?php echo $ami->Nom ?> </div>
                        <div class="donees">PRENOM :<?php echo $ami->Prenom ?> </div>
                        <div class="donees">RELATION :<?php echo $ami->relation_type  ?> </div>
                     <!--   <div class="donees">STATUS AMI: </div>-->
                    </div>

                </article>
            <?php } ?>
         
            </div>
        </div>
    </section>
</body>

</html>