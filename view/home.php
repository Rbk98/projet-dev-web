<?php
$title = 'Accueil';
ob_start();
?>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="public/images/library_1.jpg" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Bienvenue sur notre site Lambda ! </h1>
                        <h4 class="text-white">Ici vous pouvez retrouver des histoires et participer à l'aventure bla bla bla.</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="public/images/book_open_2.jpg" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Des histoires variées... </h1>
                        <h4 class="text-white">De nombreux genres sont disponibles afin de plaire à tout le monde.</h4>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 w3_carousel" src="public/images/book_open_1.jpg" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Accès illimité... </h1>
                        <h4 class="text-white">Lors de la création de votre compte, vous aurez accès à votre espace et à vos histoires.</h4>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="bg-gray-100 py-5">
        <h2 class="h2_title my-2">Les histoires les plus appréciées</h2>
        <hr class="hr_content mb-3"/>
        <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
            <?php foreach ($books as $book) { ?>
                <div class="col-xl-3 col-md-6 col-sm-6">
                    <div class="card h-100">
                        <img width="200px" height="auto" src="public/images/book_1.jpg" class="card-img-top p-3"
                             alt="book_img">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['title'] ?></h5>
                            <span class="badge badge-danger"><?= $book['genre'] ?></span>
                            <p class="card-text text-truncate--3"><?= $book['summary'] ?></p>
                        </div>
                        <div class="d-flex align-items-end flex-column card-body">
                            <a href="index.php?action=lire-histoire&id=1" class="btn btn-primary px-2 mt-auto">Commencer
                                l'histoire</a>
                        </div>
                        <div class="card-footer bg-white text-end">
                            <small class="text-muted">Lu par <?= $book['nb_reading'] ?> personnes.</small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>