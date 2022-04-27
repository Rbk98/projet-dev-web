<?php $title = 'Mon compte'; ?>

<?php ob_start(); ?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mon compte</h2>
        <hr class="hr_content"/>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>