<style>
    #cadre{
        border: 1px solid black;
        background-color: white;
    }
</style>

<div class="articles content">
    <h1 class="text-center" style="font-weight: 800"><?= h($article->name) ?></h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3" id="cadre">
            <?php if ($article->picture_url != NULL) { ?>
                <img class="img-responsive" src=" ../../../../img/article/<?= $article->picture_url ?>">
            <?php } else { ?>
            <?php } ?>
            <div class="col-md-12">
                <?= $this->Text->autoParagraph(h($article->description)); ?>
            </div>
            <div class="col-md-12">
                <div class="col-md-4 text-center">
                    <p style="color: red"><i class="fa fa-pencil-square-o"
                          aria-hidden="true"></i> Auteur: <?= $article->has('user') ? ($article->user->username) : '' ?>
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <p style="color: red"><i class="fa fa-bookmark"
                          aria-hidden="true"></i> Catégorie: <?= $article->has('category') ? ($article->category->description) : '' ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <p style="color: red"><i class="fa fa-calendar"
                          aria-hidden="true"></i> Date: <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>