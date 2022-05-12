<?php $title = "Ajouter un choix";
ob_start(); ?>
<div class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <h2 class="h2_title">Livre : <?= $cover['title'] ?></h2>
            <h4 class="text-center">Chapitre : <?= $chapter['title'] ?></h4>
            <hr class="hr_content" />
        </div>
    </div>


    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-lg-5">
            <form name="creation_chapter" method="POST">
                <fieldset class="form bg-light p-4 background ">
                    <legend class="text-center ">Modifier le choix :</legend>
                    <p class="text-center"> <?= $choice['title'] ?></p>
                    <div class="row mb-2">
                        <div class="col-12 mb-3">
                            <label for="choice_name" class="col-form-label">Nom</label>
                            <input type="text" placeholder="Nom du choix" name="choice_name" value="<?= $choice['title'] ?>" id="choice_name" class="form-control" required>
                        </div>

                        <div class="col-12 mb-4">
                            <label for="genre" class="col-form-label ">Chapitre suivant</label>
                            <select class="form-select" name="next_chapter" id="next_chapter" required>
                                <?php if ($choice['id_next_chapter'] == $choice['id_current_chapter']) { ?>
                                    <option value="end">Aucune suite</option>
                                <?php } else { ?>
                                    <option value="<?= $choice['id_next_chapter'] ?>"> Chapitre n°<?= $choice['id_next_chapter'] ?></option>
                                    <option value="end">Aucune suite</option>
                                <?php } ?>

                                <?php foreach ($chapters as $chap) {
                                    if (($chap['id_chapter'] != $chapter['id_chapter']) && ($chap['id_chapter'] != $choice['id_next_chapter'])) { ?>

                                        <option value="<?= $chap['id_chapter'] ?>">Chapitre n°<?= $chap['id_chapter'] ?> : <?= $chap['title'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <p class="ml-2">Sélectionnez si ce choix est dangereux :</p>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="unsafe" id="safe" value="0" <?php
                                                                                                                if ($choice['unsafe'] == 0) { ?> checked <?php } ?>>
                                <label class="form-check-label" for="safe">Inoffensif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="unsafe" id="unsafe" value="1" <?php
                                                                                                                    if ($choice['unsafe'] == 1) { ?> checked <?php } ?>>
                                <label class="form-check-label" for="unsafe">Dangereux</label>
                            </div>
                        </div>

                        <div class="col-12 d-grid gap-2 ">
                            <button type="submit" class="btn btn-success">Modifier le choix</button>
                        </div>
                        <div class="text-center py-2">
                            <a href="index.php?action=page-choix&idCover=<?= $cover['id_cover'] ?>&idChapter=<?= $chapter['id_chapter'] ?>">Retour</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>