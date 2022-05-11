<?php
$title = 'UStory - Statistiques de l\'histoire';
ob_start(); ?>
    <div class="container my-2">

        <div class="row text-align-right">
            <div class="col-md-3 mr-5">
                <img src="public/images/book_1.jpg" class="img-fluid" alt="book_img">
            </div>
            <div class="col-md-4 mt-4 ml-5">
                <div class="row mb-4">
                    <h3 class="h3_title text-center"><?= $cover['title'] ?></h3>
                </div>
                <div class="row mb-3">
                    <h6>Votre histoire a été lue par <?= $cover['nb_reading'] ?> lecteurs.</h6>
                </div>
                <div class="row mb-3">
                    <h6>Sur ces <?= $cover['nb_reading'] ?> lecteurs, il y en a <?= $cover['nb_win'] ?> qui ont réussi
                        votre histoire !</h6>
                </div>
                <div class="row mb-3">
                    <h6>Le taux de réussite de votre histoire est donc
                        de <?= ($cover['nb_win'] * 100) / $cover['nb_reading'] ?> %.</h6>
                </div>
            </div>

        </div>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>