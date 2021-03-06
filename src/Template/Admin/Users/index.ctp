<?php $this->layout = 'back'; ?>
<div class="users content">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="text-center" style="font-weight: 800"><?= __('Utilisateurs') ?></h3>
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="row"><?= $this->Paginator->sort('picture_url') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('first_name') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('last_name') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('username') ?></th>
                    <th scope="row"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="row" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <?php if ($user->role_id != 1) { ?>
                        <tr>
                            <td><img class="img-responsive" style="" src=" ../img/user/<?= $user->picture_url ?>"></td>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td>
                                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', $user->id]); ?>">Profil</a><br>
                                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', $user->id]); ?>">Editer</a><br>
                                <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                        </tr>
                    <?php } ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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
