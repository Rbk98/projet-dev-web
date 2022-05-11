<?php
$title = 'UStory - Mes lectures';
ob_start();
?>

<div class="container my-2">
    <h2 class="h2_title my-2">Mes lectures</h2>
    <hr class="hr_content" />

    <?php if (isset($_SESSION['nickname'])) {
        //s'il n'y a pas encore d'histoire commencée
        if (empty($startedReadings) && empty($finishedReadings)) { ?>
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
            //s'il y a des histoires en cours de lecture
            if (!empty($startedReadings)) { ?>
                <div>
                    <h4>Histoire(s) en cours de lecture</h4>
                    <hr class="hr_line" />
                </div>
                <div class="row mb-5">
                    <?php
                    foreach ($startedReadings as $reading) {
                        $cover = getCover($reading['id_cover']); ?>
                        <div class="col-6 col-lg-3 mb-5">
                            <div class="card">
                                <img src="public/images/cover4.jpg" class="card-img-top" alt="book_img">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate book_title"><?= $cover['title'] ?></h5>
                                    <span class="badge badge-pill badge_style mb-3"><?= $cover['genre'] ?></span>
                                    <p class="card-text  text-truncate--3"><?= $cover['summary'] ?></p>
                                    <a href="index.php?action=lire-histoire&idb=<?= $reading['id_cover'] ?>&idc=<?= getReadingProgress($_SESSION['id'], $reading['id_cover']) ?>" class="btn btn-info px-2 mt-auto">Continuer
                                        la lecture</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            //s'il y a des histoires finies
            if (!empty($finishedReadings)) { ?>
                <div>
                    <h4>Lectures terminées</h4>
                    <hr class="hr_line" />
                </div>
                <div class="row mb-5">
                    <?php foreach ($finishedReadings as $reading) {
                        $cover = getCover($reading['id_cover']); ?>
                        <div class="col-6 col-lg-3 mb-5">
                            <div class="card">
                                <img src="public/images/cover4.jpg" class="card-img-top" alt="book_img">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate book_title"><?= $cover['title'] ?></h5>
                                    <span class="badge badge-pill badge_style mb-3"><?= $cover['genre'] ?></span>
                                    <p class="card-text  text-truncate--3"><?= $cover['summary'] ?></p>
                                    <a href="index.php?action=lire-histoire&idb=<?= $reading['id_cover'] ?>&idc=1" class="btn btn-primary px-2">Relire l'histoire</a>
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