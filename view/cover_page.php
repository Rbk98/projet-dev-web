<?php
$title = "UStory - Ajout d'histoire";
ob_start();
?>
<div class="row d-flex justify-content-between mt-3 mx-2">
    <div class=" col-12 col-lg-auto text-center mb-3">
        <a class="btn btn-outline-primary px-3 py-2 btn-block" href="index.php?action=mes-creations">Retour à mes créations</a>
    </div>
    <?php if (count($chapters) != 0) { ?>
        <div class=" col-12 col-lg-auto text-center">
            <button type="button" class="btn btn-block btn-primary px-3 py-2" data-toggle="modal" data-target="#modal<?= $cover['id_cover'] ?>">
                Finaliser mon histoire
            </button>
            <div class="modal fade" id="modal<?= $cover['id_cover'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Valider son
                                histoire</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Etes-vous sûr de vouloir valider la création de cette histoire ? <br>Vous devez faire attention d'avoir bien créé les chapitres et les choix nécessaires pour chaque parcours de l'histoire.
                            <br><br>En effet, chaque parcours possède une fin, c'est-à-dire qu'il ne possède pas de chapitre suivant.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                            </button>
                            <a href="index.php?action=valider-configuration-histoire&id=<?= $cover['id_cover'] ?>&idc=1" class="btn btn-primary px-2 mt-auto">
                                Finaliser l'histoire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="container my-5">

    <div class="row d-flex justify-content-center mb-5">
        <div class="col-10 col-lg-7">
            <div class="row p-3 p-lg-5 bg-light background_type ">
                <div class="col-12 mb-4 ">
                    <h2 class="h2_title my-2"><?= $cover['title'] ?></h2>
                    <hr class="hr_content mb-5" />
                </div>
                <div class="col-12 d-flex justify-content-center mb-4">
                    <img class="card-img-top" src="public/images/book_open_2.jpg" alt="image livre" />
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <p class="text-justify">&nbsp;&nbsp;&nbsp;<?= $cover['summary'] ?></p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="index.php?action=modifier-livre&id=<?= $cover['id_cover'] ?>" class="btn btn-block btn-outline-primary mt-2">Modifier
                        mon histoire</a>
                </div>


                <?php if (count($chapters) != 0 && (count($chapters) < $cover['nb_chapters_max'])) { ?>
                    <div class="d-flex justify-content-center">
                        <a type="submit" class="btn btn-success btn-block mt-4 " href="index.php?action=creer-chapitre&id=<?= $cover['id_cover'] ?>">Créer un
                            chapitre</a>
                    </div>

                <?php } ?>

            </div>

            <?php if (count($chapters) == 0) { ?>

                <div class="row mt-5">
                    <div class="col d-flex justify-content-center p-lg-0">
                        <div class="card text-center" style="width: 50rem;">
                            <div class="card-body">
                                <i class="fa fa-book fa-2x mb-4 icon"></i>
                                <p class="mb-4">Vous n'avez pour l'instant aucun chapitre associé à cette
                                    histoire. </br>Commencez à écrire votre premier chapitre dès maintenant </p>
                                <a type="submit" class="btn btn-success" href="index.php?action=creer-chapitre&id=<?= $cover['id_cover'] ?>">Créer un
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
    <hr class="hr_content" />
</div>
<div class="row mb-5">
    <?php foreach ($chapters as $chapter) { ?>
        <div class="col-12 col-lg-3 mb-5 ">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center text-truncate pt-2">Chapitre n°<?= $chapter['id_chapter'] ?>:</h5>
                    <h5 class="text-center blue text-truncate pt-2"><?= $chapter['title'] ?></h5>
                </div>
                <div class="card-body ">
                    <p class="text_secondary">Contenu :</p>
                    <p class="card-text text-truncate--3 mb-4"><?= $chapter['content'] ?></p>
                    <a href="index.php?action=page-choix&idCover=<?= $chapter['id_cover'] ?>&idChapter=<?= $chapter['id_chapter'] ?>" class="btn btn-success btn-block my-2 px-2">Voir les choix associés</a>
                    <a href="index.php?action=modifier-chapitre&idCover=<?= $chapter['id_cover'] ?>&idChapter=<?= $chapter['id_chapter'] ?>" class="btn btn-outline-primary btn-block my-2 px-2">Modifier chapitre</a>
                    <button type="button" class="btn btn-danger btn-block mt-2" data-toggle="modal" data-target="#modalDelete<?= $chapter['id_cover'] ?>">
                        Supprimer
                    </button>
                    <div class="modal fade" id="modalDelete<?= $chapter['id_cover'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Supprimer un
                                        chapitre</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Etes-vous sûr de vouloir supprimer ce chapitre ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                    </button>
                                    <form name="delete_cover" method="POST">
                                        <a href="index.php?action=supprimer-chapitre&idcov=<?= $chapter['id_cover'] ?>&idchap=<?= $chapter['id_chapter'] ?>" class="btn btn-danger btn-block my-2 px-2">Supprimer</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?php } ?>
</div>


<?php $content = ob_get_clean();
require('base.php'); ?>