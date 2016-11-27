<?php
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

        <script src="../../dev/app/webroot/ressources/jquery.js"></script>

        <script src="../../dev/app/webroot/ressources/bootstrap/js/bootstrap.min.js"></script>
        <link href="../../dev/app/webroot/ressources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="../../dev/app/webroot/ressources/fontello/css/graou.css">

        <link href="../../dev/app/webroot/css/main.css" rel="stylesheet">

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
                                1388 <img src="../../dev/app/webroot/img/coins.png" height="16px" />
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
                <span class="numero"><?php echo $num; ?></span>
                <span class="debfin"><?php echo $train[0]['horaires']['gare'].' <span class="heure">'.substr($train[0]['horaires']['debut'],0,5).'</span> - '.$train[count($train)-1]['horaires']['gare'].' <span class="heure">'.substr($train[count($train)-1]['horaires']['fin'],0,5).'</span>'; ?></span>
            </div>
        </div>

        <div class="contenu">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <a href="/traintrain/dev/Feedbacks/index">
                        <div class="gros-bouton gros-bouton-jaune card">
                            <!--<span class="glyphicon glyphicon-star"></span>-->
                            <img src="../../dev/app/webroot/img/icones/certificate.svg" height="75px">
                            <span class="titre-bouton">ÉVALUER</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-6 col-sm-3 ">
                    <a href="chat.php">
                        <div class="gros-bouton gros-bouton-vert card">
                            <!--<span class="icon-chat"></span>-->
                            <img src="../../dev/app/webroot/img/icones/chat.svg" height="75px">
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
                    <a href="signaler.php">
                        <div class="gros-bouton gros-bouton-orange card">
                            <!--<span class="icon-signal"></span>-->
                            <img src="../../dev/app/webroot/img/icones/megaphone.svg" height="75px">
                            <span class="titre-bouton">SIGNALEMENTS</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <div class="gros-bouton gros-bouton-violet card">
                        <!--<span class="icon-info"></span>-->
                        <img src="../../dev/app/webroot/img/icones/analysis.svg" height="75px">
                        <span class="titre-bouton">S'INFORMER</span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <button type="button" class="gros-bouton card" data-toggle="modal" data-target="#parametres">
                        <!--<span class="icon-cog"></span>-->
                        <img src="../../dev/app/webroot/img/icones/settings.svg" height="75px">
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
