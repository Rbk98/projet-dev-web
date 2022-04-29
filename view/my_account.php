<?php $title = 'Mon compte'; ?>

<?php ob_start(); ?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mon compte</h2>
        <hr class="hr_content"/>
    </div>
    <div class="d-flex justify-content-center">
        <fieldset class="form bg-light p-4 my-3" style="width: 60%;">
            <div class="row">
                <div class="col-lg-5 pl-5">
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
                <div class="col-lg-1 d-flex">
                    <div class="vr"></div>
                </div>
                <div class="col-lg-6 justify-content-center">
                    <div class="row pl-5 my-5">
                        <h5><i class="bi bi-book-fill"></i> Vous avez lu ... histoires !</h5>
                    </div>
                    <div class="row pl-5 my-5">
                        <h5><i class="bi bi-book-half"></i> Vous avez commencé ... histoires !</h5>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>