<?php
$connexion = new mysqli("localhost", "traintrain", "pouetpouet", "traintrain_cake");

if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

date_default_timezone_set('Europe/Paris');
setlocale(LC_ALL, 'fr_FR.UTF8');
$connexion->query("SET NAMES UTF8");

$date_sql = date('Y-m-d');
$num_jour_sem = date('N');
$numero = $_GET['num'];

$sql = "SELECT * FROM horaires WHERE num = $numero AND (CONV(frequence,2,10) & POW(2,(7-$num_jour_sem))) AND '$date_sql' BETWEEN debut_val AND fin_val ORDER BY etape ASC";
$result = $connexion->query($sql);

while ($etape = $result->fetch_assoc()) {
    $train[] = $etape;
}

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

        <link href="css/main.css" rel="stylesheet">

    </head>
    <body>
        <div class="head">
            <div class="hdebfin">
                <div class="row">
                    <div class="col-xs-6">
                        <span class="date-jour">
                            <?php echo strftime("%A %e %B"); ?>
                        </span>
                    </div>
                    <div class="col-xs-6">
                        <div class="petites-infos">
                            <div class="coins">
                                1388 <img src="img/coins.png" height="16px" />
                            </div>
                            <div class="users">
                                47<span class="icon-users"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="id-train">
                N°
                <span class="numero"><?php echo $numero; ?></span>
                <span class="debfin"><?php echo $train[0]['gare'].' <span class="heure">'.substr($train[0]['debut'],0,5).'</span> - '.$train[count($train)-1]['gare'].' <span class="heure">'.substr($train[count($train)-1]['fin'],0,5).'</span>'; ?></span>
            </div>
        </div>

        <div class="contenu">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <a href="evaluer.php">
                        <div class="gros-bouton gros-bouton-jaune card">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="titre-bouton">ÉVALUER</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-3 ">
                    <a href="chat.php">
                        <div class="gros-bouton gros-bouton-vert card">
                            <span class="icon-chat"></span>
                            <span class="titre-bouton">DISCUTER</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <div class="gros-bouton gros-bouton-bleu card">
                        <span class="icon-envoiture"></span>
                        <span class="titre-bouton">DÉCOUVRIR</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="gros-bouton gros-bouton-orange card">
                        <span class="icon-signal"></span>
                        <span class="titre-bouton">SIGNALER</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <div class="gros-bouton gros-bouton-violet card">
                        <span class="icon-info"></span>
                        <span class="titre-bouton">S'INFORMER</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <button type="button" class="gros-bouton card" data-toggle="modal" data-target="#parametres">
                        <span class="icon-cog"></span>
                        <span class="titre-bouton">PARAMÈTRES</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="modal" id="parametres">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3><span class="icon-cog"></span> PARAMÈTRES</h3>
                    </div>
                    <div class="modal-body">
                        <div class="input-group petite-marge">
                            <span class="input-group-addon" id="basic-addon1">PRÉNOM</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" value="Alphonse">
                        </div>
                        <div class="input-group petite-marge">
                            <span class="input-group-addon" id="basic-addon1">NOM</span>
                            <input type="text" class="form-control" aria-describedby="basic-addon1" value="Blin">
                        </div>
                        <h4 class="page-header">INTÉRÊTS</h4>
                        <div class="list-interets">
                            <span class="label label-success"><span class="glyphicon glyphicon-remove"></span> BELOTE</span>
                            <span class="label label-primary"><span class="glyphicon glyphicon-remove"></span> CASTORAMA</span>
                            <span class="label label-info"><span class="glyphicon glyphicon-remove"></span> MUSIQUE</span>
                            <span class="label label-warning"><span class="glyphicon glyphicon-remove"></span> CANARDS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
