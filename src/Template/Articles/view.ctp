<style>
    .com {
        overflow: auto;
        max-height: 500px;
    }
</style>
<?php if ($this->request->session()->read('Auth')['User']['role_id'] === 1) { ?>
    <?php $this->layout = 'back'; ?>
    <style>
        body{
            background-color: #856d4d;
        }
    </style>
<?php } ?>
<div class="articles content">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight: 800" class="text-center"><?= h($article->name) ?></h3>
                </div>
                <div class="panel-body">
                    <?php if ($article->picture_url != NULL) { ?>
                        <?= $this->Html->image('article/'.h($article->picture_url),['class' => 'img-responsive'])?>
                    <?php } else { ?>
                    <?php } ?>
                    <div class="col-md-12">
                        <?= $this->Text->autoParagraph(h($article->description)); ?>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-4 text-center">
                            <p style="color: red"><i class="fa fa-pencil-square-o"
                                                     aria-hidden="true"></i>
                                Auteur: <?= $article->has('user') ? ($article->user->username) : '' ?>
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p style="color: red"><i class="fa fa-bookmark"
                                                     aria-hidden="true"></i>
                                Catégorie: <?= $article->has('category') ? ($article->category->description) : '' ?>
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p style="color: red"><i class="fa fa-calendar"
                                                     aria-hidden="true"></i>
                                Date: <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight: 800" class="text-center">Commentaires</h3>
                </div>
                <div class="panel-body com" id="commentaire-<?= $article->id ?>">
                    <?php foreach ($article->comments as $comment): ?>
                        <div class="well">
                            <span class="label label-primary"><?= $comment->user->username ?></span> a dit
                            </p>
                            <div><?= $comment->description ?></div>
                            <?php if ($this->request->session()->read('Auth.User.id') === $comment->user_id) { ?>
                            <a class="btn btn-warning btn-xs" href="<?= $this->Url->Build(['controller' => 'Comments', 'action' => 'edit', $comment->id])?>">Editer</a>
                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'btn btn-danger btn-xs']) ?>
                            <?php }?>
                        </div>
                    <?php endforeach; ?>
                    <?php if ($this->request->session()->read('Auth.User.role_id') == 2) { ?>
                        <?= $this->Form->create($comments, ['url' => ['controller' => 'Comments', 'action' => 'add', $article->id]]) ?>
                        <?= $this->Form->input('description', ['label' => false, 'placeholder' => 'Nouveau Commentaire']); ?>
                        <?= $this->Form->button(__('Envoyer')) ?>
                        <?= $this->Form->end() ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>