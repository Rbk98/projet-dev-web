<?php
$title = 'Rechercher des histoires';
ob_start();
?>
    <div class="container my-2">

        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-10">
                <form method="post">
                    <fieldset class="bg-light form_search mt-3 p-4 mb-3">
                        <legend class="test text-center">Rechercher des histoires</legend>
                        <p class="text-center"> Vous recherchez un thème précis ? Lancer une recherche pour trouver
                            votre
                            bonheur !</p>
                        <div class="py-2">
                            <select class="form-select" name="genre" aria-label="Choisir une histoire">
                                <option selected value="">Choisir le genre de l'histoire souhaité</option>
                                <option value="Fantastique">Fantastique</option>
                                <option value="Aventure">Aventure</option>
                                <option value="Comédie">Comédie</option>
                                <option value="Romance">Romance</option>
                                <option value="Thriller">Thriller</option>
                                <option value="Drame">Drame</option>
                            </select>
                        </div>
                        <div class="row py-2 px-0">
                            <div class="col-12 d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success">Rechercher <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <hr class="hr_content mt-3"/>

        <div class="container py-4">
            <h4> Résultat(s) : </h4>
            <hr/>
            <div class="container-fluid">
                <div class="row">
                    <?php if(isset($bookGenre)){
                        foreach ($bookGenre as $book) { ?>
                            <div class="col-xl-3 col-md-6 col-sm-6">
                                <div class="card h-100">
                                    <img width="200px" height="auto" src="public/images/book_1.jpg"
                                         class="card-img-top p-3"
                                         alt="book_img">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $book['title'] ?></h5>
                                        <span class="badge badge-danger"><?= $book['genre'] ?></span>
                                        <p class="card-text text-truncate--3"><?= $book['summary'] ?></p>
                                    </div>
                                    <div class="d-flex align-items-end flex-column card-body">
                                        <a href="index.php?action=lire-histoire&id=1"
                                           class="btn btn-primary px-2 mt-auto">Commencer
                                            l'histoire</a>
                                    </div>
                                    <div class="card-footer bg-white text-end">
                                        <small class="text-muted">Lu par <?= $book['nb_reading'] ?> personnes.</small>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>