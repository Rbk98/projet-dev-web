<?php $title = "Modifier son histoire";
ob_start();
?>
<div class="container my-5">
    <h2 class="h2_title">Modification de l'histoire</h2>
    <hr class="hr_content" />
</div>

<div class="container mb-5 ">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-lg-7">
            <form name="update_cover" method="POST">
                <fieldset class="form bg-light p-4">
                    <div class="row mb-2">
                        <div class="col-12 mb-3">
                            <label for="title" class="col-form-label">Titre</label>
                            <input type="text" placeholder="Titre de votre histoire" name="title" id="title" class="form-control" value="<?= $cover['title'] ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="resume" class="col-form-label">Résumé</label>
                            <textarea class="form-control" name="summary" id="summary" style="height: 100px" required><?= $cover['summary'] ?></textarea>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="nb_lives" class="col-form-label">Nombre de vies</label>
                            <input type="number" placeholder="Nombre de vies" name="nb_lives" id="nb_lives" class="form-control" value="<?= $cover['nb_lives'] ?>" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <label for="nb_chapters_max" class="col-form-label">Nombre de chapitres max</label>
                            <input type="number" placeholder="Nombre de chapitres max" name="nb_chapters_max" id="nb_chapters_max" class="form-control" value="<?= $cover['nb_chapters_max'] ?>" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="genre" class="col-form-label ">Genre</label>
                            <select class="form-select" name="genre" id="genre" required>
                                <option value="">Sélectionnez le genre de votre livre</option>
                                <option value="Fantastique">Fantastique</option>
                                <option value="Aventure">Aventure</option>
                                <option value="Comédie">Comédie</option>
                                <option value="Romance">Romance</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Drame">Drame</option>
                            </select>
                        </div>
                        <div class="col-12 d-grid gap-2 ">
                            <button type="submit" class="btn btn-success">Modifier mon livre</button>
                        </div>
                    </div>
                    <div class="text-center py-2">
                        <a href="index.php?action=afficher-livre&id=<?= $cover['id_cover'] ?>">Retour</a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>