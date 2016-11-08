<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <?= $this->Form->create($user, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><h2><?= __('Nouveau Compte') ?></h2></legend>
            </fieldset>
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
        </div>
    </div>
    <div class="form-group text-center">
        <?= $this->Form->button(__('Envoyer')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>