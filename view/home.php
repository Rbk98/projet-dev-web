<?php
$title = 'Accueil';
ob_start();
?>
    <div class="bg-gray-100 py-3">
        <h2 class="h2_title my-3">Les histoires les plus connues</h2>
        <hr class="hr_content mb-3"/>
        <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
            <div class="col">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top p-3" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°1</h5>
                        <span class="badge bg-info text-dark">Aventure</span>
                        <p class="card-text">Petit résumé concernant la première histoire...</p>
                        <a href="#" class="btn btn-primary px-2">Commencer l'histoire</a>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">Lu par 30 personnes.</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°2</h5>
                        <span class="badge bg-danger">Drame</span>
                        <p class="card-text">Petit résumé concernant la deuxième histoire...</p>
                        <a href="#" class="btn btn-primary">Reprendre l'histoire</a>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">Lu par 25 personnes.</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°3</h5>
                        <span class="badge bg-success">Fantastique</span>
                        <p class="card-text">Petit résumé concernant la troisième histoire...</p>
                        <a href="#" class="btn btn-primary px-2">Commencer l'histoire</a>
                    </div>
                    <div class="card-footer bg-white text-end">
                    <small class="text-muted">Lu par 16 personnes.</small>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°4</h5>
                        <span class="badge bg-success">Fantastique</span>
                        <p class="card-text">Petit résumé concernant la quatrième histoire...</p>
                        <a href="#" class="btn btn-primary px-2">Commencer l'histoire</a>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">Lu par 16 personnes.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-3">
        <!-- TODO -->

    </div>
    <div class="bg-white py-3">

    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>