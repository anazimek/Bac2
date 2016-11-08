<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <?= $this->Flash->render('auth') ?>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?></legend>
                <div class="form-group">
                    <label for="pwd">Nom d'utilisateur:</label>
                    <?= $this->Form->input('username',['label' => false]) ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe:</label>
                    <?= $this->Form->input('password',['label' => false]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Se Connecter')); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>