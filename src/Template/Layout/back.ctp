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
    <?= $this->Html->css('/css/bootstrap.css') ?>
    <?= $this->Html->css('/css/bootstrap.min.css') ?>


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
                    <a class="navbar-brand" href="/admin/articles">Articles</a>
                </div>
                <div class="collapse navbar-collapse ribbon" id="bs-example-navbar-collapse-1">
                    <a class="navbar-brand" href="/admin/utilisateur">Utilisateurs</a>
                    <a class="navbar-brand" href="/admin/commentaire">Commentaires</a>
                    <a class="navbar-brand pull-right" href="<?= $this->url->Build(['controller' => 'Users', 'action' => 'logout', 'prefix' => false]); ?>">Déconnexion</a>
                    <a class="navbar-brand pull-right" href="<?= $this->url->Build(['controller' => 'Users', 'action' => 'view', $this->request->session()->read('Auth.User.id')]); ?>">Mon Profil</a>
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

<footer style="background-color: black">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <h4 style="color: white">Pour me Contacter:</h4>
                <a target="_blank" href="https://www.facebook.com/profile.php?id=1212441263"><i class=" fa fa-facebook-square fa-3x" title="Facebook" href="https://www.facebook.com/profile.php?id=1212441263"></i></a>
                <a target="_blank" href="https://twitter.com/AlexisNazimek"><i class=" fa fa-twitter-square fa-3x" title="Twitter" ></i></a>
                <a target="_blank" href="https://www.instagram.com/alex_nzk/"><i class=" fa fa-instagram fa-3x" title="Instagram" ></i></a>
            </div>
        </div>
</footer>

<!--JS libraries-->
<?= $this->html->script('/js/jquery-3.1.1.min.js') ?>
<?= $this->html->script('/js/bootstrap.min.js') ?>
<?= $this->html->script('/js/jquery-3.1.1.js') ?>


</html>