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
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('../css/font-awesome.css') ?>
    <?= $this->Html->css('../css/font-awesome.min.css') ?>
    <?= $this->Html->css('../css/bootstrap.min.css') ?>
    <?= $this->Html->css('../css/bootstrap.min.css') ?>
    <?= $this->Html->css('../css/bootstrap-theme.css') ?>
    <?= $this->html->script('../js/jquery-3.1.1.min.js') ?>
    <?= $this->html->script('../js/bootstrap.min.js') ?>
    <?= $this->html->script('../js/jquery-ui.js') ?>


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
        <div class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/"><?= $this->html->image('logo1.PNG') ?></a>
                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <?php if (isset($this->request->session()->read('Auth')['User']['id'])): ?>
                        <a class="navbar-brand pull-right"
                           href="<?= $this->url->Build(['controller' => 'Users', 'action' => 'contact']) ?>">Contact</a>
                        <a class="navbar-brand pull-right" id="connexion"
                           href="<?= $this->url->Build(['controller' => 'Users', 'action' => 'logout']) ?>">Deconnexion</a>
                        <a class="navbar-brand pull-right"
                           href="/utilisateur/profil/<?= $this->request->session()->read('Auth')['User']['id'] ?>">Mon
                            Profil</a>
                        <?= $this->html->image('user/' . $this->request->session()->read('Auth')['User']['picture_url'], ['class' => 'navbar-brand pull-right']) ?>
                    <?php else: ?>
                        <a class="navbar-brand pull-right"
                           href="<?= $this->url->Build(['controller' => 'Users', 'action' => 'contact']) ?>">Contact</a>
                        <a class="navbar-brand pull-right" id="connexion" href="/utilisateur/connexion">Connexion</a>
                        <a class="navbar-brand pull-right" href="/utilisateur/s'inscrire">S'inscrire</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<body style="background-color: #856d4d">
<!--content-->
<div class="content">
    <div class="container">
        <div class="row">
            <?= $this->Flash->render();?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>

</body>

<footer>
    <div class="container-fluid" style="background-color: black">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <h4 style="color: white">En savoir plus sur moi:</h4>
                <a target="_blank" href="https://www.facebook.com/profile.php?id=1212441263"><i class=" fa fa-facebook-square fa-3x" title="Facebook" href="https://www.facebook.com/profile.php?id=1212441263"></i></a>
                <a target="_blank" href="https://twitter.com/AlexisNazimek"><i class=" fa fa-twitter-square fa-3x" title="Twitter" ></i></a>
                <a target="_blank" href="https://www.instagram.com/alex_nzk/"><i class=" fa fa-instagram fa-3x" title="Instagram" ></i></a>
            </div>
        </div>
    </div>
</footer>

<!--JS libraries-->


</html>