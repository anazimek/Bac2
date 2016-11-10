<div class="articles content">
    <style>

        .well {
            color: black;
        }

        .well:hover {
            -moz-box-shadow: 0 10px 20px #ccc;
            -webkit-box-shadow: 0 10px 20px #ccc;
            box-shadow: 0 10px 20px #ccc;
        }

        .article:hover {
            color: cornflowerblue;
        }

        img:hover {
            color: cornflowerblue;
        }

    </style>
    <h3><?= __('Articles') ?></h3>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php foreach ($articles as $article): ?>
                <?php if ($article->published == 1) { ?>
                    <a href="<?= $this->url->build(['controller' => 'Articles', 'action' => 'view', $article->id]) ?>">
                        <div class="row well">
                            <div class="col-md-4">
                                <div style="z-index:1">
                                    <img class="img-responsive" src="../../img/article/<?= h($article->picture_url) ?>">
                                </div>
                                <div class="text-center"
                                     style="position:absolute;top:92px;z-index:2;background-color: #5cb85c;width: 60px;color: white">
                                    <?= $article->has('category') ? ($article->category->description) : '' ?>
                                </div>
                            </div>
                            <div class="col-md-8 article">
                                <h3><?= h($article->name) ?></h3>
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <p style="color: cornflowerblue"><i class="fa fa-pencil-square-o"
                                                                            aria-hidden="true"></i> <?= $article->has('user') ? ($article->user->username) : '' ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p style="color: cornflowerblue"><i class="fa fa-calendar"
                                                                            aria-hidden="true"></i> <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?>
                                        </p>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <p><?php $description = mb_substr($article->description, 0, 200);
                                        echo $description;
                                        echo (strlen($description) < strlen($article->description)) ? '...' : ''; ?></p>
                                </div>
                                <!--
                                <!--<a class=" btn btn-success"
                               href="<?= $this->url->Build(['controller' => 'Articles', 'action' => 'view', $article->id]) ?>">Voir
                                l'article</a>-->
                            </div>
                        </div>
                    </a>
                <?php } ?>
            <?php endforeach; ?>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('precedent')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('suivant') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
    </div>
</div>
