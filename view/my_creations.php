<?php $title = 'Mes créations'; ?>

<?php ob_start(); ?>
    <div class="container my-2">
        <h2 class="h2_title my-2">Mes créations</h2>
        <hr class="hr_content"/>
    </div>
    <div class="bg_crea container mb-3">
        <h4>Histoire(s) en cours de création</h4>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
        <div class="col-2">
            <div class="card h-75">
                <img src="public/images/book_1.jpg" class="card-img-top py-3" alt="book_img">
                <div class="card-body">
                    <h5 class="card-title">Histoire n°1</h5>
                    <a href="index.php?action=modifier-histoire" class="btn btn-primary px-2">Continuer
                        l'édition</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card h-75">
                <img src="public/images/book_1.jpg" class="card-img-top py-3" alt="book_img">
                <div class="card-body">
                    <h5 class="card-title">Histoire n°2</h5>
                    <a href="index.php?action=modifier-histoire" class="btn btn-primary px-2">Continuer
                        l'édition</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card h-75">
                <img src="public/images/book_1.jpg" class="card-img-top py-3" alt="book_img">
                <div class="card-body">
                    <h5 class="card-title">Histoire n°3</h5>
                    <a href="index.php?action=modifier-histoire" class="btn btn-primary px-2">Continuer
                        l'édition</a>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card h-75">
                
                <div class="card-body">
                    <a href="index.php?action=creer-histoire"><i class="bi bi-plus-circle" style="font-size:100px; "></i></a>
                    <h6 class="card-title mt-5 d-flex justify-content-center">Créer une nouvelle histoire</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-2">
        <hr></hr>
    </div>
    <div class="bg_crea container m-3">
        <h4>Histoires terminées</h4>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
            <div class="col-3 mb-5">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top p-3" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°1</h5>
                        <span class="badge bg-info text-dark">Aventure</span>
                        <p class="card-text">Petit résumé concernant la première histoire...</p>
                        <a href="index.php?action=mon-histoire&1" class="btn btn-success px-2 mb-2">
                            <i class="bi bi-eye"></i> Publié</a>
                        <a href="index.php?action=info-histoire" class="btn btn-light px-2">
                            <i class="bi bi-graph-up"></i> Voir mes statistiques</a>
                    </div>
                </div>
            </div>
            <div class="col-3 mb-5">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top p-3" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°2</h5>
                        <span class="badge bg-info text-dark">Aventure</span>
                        <p class="card-text">Petit résumé concernant la première histoire...</p>
                        <a href="index.php?action=info-histoire" class="btn btn-secondary px-2">
                            <i class="bi bi-eye-slash"></i> Non publié</a>
                    </div>
                </div>
            </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>