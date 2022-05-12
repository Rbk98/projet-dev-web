<?php
$title = 'UStory - Mes lectures';
ob_start();
?>

<div class="container my-3">
    <h2 class="h2_title my-2">Mes lectures</h2>
    <hr class="hr_content mb-5" />

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
                                <a type="submit" class="btn btn-success" href="index.php?action=rechercher">Lire une
                                    histoire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else {
            //s'il y a des histoires en cours de lecture
            if (!empty($startedReadings)) { ?>
                <div class="row mb-5 d-flex justify-content-center justify-content-lg-between align-items-center infos bg-light p-3 m-0">
                    <h4 class="intitule mx-2 text-center text-lg-left">Histoire(s) en cours de lecture</h4>
                </div>
                <div class="row mb-5">
                    <?php
                    foreach ($startedReadings as $reading) {
                        $cover = getCover($reading['id_cover']); ?>
                        <div class="col-6 col-lg-3 mb-5 mb-lg- ">
                            <div class="card">
                                <img src="public/images/cover4.jpg" class="card-img-top" alt="book_img">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate book_title"><?= $cover['title'] ?></h5>
                                    <span class="badge badge-pill badge_style mb-3"><?= $cover['genre'] ?></span>
                                    <p class="card-text  text-truncate--3"><?= $cover['summary'] ?></p>
                                    <div class="row">
                                        <div class="d-grid gap-2">
                                            <a href="index.php?action=lire-histoire&idb=<?= $reading['id_cover'] ?>&idc=<?= getReadingProgress($_SESSION['id'], $reading['id_cover']) ?>" class="btn btn-block btn-info px-2 mt-auto mb-2">Continuer
                                                la lecture</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php }
            //s'il y a des histoires finies
            if (!empty($finishedReadings)) { ?>
                <div class="row mb-5 d-flex justify-content-center justify-content-lg-between align-items-center infos bg-light p-3 m-0">
                    <h4 class="intitule mx-2 text-center text-lg-left">Lectures terminées</h4>
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