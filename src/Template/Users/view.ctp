<div class="users content">
    <div class="row">
        <div class="col-md-3">
            <img class="img-responsive" src=" ../../../img/user/<?= $user->picture_url ?>">
        </div>
        <div class="col-md-7">
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
                <a class="btn btn-danger"
                   href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', $user->id]) ?>">Modifier
                    mes informations</a>
            </table>
        </div>
    </div>
</div>
