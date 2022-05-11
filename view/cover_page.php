<?php
$title = "UStory - Ajout d'histoire";
ob_start();
?>
    <div class="container my-5">
    <div class="row d-flex justify-content-center mb-5">
    <div class="col-7">
    <div class="row p-lg-5 bg-light background_type ">
        <div class="col-12 mb-4 ">
            <h2 class="h2_title"><?= $cover['title'] ?></h2>
            <hr class="hr_content"/>
        </div>
        <div class="col-12 d-flex justify-content-center mb-4">
            <img class="book_img" src="public/images/book_open_2.jpg" alt="image livre"/>
        </div>
        <div class="col-12 d-flex justify-content-center">
            <p class="text-justify">&nbsp;&nbsp;&nbsp;<?= $cover['summary'] ?></p>
        </div>

        <a href="index.php?action=modifier-livre&id=<?= $cover['id_cover'] ?>" class="btn btn-outline-primary mt-2">Modifier
            mon histoire</a>

        <?php if (count($chapters) != 0 && (count($chapters) < $cover['nb_chapters_max'])) { ?>
            <a type="submit" class="btn btn-success mt-4 "
               href="index.php?action=creer-chapitre&id=<?= $cover['id_cover'] ?>">Créer un
                chapitre</a>
        <?php } ?>

    </div>

<?php if (count($chapters) == 0) { ?>

    <div class="row mt-5">
        <div class="col d-flex justify-content-center p-0">
            <div class="card text-center" style="width: 50rem;">
                <div class="card-body">
                    <i class="fa fa-book fa-2x mb-4 icon"></i>
                    <p class="mb-4">Vous n'avez pour l'instant aucun chapitre associé à cette
                        histoire. </br>Commencez à écrire votre premier chapitre dès maintenant </p>
                    <a type="submit" class="btn btn-success"
                       href="index.php?action=creer-chapitre&id=<?= $cover['id_cover'] ?>">Créer un
                        chapitre</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<?php } else { ?>
    </div>
    </div>
    <div class="mb-4">
        <h2 class=text-center>Les chapitres créés : </h2>
        <hr class="hr_content"/>
    </div>
    <div class="row">
        <?php foreach ($chapters as $chapter) { ?>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center mb-3">Chapitre n°<?= $chapter['id_chapter'] ?> :</h5>
                        <h5 class="text-center blue"><?= $chapter['title'] ?></h5>
                    </div>

                    <div class="card-body ">

                        <p class="text_secondary">Résumé :</p>
                        <p class="card-text text-truncate--3 mb-4"><?= $chapter['content'] ?></p>
                        <a href="index.php?action=page-choix&idCover=<?= $chapter['id_cover'] ?>&idChapter=<?= $chapter['id_chapter'] ?>"
                           class="btn btn-success btn-block my-2 px-2">Voir les choix associés</a>
                        <a href="index.php?action=modifier-chapitre&idCover=<?= $chapter['id_cover'] ?>&idChapter=<?= $chapter['id_chapter'] ?>"
                           class="btn btn-outline-primary btn-block my-2 px-2">Modifier chapitre</a>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>