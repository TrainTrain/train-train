<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>TRAIN-TRAIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <script src="../app/ressources/jquery.js"></script>

        <script src="../app/ressources/bootstrap/js/bootstrap.min.js"></script>
        <link href="../app/ressources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="../app/ressources/fontello/css/graou.css">
        <link rel="stylesheet" href="../app/ressources/five-star-rating/rating.min.css">

        <link href="../app/css/main.css" rel="stylesheet">
        <link href="../app/css/evaluer.css" rel="stylesheet">

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
                                1388 <img src="../app/img/coins.png" height="16px" />
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

            <div class="row notation">
                <div class="col-xs-6">
                    <div class="intitule">PROPRETÉ</div>
                </div>
                <div class="col-xs-6">
                    <span class="c-rating text-right" id="proprete"></span>
                </div>
            </div>
            <div class="help-block precision">État de votre rame et de son équipement (WC, sièges, accoudoirs).</div>

            <div class="row notation">
                <div class="col-xs-6">
                    <div class="intitule">TEMPÉRATURE</div>
                </div>
                <div class="col-xs-6">
                    <span class="c-rating text-right" id="temperature"></span>
                </div>
            </div>
            <div class="help-block precision">Température ressentie à votre place.</div>

            <div class="row notation">
                <div class="col-xs-6">
                    <div class="intitule">QUIÉTUDE</div>
                </div>
                <div class="col-xs-6">
                    <span class="c-rating text-right" id="quietude"></span>
                </div>
            </div>
            <div class="help-block precision">La sérénité, l'ambiance de votre point de vue.</div>

            <div class="row notation">
                <div class="col-xs-6">
                    <div class="intitule">SÛRETÉ</div>
                </div>
                <div class="col-xs-6">
                    <span class="c-rating text-right" id="surete"></span>
                </div>
            </div>
            <div class="help-block precision">Votre sentiment de sécurité à bord de votre rame.</div>

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

        <script src="../app/ressources/five-star-rating/rating.min.js"></script>
        <script>
            var callback = function(rating) { consolelog(rating); };
            var maxRating = 5;

            var ratingElement = document.querySelector('#proprete');
            var proprete = rating(ratingElement, 3, maxRating, callback);

            var ratingElement = document.querySelector('#temperature');
            var temperature = rating(ratingElement, 1, maxRating, callback);

            var ratingElement = document.querySelector('#quietude');
            var quietude = rating(ratingElement, 1, maxRating, callback);

            var ratingElement = document.querySelector('#surete');
            var surete = rating(ratingElement, 4, maxRating, callback);

        </script>

    </body>
</html>
