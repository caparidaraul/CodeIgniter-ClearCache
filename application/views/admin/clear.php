<div class="alert alert-dismissible alert-<?php echo (($status) ? 'success' : 'danger'); ?> col-10 fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4 class="alert-heading"><?php echo ($status) ? 'Success' : 'Error'; ?></h4>
    <p class="mb-0">
        <?php echo $message; ?>
    </p>
</div>