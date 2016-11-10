<?php $this->layout = 'back'; ?>
<div class="articles content">
    <h1 class="text-center"><?= h($article->name) ?></h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">
            <?php if ($article->picture_url != NULL) { ?>
                <img class="" style="" src=" ../../../../img/article/<?= $article->picture_url ?>">
            <?php }else {?>
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div></div>
        <div></div>
        <div></div>
        <p>Auteur: <?= $article->has('user') ? ($article->user->username) : '' ?></p>
        <p>Catégorie: <?= $article->has('category') ? ($article->category->description) : '' ?></p>
        <p>Date: <?= h($article->created) ?></p>


    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($article->description)); ?>
    </div>
</div>
