<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta content="Blog d'Alexis"
          name="description"/>
    <meta content="" name="Alexis"/>

    <title>Blog d'Alexis</title>
    <!-- couleur rose: #ed1450 -->
    <!--CSS styles-->
    <?= $this->Html->css('../css/bootstrap.css') ?>
    <?= $this->Html->css('../css/bootstrap.min.css') ?>
    <?= $this->Html->css('front.css') ?>



    <!--favicon-->
    <?= $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        ['type' => 'icon']
    );
    ?>

</head>
<header>
    <nav id="menu">
        <div class="navbar navbar-default">
            <div class="container-fluid" style="background-color: red">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand <?php if ($this->request->here == '/'): ?>active <?php endif; ?>" href="/">Accueil</a>
                    <a class="btn btn-default" id="connexion" href="./utilisateur/connexion" style="background-color: yellow">Connexion</a>
                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<body>

<!--content-->
<div class="content">
    <div class="container">
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>

</body>

<footer>
    <div class="container-fluid" style="background-color: red">
        <div class="row">
            <div class="col-md-8">
                <h4>1 Avenue Général de Gaulle, 88000 Épinal</h4>
                <p>03 29 33 88 88 </p>
            </div>
            <div class="col-md-4">
                <h4>Vous voulez en savoir plus?</h4>
                <p>alexis.nazimek88@gmail.com</p>
            </div>
        </div>
</footer>

<!--JS libraries-->
<?= $this->html->script('../assets/global/plugins/jquery.min.js') ?>
<?= $this->html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


</html>