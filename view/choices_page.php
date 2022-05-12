<?php $title = "Administration des choix"; ?>

<?php ob_start(); ?>
<div class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <h2 class="h2_title">Livre : <?= $cover['title'] ?></h2>
            <h4 class="text-center">Chapitre : <?= $chapter['title'] ?></h4>
            <hr class="hr_content" />
        </div>
    </div>

    <?php if (count($choices) == 0) { ?>

        <div class="row mt-5">
            <div class="col d-flex justify-content-center p-0">
                <div class="card text-center" style="width: 50rem;">
                    <div class="card-body">
                        <i class="fa fa-book fa-2x mb-4 icon"></i>
                        <p class="mb-4">Vous n'avez pour l'instant aucun choix associé à ce
                            chapitre. </br>Ajoutez un premier choix dès maintenant </p>
                        <a type="sumbit" class="btn btn-success" href="index.php?action=creer-choix&idCover=<?= $cover['id_cover'] ?>&idChapter=<?= $chapter['id_chapter'] ?>">Ajouter un
                            choix</a>
                        <div class="text-center py-2">
                            <a href="index.php?action=afficher-livre&id=<?= $cover['id_cover'] ?>">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="row mt-5">
            <?php foreach ($choices as $choice) { ?>
                <div class="col-12 col-lg-3 mb-5">
                    <a href="book_page.php" class="text-dark text-decoration-none">
                        <div class="card" href="book_page.php">
                            <div class="card-header text-center">
                                <h5 class=" text-center">Choix n°<?= $choice['id_choice'] ?></h5>
                                <span class="text-center"> <?php if ($choice['unsafe'] == 1) { ?>
                                        <span class="badge bg-danger">Dangereux</span>
                                    <?php } else { ?>
                                        <span class="badge bg-success">Inoffensif</span>
                                    <?php }  ?>
                                </span>
                            </div>
                            <div class="card-body text-center">
                                <p><?= $choice['title'] ?></p>
                                <a href="index.php?action=modifier-choix&idCover=<?= $choice['id_cover'] ?>&idChapter=<?= $choice['id_current_chapter'] ?>&idChoice=<?= $choice['id_choice'] ?>" class="btn btn-primary btn-block ">Modifier choix</a>
                                <form name="delete_cover" method="POST">
                                    <a href="index.php?action=supprimer-choix&idcov=<?= $choice['id_cover'] ?>&idchap=<?= $choice['id_current_chapter'] ?>&idchoice=<?= $choice['id_choice'] ?>" class="btn btn-danger btn-block my-2 px-2">Supprimer</a>
                                </form>
                            </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="text-center py-2">
        <a href="index.php?action=afficher-livre&id=<?= $cover['id_cover'] ?>">Retour au livre</a>
    </div>
</div>

</div>



<?php $content = ob_get_clean();
require('base.php'); ?>