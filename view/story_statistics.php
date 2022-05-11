<?php
$title = 'UStory - Statistiques de l\'histoire';
ob_start(); ?>
    <div class="container my-5">
        <div class="form bg-light mt-2 p-4 text-center">
            <div class="row mb-3">
                <h4 class="text-center">Statistiques de l'histoire : <?= $cover['title'] ?></h4>
            </div>
            <div class="row d-flex justify-content-center mb-4">
                <div class="col-xl-6 col-md-6 p-2 j">
                    <img src="public/images/cover.jpg" width="300px" height="auto" class="rounded img-fluid"
                         alt="livre page blanche">
                </div>
            </div>
            <div class="row mb-3">
                <h6><i class="bi bi-arrow-right"></i> Votre histoire a été lue par <?= $cover['nb_reading'] ?> lecteurs.</h6>
            </div>

            <div class="row mb-3">
                <h6><i class="bi bi-arrow-right"></i> Sur ces <?= $cover['nb_reading'] ?> lecteurs, il y en a <?= $cover['nb_win'] ?> qui ont réussi
                    votre histoire !</h6>
            </div>
            <div class="row">
                <h6><i class="bi bi-arrow-right"></i> Le taux de réussite de votre histoire est donc
                    de <?= round(($cover['nb_win'] * 100) / $cover['nb_reading'], 2) ?> %.</h6>
            </div>
        </div>
        <div class="text-center pt-4">
            <a href="index.php?action=mes-creations">Retourner à mes créations</a>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>