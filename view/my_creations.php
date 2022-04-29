<?php $title = 'Mes creations'; ?>

<?php ob_start(); ?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mes créations</h2>
        <hr class="hr_content"/>
    </div>



<div class="container my-5"> 


    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card text-center" style="width: 30rem;">                
                <div class="card-body">
                     <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                    <p class="mb-4">Vous n'avez pour l'instant aucune histoire de créée. </br>Commencez à écrire votre première histoire dès maintenant </p>
                    <a type="sumbit" class="btn btn-success" href="create_story.php">Créer mon histoire</a>
                </div>
            </div>
        </div>   
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>