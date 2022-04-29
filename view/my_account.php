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
                        <h5><i class="bi bi-person-lines-fill"></i> <?= $user['nickname'] ?></h5>
                    </div>
                    <div class="row mb-3">
                        <h5><i class="bi bi-calendar-event"></i> <?= $user['birth'] ?></h5>
                    </div>
                    <div class="row mb-3">
                        <h5><i class="bi bi-at"></i><?= $user['mail'] ?></h5>
                    </div>
                    <?php if ($user['role'] == 0) { ?>
                        <div class="row mb-3">
                            <h5><i class="bi bi-check"></i> Lecteur</h5>
                        </div>
                    <?php } else if ($user['role'] == 1) { ?>
                        <div class="row mb-3">
                            <h5><i class="bi bi-check-all"></i> Admin</h5>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-lg-1 d-flex">
                    <div class="vr"></div>
                </div>
                <div class="col-lg-6 justify-content-center">
                    <div class="row pl-5 my-5">
                        <h5><i class="bi bi-book-fill"></i> Vous avez lu <?=$user['nb_reading'] ?> histoire(s) !</h5>
                    </div>
                    <div class="row pl-5 my-5">
                        <h5><i class="bi bi-book-half"></i> Vous avez commencé ... histoire(s) !</h5>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>