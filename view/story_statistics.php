<?php
$title = 'Statistiques de mon histoire';
ob_start(); ?>
<div class="row text-align-right">
    <div class="col-md-3 mr-5">
        <img src="public/images/book_1.jpg" class="img-fluid" alt="book_img">
    </div>
    <div class="col-md-4 mt-4 ml-5">
        <div class="row mb-4">
            <h3 class="h3_title text-center"><?=$book['title']?></h3>
        </div>
        <div class="row mb-3">
            <h6>Votre histoire a été lue par <?=$book['nb_reading']?> lecteurs.</h6>
        </div>
        <div class="row mb-3">
            <h6>Sur ces <?=$book['nb_reading']?> lecteurs, il y en a <?=$book['nb_win']?> qui ont réussi votre histoire !</h6>
        </div>
        <div class="row mb-3">
            <h6>Le taux de réussite de votre histoire est donc de <?=($book['nb_win']*100)/$book['nb_reading']?> %.</h6>
        </div>
    </div>

</div>


<?php $content = ob_get_clean();
require('base.php'); ?>