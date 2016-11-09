<?php $this->layout = 'back'; ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-3">
            <?= $this->Form->create($article, ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><h2><?= __('Editer l\'Article') ?></h2></legend>
            </fieldset>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="usr">Nom de l'article:</label>
                    <?= $this->Form->input('name', ['label' => false]); ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Description:</label>
                    <?= $this->Form->input('description', ['label' => false]); ?>
                </div>
                <div class="form-group">
                    <label for="pwd">Image:</label>
                    <?= $this->Form->input('picture_url', ['type' => 'file', 'label' => false]); ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pwd">Catégorie:</label>
                    <?= $this->Form->input('categorie_id', ['label' => false]); ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->input('published'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group text-center">
        <?= $this->Form->button(__('Envoyer')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
