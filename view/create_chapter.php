<?php $title = "Ajouter une histoire";
ob_start(); ?>
<div class="container my-5">
    <h2 class="h2_title"><?= $cover['title'] ?></h2>
    <hr class="hr_content" />
</div>

<div class="container mb-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-lg-5">
            <form name="creation_chapter" method="POST">
                <fieldset class="form bg-light p-4 background ">
                    <legend class="text-center mb-3">Création d'un chapitre</legend>
                    <div class="row mb-2">
                        <div class="col-12 mb-3">
                            <label for="title_chap" class="col-form-label">Titre</label>
                            <input type="text" placeholder="Titre du chapitre" name="title_chap" id="title_chap" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="content" class="col-form-label">Contenu</label>
                            <textarea class="form-control" placeholder="Contenu du chapitre" name='content' id="content" style="height: 100px"></textarea>
                        </div>
                        <div class="col-12 mb-5">
                            <label for="nb_choice" class="col-form-label">Nombre de choix possibles</label>
                            <input type="number" min="0" placeholder="Nombre de choix max" name="nb_choice" id="nb_choice" class="form-control" required>


                        </div>
                        <div class="col-12 d-grid gap-2 ">
                            <button type="submit" class="btn btn-success">Créer le chapitre</button>
                        </div>
                        <div class="text-center py-2">
                            <a href="index.php?action=afficher-livre&id=<?= $cover['id_cover'] ?>">Retour</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>