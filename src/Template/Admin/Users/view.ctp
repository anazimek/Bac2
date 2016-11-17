<?php $this->layout = 'back'; ?>
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
                <?php if($this->request->session()->read('Auth')['User']['id'] === $user->id) {?>
                <a class="btn btn-danger" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', 'prefix' => 'admin', $user->id])?>">Modifier mes informations</a>
                <?php } ?>
            </table>
        </div>
    </div>
    <div class="related">
        <h3><?= __('Articles') ?></h3>
        <?php if (!empty($user->articles)): ?>
            <table class="table table-bordered">
                <tr>
                    <th scope="row"><?= __('Image') ?></th>
                    <th scope="row"><?= __('Nom de l\'article') ?></th>
                    <th scope="row"><?= __('Contenu') ?></th>
                    <th scope="row"><?= __('Auteur') ?></th>
                    <th scope="row"><?= __('Catégorie') ?></th>
                    <th scope="row"><?= __('Créer') ?></th>
                    <th scope="row"><?= __('Modifier') ?></th>
                    <th scope="row"><?= __('Etat') ?></th>

                </tr>
                <?php foreach ($user->articles as $articles): ?>
                    <tr>
                        <?php if ($articles->picture_url != NULL) { ?>
                            <td><img class="img-responsive" style="" src=" ../../../img/article/<?= $articles->picture_url ?>"></td>
                        <?php }else {?>
                            <td><img class="img-responsive" style="" src=" ../../../img/article/default.png"></td>
                        <?php }?>
                        <td><?= h($articles->name) ?></td>
                        <td><?php $description = mb_substr($articles->description, 0, 200);
                            echo $description;
                            echo (strlen($description) < strlen($articles->description)) ? '...' : ''; ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= $newCategorie[$articles->categorie_id] ?></td>
                        <td><?= h($articles->created) ?></td>
                        <td><?= h($articles->modified) ?></td>
                        <td><?= $articles->published ? __('Publier') : __('Brouillon'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>
