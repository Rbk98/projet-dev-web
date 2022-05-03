<?php $title = "Ajouter une histoire";
ob_start();
?>
    <div class="container my-5">
        <h2 class="h2_title">Création d'une histoire</h2>
        <hr class="hr_content"/>
    </div>

    <div class="container mb-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-5">
                <form>
                    <fieldset class="form bg-light p-4 ">
                        <div class="row mb-2">
                            <div class="col-12 mb-3">
                                <label for="title" class="col-form-label">Titre</label>
                                <input type="text" placeholder="Titre de votre histoire" name="title" id="title"
                                       class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="resume" class="col-form-label">Résumé</label>
                                <textarea class="form-control" placeholder="Résumé de votre livre" id="resume"
                                          style="height: 100px"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="genre" class="col-form-label ">Genre</label>
                                <select class="form-select" name="genre" id="genre">
                                    <option value="">Sélectionnez le genre de votre livre</option>
                                    <option value="Fantastique">Fantastique</option>
                                    <option value="Aventure">Aventure</option>
                                    <option value="Comédie">Comédie</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Thriller">Thriller</option>
                                    <option value="Drame">Drame</option>
                                </select>
                            </div>
                            <div class="col-12 mb-5">
                                <label for="image" class="col-form-label">Image de couverture</label>
                                <input class="form-control" type="file" name="image" id="image"
                                       accept=".png,.jpg,.jpeg">
                            </div>
                            <div class="col-12 d-grid gap-2 ">
                                <a type="submit" class="btn btn-success" href="book_page.php">Créer mon livre</a>
                            </div>
                        </div>


                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>