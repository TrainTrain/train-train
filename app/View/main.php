<?php
$connexion = new mysqli("192.168.43.202", "traintrain", "pouetpouet", "traintrain_cake");

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

        <link href="css/global.css" rel="stylesheet">

        <script type="text/javascript">
            $(function (){
                $('[title]')
                    .tooltip({container: 'body'});
            });
        </script>

    </head>
    <body>
        <div class="head">
            <div class="id-train">
                TRAIN
                <span class="numero"><?php echo $numero; ?></span>
                <span class="debfin"><?php echo $train[0]['gare'].' - '.$train[count($train)-1]['gare']; ?></span>
            </div>
            <div class="hdebfin">
                <?php echo substr($train[0]['debut'],0,5).' - '.substr($train[count($train)-1]['fin'],0,5); ?>
            </div>
            <div class="users">
                47 <span class="icon-users"></span>
            </div>
        </div>

        <div class="contenu">
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <div class="gros-bouton gros-bouton-jaune card">
                        <span class="icon-conducteur"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3 ">
                    <div class="gros-bouton gros-bouton-vert card">
                        <span class="icon-chat"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3 col-sm-offset-3">
                    <div class="gros-bouton gros-bouton-bleu card">
                        <span class="icon-envoiture"></span>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="gros-bouton gros-bouton-orange card">
                        <span class="icon-signal"></span>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
