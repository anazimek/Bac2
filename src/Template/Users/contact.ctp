<div class="container" style="min-height: 500px">
    <div class="row">
        <div class="col-md-12">
          <h3>Une suggestion à propos d'un article ? Une envie de publier un article sur ce blog ? ou tout simplement une question à me poser ?
          N'hésitez pas à me formuler votre demande via le formulaire de contact ci-dessous.</h3>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <?= $this->Form->create() ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3>Formulaire de contact</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <?= $this->Form->input('nom', ['class' => 'form-control','placeholder' => 'Nom et Prénom', 'label' => false]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('email', ['class' => 'form-control','placeholder' => 'Adresse Email', 'label' => false]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->input('message', ['class' => 'form-control','type' => 'textarea', 'placeholder' => 'Votre Message', 'label' => false]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->button(__('Envoyer'), ['class' => 'btn btn-primary center-block']) ?>
                    </div>
                </div>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
