<?php $this->layout = 'back'; ?>
<div class="articles content">
    <a class="btn btn-success pull-right"
       href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'add', 'prefix' => 'admin']); ?>"><i class="fa fa-plus" aria-hidden="true"></i>
        Nouvel Article</a>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 style="font-weight: 800">Articles Publiés</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="row"><?= $this->Paginator->sort('picture_url') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('categorie_id') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="row" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                    <?php if ($article->published == true) { ?>
                        <tr>
                            <?php if ($article->picture_url != NULL) { ?>
                                <td style="max-width: 100px"><img class="img-responsive" style=""
                                                                  src=" ../img/article/<?= $article->picture_url ?>">
                                </td>
                            <?php } else { ?>
                                <td><img class="img-responsive" style="" src=" ../../img/article/default.png"></td>
                            <?php } ?>
                            <td><?= h($article->name) ?></td>
                            <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                            <td><?= $article->has('category') ? $this->Html->link($article->category->description, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                            <td><?= h($article->created) ?></td>
                            <td>
                                <a type="button" class="btn btn-success" data-toggle="modal"
                                   data-target="#<?= $article->id ?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Visualiser</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="<?= $article->id ?>" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"><h1
                                                class="text-center"><?= h($article->name) ?></h1></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="" id="cadre">
                                                <?php if ($article->picture_url != NULL) { ?>
                                                    <img class="img-responsive"
                                                         src=" ../../../../img/article/<?= $article->picture_url ?>">
                                                <?php } else { ?>
                                                <?php } ?>
                                                <div class="col-md-12">
                                                    <?= $this->Text->autoParagraph(h($article->description)); ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4 text-center">
                                                        <p><i class="fa fa-pencil-square-o"
                                                              aria-hidden="true"></i>Auteur: <?= $article->has('user') ? ($article->user->username) : '' ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <p><i class="fa fa-bookmark"
                                                              aria-hidden="true"></i>Catégorie: <?= $article->has('category') ? ($article->category->description) : '' ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><i class="fa fa-calendar"
                                                              aria-hidden="true"></i>Date: <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <?php foreach ($article->comments as $comment): ?>
                                                        <div class="well" >
                                                            <p>Commentaire de <span
                                                                    style="font-weight: 800"><?= $comment->user->username ?></span>
                                                            </p>
                                                            <div><?= $comment->description ?></div>
                                                            <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'btn btn-danger btn-xs']) ?>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <?php if($this->request->session()->read('Auth')['User']['id'] === $article->user_id) {?>
                                        <a class="btn btn-warning"
                                           href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editer</a>
                                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id), 'class' => 'btn btn-danger']) ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
                </tbody>
            </table>
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
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 style="font-weight: 800">Articles Brouillons</h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="row"><?= $this->Paginator->sort('picture_url') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('user_id') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('categorie_id') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="row" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                    <?php if ($article->published == false) { ?>
                        <tr>
                            <?php if ($article->picture_url != NULL) { ?>
                                <td style="max-width: 100px"><img class="img-responsive" style=""
                                                                  src=" ../img/article/<?= $article->picture_url ?>">
                                </td>
                            <?php } else { ?>
                                <td><img class="img-responsive" style="" src=" ../../img/article/default.png"></td>
                            <?php } ?>
                            </td>
                            <td><?= h($article->name) ?></td>
                            <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                            <td><?= $article->has('category') ? $this->Html->link($article->category->description, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                            <td><?= h($article->created) ?></td>
                            <td>
                                <a type="button" class="btn btn-success" data-toggle="modal"
                                   data-target="#<?= $article->id ?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Visualiser</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="<?= $article->id ?>" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel"><h1
                                                class="text-center"><?= h($article->name) ?></h1></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="" id="cadre">
                                                <?php if ($article->picture_url != NULL) { ?>
                                                    <img class="img-responsive"
                                                         src=" ../../../../img/article/<?= $article->picture_url ?>">
                                                <?php } else { ?>
                                                <?php } ?>
                                                <div class="col-md-12">
                                                    <?= $this->Text->autoParagraph(h($article->description)); ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-4 text-center">
                                                        <p><i class="fa fa-pencil-square-o"
                                                              aria-hidden="true"></i>Auteur: <?= $article->has('user') ? ($article->user->username) : '' ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <p><i class="fa fa-bookmark"
                                                              aria-hidden="true"></i>Catégorie: <?= $article->has('category') ? ($article->category->description) : '' ?>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p><i class="fa fa-calendar"
                                                              aria-hidden="true"></i>Date: <?= h($article->created->i18nFormat('dd-MMM-yyyy')) ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-warning"
                                           href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i> Editer</a>
                                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id), 'class' => 'btn btn-danger']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
                </tbody>
            </table>
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
