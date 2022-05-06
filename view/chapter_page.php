<?php $title = "Ajout d'histoire"; ?>

<?php ob_start(); ?>
    <div class="container my-5">
        <div class="row mb-5">
            <div class="col">
                <h2 class="h2_title">Nom du livre</h2>
                <h4 class="text-center">Titre du chapitre</h4>
                <hr class="hr_content"/>
            </div>
        </div>
        <div class="row mt-5">

            <div class="col-3">
                <a href="cover_page.php" class="text-dark text-decoration-none">
                    <div class="card choix" href="book_page.php">
                        <h5 class="card-header text-center">Choix n°1</h5>
                        <div class="card-body text-center">
                            <p>Ce choix n'a pas encore été configuré</p>
                            <span class="badge bg-danger">A configurer</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3">
                <a href="cover_page.php" class="text-dark text-decoration-none">
                    <div class="card choix">
                        <h5 class="card-header text-center">Choix n°2</h5>
                        <div class="card-body text-center">
                            <p>Ce choix n'a pas encore été configuré</p>
                            <span class="badge bg-danger">A configurer</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <a href="cover_page.php" class="text-dark text-decoration-none">
                    <div class="card choix">
                        <h5 class="card-header text-center">Choix n°3</h5>
                        <div class="card-body text-center">
                            <p>Ce choix n'a pas encore été configuré</p>
                            <span class="badge bg-danger">A configurer</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>