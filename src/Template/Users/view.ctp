<?php if ($this->request->session()->read('Auth')['User']['role_id'] === 1) { ?>
    <?php $this->layout = 'back'; ?>
    <style>
        body {
            background-color: #856d4d;
        }
    </style>
<?php } ?>
<div class="users content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center" style="font-weight: 800">Mes Informations</h3>
                </div>
                <div class="panel-body">
                    <?= $this->Html->image('user/'.h($user->picture_url),['class' => 'img-responsive center-block'])?>
                    <table class="table table-bordered">
                        <tr>
                            <th scope="row"><?= __('Prénom') ?></th>
                            <td><?= h($user->first_name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Nom') ?></th>
                            <td><?= h($user->last_name) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Nom d\'utilisateur') ?></th>
                            <td><?= h($user->username) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email') ?></th>
                            <td><?= h($user->email) ?></td>
                        </tr>
                    </table>
                    <?php if ($this->request->session()->read('Auth.User.id') == $user->id) { ?>
                        <a class="btn btn-danger center-block" id="1"
                           href="#">Modifier mes informations</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container" id="2" style="display: none">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <?= $this->Form->create($user, ['enctype' => 'multipart/form-data', 'url' => ['controller' => 'Users', 'action' => 'edit', $user->id]]) ?>
                        <div class="panel-heading">
                            <h2 class="text-center" style="font-weight: 800"><?= __('Editer mon profil') ?></h2>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usr">Nom:</label>
                                    <?= $this->Form->input('first_name', ['label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Prénom:</label>
                                    <?= $this->Form->input('last_name', ['label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Avatar:</label>
                                    <?= $this->Form->input('picture_url', ['type' => 'file', 'label' => false]); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pwd">Mot de passe:</label>
                                    <?= $this->Form->input('password', ['label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Email:</label>
                                    <?= $this->Form->input('email', ['label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label for="usr">Nom d'utilisateur:</label>
                                    <?= $this->Form->input('username', ['label' => false]); ?>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <?= $this->Form->button(__('Envoyer')) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center">Commentaires Publiés</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('article_id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($user->comments as $comment): ?>
                            <tr>
                                <td><?= $comment->has('article') ? $this->Html->link($comment->article->name, ['controller' => 'Articles', 'action' => 'view', $comment->article->id]) : '' ?></td>
                                <td><?= h($comment->description) ?></td>
                                <td><?= h($comment->created) ?></td>
                                <td>
                                    <?php if ($this->request->session()->read('Auth.User.id') === $user->id) { ?>
                                        <a class="btn btn-warning btn-xs"
                                           href="<?= $this->url->Build(['controller' => 'Comments', 'action' => 'edit', $comment->id]) ?>">Editer</a>
                                        <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Comments', 'action' => 'delete', $comment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->id), 'class' => 'btn btn-danger btn-xs']) ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#1").click(function () {
            $("#2").animate({height: 'toggle'});
        });
    });
</script>