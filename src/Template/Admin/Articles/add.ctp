<?php $this->layout = 'back'; ?>
<?= $this->html->script('/js/jquery-3.1.1.min.js') ?>
<?= $this->html->script('/js/bootstrap.min.js') ?>
<?= $this->html->script('/js/jquery-3.1.1.js') ?>
<div id="ajout">

</div>
<script>
    var url = '../../../articles/add';

    $('#ajout').load(url, function () {
    });
</script>
