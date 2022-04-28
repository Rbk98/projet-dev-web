<?php $title = 'Mon compte'; ?>

<?php ob_start(); ?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mon compte</h2>
        <hr class="hr_content"/>
    </div>
    <div class="container mx-5">
        <fieldset class="bg-light p-3">
            <div class="row">
                <div class="col-5">
                    <div class="row mb-3">
                        <h5><i class="bi bi-person-lines-fill"></i> Nom</h5>
                    </div>
                    <div class="row mb-3">
                        <h5><i class="bi bi-calendar-event"></i> Date de naissance</h5>
                    </div>  
                    <div class="row mb-3">
                        <h5><i class="bi bi-at"></i> E-mail</h5>
                    </div>
                    <div class="row mb-3">
                        <h5><i class="bi bi-shield-lock"></i> Mot de passe</h5>
                    </div>
                    <div class="row mb-3">
                        <h5><i class="bi bi-check"></i> Lecteur</h5>
                    </div>
                    <div class="row mb-3">
                        <h5><i class="bi bi-check-all"></i> Admin</h5>
                    </div>
                </div>  
                <div class=" col-1 d-flex">
                    <div class="vr"></div>
                </div>
                <div class="col-6">
                    <div class="row m-5">
                        <h5><i class="bi bi-book-fill"></i> Vous avez lu ... histoires !</h5>
                    </div>
                    <div class="row m-5">
                        <h5><i class="bi bi-book-half"></i> Vous avez commencé ... histoires !</h5>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>