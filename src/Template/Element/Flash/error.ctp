<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-danger text-center" id="div" onclick="this.classList.add('hidden');"><?= $message ?></div>
<script>
    $('#div').delay(1500).slideUp(500);
</script>
