<div class="container" style="min-height: 500px">
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?= $this->Form->create($comment) ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center" style="font-weight: 800"><?= __('Editer mon commentaire') ?></h4>
            </div>
            <div class="panel-body">
                <?= $this->Form->input('description',['class' => 'form-control','label' => false]); ?><br>
                <?= $this->Form->button(__('Envoyer'),['class' => 'btn btn-primary center-block']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
</div>