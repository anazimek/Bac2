<?php $this->layout = 'back'; ?>
<div class="articles content">
    <h1 class="text-center" style="font-weight: 800"><?= __('Articles') ?></h1>
    <a class="btn btn-success pull-right"
       href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'add', 'prefix' => 'admin']); ?>">Nouvel
        Article</a>
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
                                <td style="max-width: 100px"><img class="img-responsive" style="" src=" ../img/article/<?= $article->picture_url ?>"></td>
                            <?php }else {?>
                                <td><img class="img-responsive" style="" src=" ../../img/article/default.png"></td>
                            <?php }?>
                            <td><?= h($article->name) ?></td>
                            <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                            <td><?= $article->has('category') ? $this->Html->link($article->category->description, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                            <td><?= h($article->created) ?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-danger dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <i></i> <a
                                            href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view', $article->id]); ?>">Profil</a><br>
                                        <i></i> <a
                                            href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>">Editer</a><br>
                                        <i></i>
                                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
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
                                <td style="max-width: 100px"><img class="img-responsive" style="" src=" ../img/article/<?= $article->picture_url ?>"></td>
                            <?php }else {?>
                                <td><img class="img-responsive" style="" src=" ../../img/article/default.png"></td>
                            <?php }?>
                            </td>
                            <td><?= h($article->name) ?></td>
                            <td><?= $article->has('user') ? $this->Html->link($article->user->username, ['controller' => 'Users', 'action' => 'view', $article->user->id]) : '' ?></td>
                            <td><?= $article->has('category') ? $this->Html->link($article->category->description, ['controller' => 'Categories', 'action' => 'view', $article->category->id]) : '' ?></td>
                            <td><?= h($article->created) ?></td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-xs btn-danger dropdown-toggle" type="button"
                                            data-toggle="dropdown"
                                            aria-expanded="false"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-left" role="menu">
                                        <i></i> <a
                                            href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'view', $article->id]); ?>">Profil</a><br>
                                        <i></i> <a
                                            href="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'edit', $article->id]); ?>">Editer</a><br>
                                        <i></i>
                                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
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
