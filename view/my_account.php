<?php
$title = 'Mon compte';
ob_start();
?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mon compte</h2>
        <hr class="hr_content"/>

        <div class="d-flex justify-content-center py-4">
            <fieldset class="form bg-light p-5 my-4">
                <div class="row px-5">
                    <div class="col">
                        <div class="row mb-3">
                            <h4>Mes informations personnelles :</h4>
                        </div>
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
                            <div class="row">
                                <h5><i class="bi bi-check-all"></i> Admin</h5>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row px-5 pt-3">
                    <div class="col bg-gray-100 justify-content-center">
                        <div class="row mb-3">
                            <h4>Mes informations de lecture :</h4>
                        </div>
                        <div class="row mb-3">
                            <h5><i class="bi bi-book-fill"></i> Vous avez lu <?= $user['nb_reading'] ?> histoire(s) !</h5>
                        </div>
                        <div class="row mb-1">
                            <h5><i class="bi bi-book-half"></i> Vous avez commencé ... histoire(s) !</h5>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>