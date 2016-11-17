<div class="container-fluid" style="min-height: 500px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <?= $this->Flash->render('auth') ?>
            <?= $this->Form->create() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <?= __("Merci de rentrer vos nom d'utilisateur et mot de passe") ?>
                </div>
                <div class="panel-body">
                <div class="form-group">
                    <label for="pwd">Nom d'utilisateur:</label>
                    <?= $this->Form->input('username', ['label' => false]) ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Mot de passe:</label>
                    <?= $this->Form->input('password', ['label' => false]) ?>
                </div>
                <?= $this->Form->button(__('Se Connecter')); ?>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>