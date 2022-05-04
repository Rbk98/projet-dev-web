<?php
$title = 'Mes lectures';
ob_start();
?>

<div class="container my-2">
    <h2 class="h2_title my-2">Mes lectures</h2>
    <hr class="hr_content"/>

    <?php if (isset($_SESSION['nickname'])) {
        //s'il n'y a pas encore d'histoire commencée
        if (empty($readingsStarted) && empty($readingsFinished)) { ?>
            <div class="container my-5">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <div class="card text-center" style="width: 30rem;">
                            <div class="card-body">
                                <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                                <p class="mb-4">Vous n'avez pour l'instant lu aucune histoire. </br>Commencez à lire
                                    votre première histoire dès maintenant ! </p>
                                <a type="sumbit" class="btn btn-success" href="index.php?action=rechercher">Lire une
                                    histoire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else {
            //s'il y a des histoires en cours de création
            if (!empty($startedReadings)) { ?>
                <div class="">
                    <h4>Histoire(s) en cours de lecture</h4>
                    <hr class="hr_line"/>
                </div>
                <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
                    <?php
                    foreach ($booksStarted as $book) { ?>
                        <div class="col-2">
                            <div class="card h-75">
                                <img src="public/images/<?= $book['image'] ?>" class="card-img-top py-3" alt="book_img">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $book['title'] ?></h5>
                                    <!-- ref à changer -->
                                    <a href="#" class="btn btn-primary px-2">Continuer
                                        la lecture</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php}
            //s'il y a des histoires en cours de création ET des histoires finies
            if (!empty($finishedReadings) && !empty($startedReadings)) { ?>
                <div class="mb-2 mx-2">
                    <hr class="hr_content"/>
                </div>
            <?php }
            //s'il y a des histoires finies
            if (!empty($finishedReadings)) { ?>
                <div class="container m-3">
                    <h4>Lectures terminées</h4>
                    <hr class="hr_line"/>
                </div>
                <?php
                foreach ($finishedReadings as $book) { ?>

                    <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
                        <div class="col-3 mb-5">
                            <div class="card h-100">
                                <img src="public/images/<?= $book['image'] ?>" class="card-img-top p-3" alt="book_img">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $book['title'] ?></h5>
                                    <span class="badge bg-info text-dark"><?= $book['genre'] ?></span>
                                    <p class="card-text"><?= $book['summary'] ?></p>
                                    <btn href="index.php?action=lire-histoire" class="btn btn-primary px-2">Relire</btn>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            }
        }
    } ?>
</div>
<?php $content = ob_get_clean();

require('base.php'); ?>