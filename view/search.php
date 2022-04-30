<?php $title = 'Rechercher des histoires';
ob_start(); ?>
    <div class="container my-2">

        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-10">
                <form>
                    <fieldset class="bg-light form_search mt-3 p-4 mb-3">
                        <legend class="test text-center">Rechercher des histoires</legend>
                        <p class="text-center"> Vous recherchez un thème précis ? Lancer une recherche pour trouver
                            votre
                            bonheur !</p>
                        <div class="py-2">
                            <select class="form-select" aria-label="Choisir une histoire">
                                <option selected>Choisir le genre de l'histoire souhaité</option>
                                <option value="1">Dramatique</option>
                                <option value="2">Comédie</option>
                                <option value="3">Fantastique</option>
                            </select>
                        </div>
                        <div class="row py-2 px-0">
                            <div class="col-12 d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success">Rechercher <i class="fa fa-search"></i></button>
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
                    <div class="col-12 mt-3">
                        <div class="card bg-light">
                            <div class="card-horizontal bg-light">
                                <div class="img-square-wrapper">
                                    <img width="300" height="200" src="public/images/book_1.jpg" alt="Book example">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Histoire n°1</h4>
                                    <p class="card-text">Voici le résumé de l'histoire...</p>
                                </div>
                                <div class="align-self-end text-end p-3">
                                    <a href="#" class="btn btn-primary px-2">Commencer l'histoire</a>
                                </div>
                            </div>
                            <div class="card-footer bg-light text-end">
                                <small class="text-muted">Lu par 18 personnes.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>