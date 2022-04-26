<?php $title = 'Créer une histoire'; ?>

<?php ob_start(); ?>
    <div class="container my-2">
        <h1 class="mb-2">Mon compte</h1>

        <?php $content = ob_get_clean(); ?>
    </div>
<?php require('../base.php'); ?>