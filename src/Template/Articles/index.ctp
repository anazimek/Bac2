<?php if ($this->request->session()->read('Auth.User.role_id') === 1) { ?>
    <?php $this->layout = 'back'; ?>
    <style>
        body {
            background-color: #856d4d;
        }
    </style>
<?php } ?>
<style>
    .well:hover {
        -moz-box-shadow: 20px 20px 20px #ccc;
        -webkit-box-shadow: 20px 20px 20px #ccc;
        box-shadow: 5px 5px 5px #000000;
    }

    .article:hover {
        color: red;
    }

    .choix:hover {
        color: red;
    }

    #cat {
        cursor: pointer;
    }


</style>
<div class="row">
    <div class="col-md-2 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading 1" id="cat">
                <h4 class="text-center" style="font-weight: 800">Catégories</h4>
            </div>
            <div class="panel-body 2" style="display: none">
                <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'index']) ?>">
                    <div class="well">
                        <p>Tous les Articles</p>
                    </div>
                </a>
                <?php foreach ($categorie as $categories): ?>
                    <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'index', $categories->id]) ?>">
                        <div class="well choix">
                            <?= $categories->description ?>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <?php foreach ($articles as $article): ?>
            <?php if ($article->published == 1) { ?>
                <a href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view', $article->id]) ?>">
                    <div class="row well">
                        <div class="col-md-4">
                            <div style="z-index:1">
                                <?= $this->Html->image('article/' . h($article->picture_url), ['class' => 'img-responsive']) ?>
                            </div>
                            <div class="text-center"
                                 style="position:absolute;top:86px;z-index:2;background-color: #5cb85c;width: 60px;color: white">
                                <?= $article->has('category') ? ($article->category->description) : '' ?>
                            </div>
                        </div>
                        <div class="col-md-8 article">
                            <h3><?= h($article->name) ?></h3>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p style="color: royalblue"><i class="fa fa-pencil-square-o"
                                                               aria-hidden="true"></i> <?= $article->has('user') ? ($article->user->username) : '' ?>
                                    </p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <p style="color: royalblue"><i class="fa fa-calendar"
                                                               aria-hidden="true"></i> <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?>
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <p style="color: black"><?php $description = mb_substr($article->description, 0, 200);
                                    echo $description;
                                    echo (strlen($description) < strlen($article->description)) ? '...' : ''; ?></p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel" style="background-color: #A3C6C4">
                                <div class="panel-heading">
                                    <?php $nb = 0; ?>
                                    <?php foreach ($article->comments as $comment): ?>
                                        <?php count($comment->description);
                                        $nb++;
                                        ?>
                                    <?php endforeach; ?>
                                    <a class="btn btn-success btn-xs comments" id="<?= $article->id ?>"><i
                                            class="fa fa-comments" aria-hidden="true">
                                        </i> <?= $nb; ?></a>
                                </div>
                                <div class="panel-body" id="commentaire-<?= $article->id ?>" style="display: none">
                                    <?php foreach ($article->comments as $comment): ?>
                                        <div class="well">
                                            <span class="label label-primary"><?= $comment->user->username ?></span> a dit
                                            <div><?= $comment->description ?></div>
                                            <?php if ($this->request->session()->read('Auth.User.id') === $comment->user_id) { ?>
                                                <a class="btn btn-warning btn-xs"
                                                   href="<?= $this->Url->build(['controller' => 'Comments', 'action' => 'edit', $comment->id]) ?>">Editer</a>
                                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'btn btn-danger btn-xs']) ?>
                                            <?php } ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php if ($this->request->session()->read('Auth.User.role_id') === 2) { ?>
                                        <?= $this->Form->create($comments, ['url' => ['controller' => 'Comments', 'action' => 'add', $article->id]]) ?>
                                        <?= $this->Form->input('description', ['label' => false, 'placeholder' => 'Nouveau Commentaire']); ?>
                                        <?= $this->Form->button(__('Envoyer')) ?>
                                        <?= $this->Form->end() ?>
                                    <?php } ?>
                                </div>
                            </div>
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

<script>
    $(document).ready(function () {
        $("a.comments").css('cursor', 'Pointer');
        $('a.comments').bind('click', function () {
            var currentId = $(this).attr('id');
            $('#commentaire-' + currentId + '').toggle('slow');
            // $(this).attr('id');  gets the id of a clicked link that has a class of menu
        });
    });
    $(document).ready(function () {
        $(".1").click(function () {
            $(".2").animate({
                height: 'toggle'
            });
        });
    });
</script>
