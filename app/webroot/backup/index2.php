<?php
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr_FR.UTF8');
$connexion->query("SET NAMES UTF8");

$date_sql = date('Y-m-d');
$num_jour_sem = date('N');

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>TRAIN-TRAIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="ressources/jquery.js"></script>

        <script src="ressources/bootstrap/js/bootstrap.min.js"></script>
        <link href="ressources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="ressources/fontello/css/graou.css">

        <link href="css/index.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <div class="logo text-center">
                        <img src="img/logo_traintrain.svg" class="img-logo img-responsive">
                    </div>
                    <div class="mot-accueil">
                        <span class="glyphicon glyphicon-map-marker"></span> Positionnez-vous !
                    </div>
                    <p class="infos help-block"><em>Choisissez la géolocalisation automatique ou le choix par numéro pour vous « attacher » à la communauté de votre train-train !</em></p>
                    <div class="choix-train">
                        <form method="get" role="form" action="main.php">
                            <button type="submit" class="bouton-cnx bouton-geoloc"><span class="glyphicon glyphicon-screenshot"></span> Me géolocaliser</button>
                            <p class="text-ou">&mdash; OU &mdash;</p>
                            <div class="input-group input-group-lg petite-marge">
                                <span class="input-group-addon" id="basic-addon1"><span class="icon-aboveground-rail"></span></span>
                                <input type="number" class="form-control numtrain" name="num" placeholder="Numéro de train" aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="bouton-cnx bouton-valider"><span class=""></span> Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
