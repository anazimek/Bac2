<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
    <title><?php echo $this->fetch('title'); ?></title>
</head>
<body>
<?php echo $this->fetch('content'); ?>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title><?php echo $this->fetch('title'); ?></title>
</head>
<body>
<h3>Bonjour <?= $users->username ?>,</h3>
<p>
    Merci de votre inscription sur le blog.
</p>
<p>
    A bientôt !
<h2>Alexis</h2>
</p>
</body>
</html>