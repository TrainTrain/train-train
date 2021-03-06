<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>TRAIN-TRAIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="../../dev/app/webroot/ressources/jquery.js"></script>
        <script src="../../dev/app/webroot/ressources/jquery.js"></script>
        <script src="../../dev/app/webroot/ressources/bootstrap/js/bootstrap.min.js"></script>
        <link href="../../dev/app/webroot/ressources/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="../../dev/app/webroot/ressources/fontello/css/graou.css">

        <link href="../../dev/app/webroot/css/index.css" rel="stylesheet">

    </head>
    <body>
        <div class="precontainer">
            <div id="train"><img src="../../dev/app/webroot/img/minitrain.png" height="32px" /></div>
        </div>
        <div class="container precontainer2">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                    <div class="logo text-center">
                        <img src="../../dev/app/webroot/img/logo_traintrain.svg" class="img-logo img-responsive">
                    </div>
                    <div class="mot-accueil">
                        Bienvenue !
                        <br>
                        <small>Veuillez vous connecter...</small>
                    </div>
                    <div class="choix-cnx">
                      <?php echo $this->Form->create('User'); ?>
                            <button type="submit" class="bouton-cnx bouton-facebook">Facebook</button>
                            <button type="submit" class="bouton-cnx bouton-twitter">Twitter</button>
                            <button type="submit" class="bouton-cnx bouton-google">Google</button>
                            <hr class="petit-trait">
                            <p class="help-block">Autre compte</p>
                            <div class="input-group petite-marge">
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                                <?php echo $this->Form->input('username', ['class' => 'form-control', 'type'=>'text', 'div' => false, 'label' => false, 'aria-describedby' => 'basic-addon1']); ?>
                                <!-- <input type="text" class="form-control" placeholder="Pseudo" aria-describedby="basic-addon1"> -->
                            </div>
                            <div class="input-group petite-marge">
                                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                                <?php echo $this->Form->input('password', ['class' => 'form-control', 'type'=>'password', 'div' => false, 'label' => false, 'aria-describedby' => 'basic-addon1']); ?>
                                <!-- <input type="password" class="form-control" placeholder="Mot de passe" aria-describedby="basic-addon1"> -->
                            </div>
                            <button type="submit" class="bouton-cnx bouton-secnx">Se connecter</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

        </script>

    </body>
</html>
