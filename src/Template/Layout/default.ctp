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
            <div class="container-fluid" style="background-color:cornflowerblue">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Accueil</a>
                    <?php if (isset($this->request->session()->read('Auth')['User']['id'])): ?>
                    <a class="navbar-brand" id="connexion" href="<?= $this->url->Build(['controller' => 'Users', 'action' => 'logout'])?>">Deconnexion</a>
                    <a class="navbar-brand" href="/utilisateur/profil/<?=$this->request->session()->read('Auth')['User']['id']?>">Mon Profil</a>
                    <?php else: ?>
                    <a class="navbar-brand" id="connexion" href="/utilisateur/connexion">Connexion</a>
                    <a class="navbar-brand" href="/utilisateur/s'inscrire">S'inscrire</a>
                    <?php endif;?>
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
    <div class="container-fluid" style="background-color: cornflowerblue">
        <div class="row">
        </div>
</footer>

<!--JS libraries-->
<?= $this->html->script('../assets/global/plugins/jquery.min.js') ?>
<?= $this->html->script('../assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>


</html>