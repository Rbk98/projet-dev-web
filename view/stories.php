<?php $title = 'Les histoires en cours de lecture';
ob_start(); ?>

    <div class="container my-2">
        <h1 class="h2_title mb-2">Les histoires en cours de lecture</h1>
        <hr class="hr_content"/>

    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>