<?php
$title = 'UStory - Erreur 403';
ob_start();
?>
    <div class="container my-5">
        <div class="form bg-light p-4 text-center">
            <div class="row justify-content-center mb-4">
                <div class="col-md-6 p-2">
                    <img src="public/images/blankpage.jpg" class="rounded img-fluid" alt="livre page blanche">
                </div>
            </div>
            <h4 class="py-4">Nous sommes désolées, mais vous ne pouvez pas accéder à cette page...</h4>
            <a href="index.php">Retourner à la page d'accueil</a>
        </div>
    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>