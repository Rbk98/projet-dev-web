<?php
$title = 'Mes créations';
ob_start();
?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mes créations</h2>
        <hr class="hr_content"/>


    </div>

<?php
if (isset($_SESSION['nickname']) && isset($_SESSION['role'])) {
    //s'il n'y a pas encore d'histoire créée
    if (empty($booksStarted) && empty($booksFinished)) {
        ?>
        <div class="container my-5">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card text-center" style="width: 30rem;">
                        <div class="card-body">
                            <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                            <p class="mb-4">Vous n'avez pour l'instant créé aucune histoire. <br/>Commencez à écrire
                                votre première histoire dès maintenant ! </p>
                            <a type="sumbit" class="btn btn-success" href="index.php?action=creer-histoire">Créer mon
                                histoire</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } else {
            //s'il y a des histoires en cours de création
            if (!empty($startedBooks)) { ?>
                <div class="">
                    <h4>Histoire(s) en cours de création</h4>
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
                                    <a href="index.php?action=modifier-histoire" class="btn btn-primary px-2">Continuer
                                        l'édition</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-2">
                        <div class="card h-75">
                            <div class="card-body">
                                <a href="index.php?action=creer-histoire"><i class="bi bi-plus-circle"
                                    style="font-size:100px; "></i></a>
                                <h6 class="card-title mt-5 d-flex justify-content-center">Créer une nouvelle histoire</h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php}
            //s'il y a des histoires en cours de création ET des histoires finies
            if (!empty($finishedBooks) && !empty($startedBooks)) { ?>
            <!--<div class="mb-2 mx-2">
                <hr class="hr_content"/>
            </div>-->
            <?php }
            //s'il y a des histoires finies
            if (!empty($finishedBooks)) { ?>
                <div class="container m-3">
                    <h4>Histoires terminées</h4>
                    <hr class="hr_line"/>
                </div>
                <?php

                foreach ($finishedBooks as $book) { ?>

                    <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
                        <div class="col-3 mb-5">
                            <div class="card h-100">
                                <img src="public/images/<?= $book['image'] ?>" class="card-img-top p-3" alt="book_img">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $book['title'] ?></h5>
                                    <span class="badge bg-info text-dark"><?= $book['genre'] ?></span>
                                    <p class="card-text"><?= $book['summary'] ?></p>
                                    <?php
                                    if ($book['state'] == 2) { ?>
                                        <a href="index.php?action=mon-histoire&1" class="btn px-2 mb-2 btn-success">
                                            <i class="bi bi-eye"></i> Publié</a>
                                        <a href="index.php?action=info-histoire" class="btn btn-light px-2">
                                            <i class="bi bi-graph-up"></i> Voir mes statistiques</a>
                                    <?php } else if ($book['state'] == 3) { ?>
                                        <a href="index.php?action=info-histoire" class="btn btn-secondary px-2">
                                            <i class="bi bi-eye-slash"></i> Non publié</a>
                                    <?php } ?>
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