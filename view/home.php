<?php
$title = 'UStory - Accueil';
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
                <img class="d-block w-100" src="public/images/old_library.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue sur UStory ! </h1>
                    <h4 class="text-white">Participez à l'aventure et créez vos propres histoires.</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/images/library_1.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Des histoires variées... </h1>
                    <h4 class="text-white">De nombreux genres sont disponibles afin de plaire à tout le monde.</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 w3_carousel" src="public/images/book_open3.png" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Accès illimité... </h1>
                    <h4 class="text-white">Lors de la création de votre compte, vous aurez accès à tous les livres
                        et un espace dédié pour retrouver vos histoires.</h4>
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
    <hr class="hr_content mb-3" />
    <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
        <?php foreach ($bestBooks as $book) { ?>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card h-100">
                    <img width="200px" height="auto" src="public/images/cover4.jpg" class="card-img-top p-3" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title"><?= $book['title'] ?></h5>
                        <span class="badge badge-danger"><?= $book['genre'] ?></span>
                        <p class="card-text text-truncate--3"><?= $book['summary'] ?></p>
                    </div>
                    <div class="d-flex align-items-end flex-column card-body">
                        <?php if (!isset($_SESSION['id']) || (!userBookReading($_SESSION['id'], $book['id_cover']))) {
                            if (!isset($_SESSION['id'])) { ?>
                                <a href="index.php?action=connexion" class="btn btn-primary px-2 mt-auto">Commencer
                                    l'histoire</a>
                            <?php } else if (userBookFinished($book['id_cover'])) {
                            ?>
                                <a href="index.php?action=recommencer-histoire&id=<?= $book['id_cover'] ?>" class="btn btn-dark px-2 mt-auto">Relire
                                    l'histoire</a>
                            <?php } else { ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Commencer l'histoire
                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Commencer une histoire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous sûr de vouloir commencer cette histoire ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                                </button>
                                                <a href="index.php?action=lire-histoire&idb=<?= $book['id_cover'] ?>&idc=1" class="btn btn-primary px-2 mt-auto">Commencer
                                                    l'histoire</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <a href="index.php?action=lire-histoire&idb=<?= $book['id_cover'] ?>&idc=<?= getReadingProgress($_SESSION['id'], $book['id_cover']) ?>" class="btn btn-info px-2 mt-auto">Continuer
                                l'histoire</a>
                        <?php } ?>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">Lu par <?= $book['nb_reading'] ?> personnes.</small>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-around px-5">
            <div class="col-lg-4 col-md-4 col-sm-12 py-2">
                <img class="rounded-circle z-depth-2" alt="library" width="250px" height="250px" src="public/images/book_home.jpg" data-holder-rendered="true">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12">
                <h4>UStory : Quel est le concept ? </h4>
                <h4 class="subheading">Devenez le héros de votre histoire !</h4>
                <p class="text-muted">Tu peux être administrateur ou uniquement lire des histoires. Cependant il
                    faut se créer un
                    compte pour pouvoir accéder aux histoires. Un suivi est disponible et un espace pour savoir
                    quels histoires tu as déjà lu.</p>
                <a href="index.php?action=creer-compte" class="btn btn-success px-4 py-2">Je souhaite créer mon
                    compte
                    !</a>
            </div>
        </div>
    </div>
</div>
<div class="bg-gray-100 py-5">
    <h2 class="h2_title my-3">Toutes les histoires disponibles</h2>
    <hr class="hr_content mb-3" />
    <div class="row row-cols-1 row-cols-md-4 g-4 mx-4">
        <?php foreach ($books as $b) { ?>
            <div class="col-xl-3 col-md-6 col-sm-6">
                <div class="card h-100">
                    <img width="200px" height="auto" src="public/images/cover4.jpg" class="card-img-top p-3" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title"><?= $b['title'] ?></h5>
                        <span class="badge badge-danger"><?= $b['genre'] ?></span>
                        <p class="card-text text-truncate--3"><?= $b['summary'] ?></p>
                    </div>
                    <div class="d-flex align-items-end flex-column card-body">
                        <?php if (!isset($_SESSION['id']) || (!userBookReading($_SESSION['id'], $b['id_cover']))) {
                            if (!isset($_SESSION['id'])) { ?>
                                <a href="index.php?action=connexion" class="btn btn-primary px-2 mt-auto">Commencer
                                    l'histoire</a>
                            <?php } else if (userBookFinished($b['id_cover'])) {
                            ?>
                                <a href="index.php?action=recommencer-histoire&id=<?= $b['id_cover'] ?>" class="btn btn-dark px-2 mt-auto">Relire
                                    l'histoire</a>
                            <?php } else { ?>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                    Commencer l'histoire
                                </button>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Commencer une histoire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous sûr de vouloir commencer cette histoire ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                                                </button>
                                                <a href="index.php?action=lire-histoire&idb=<?= $book['id_cover'] ?>&idc=1" class="btn btn-primary px-2 mt-auto">Commencer
                                                    l'histoire</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?>
                            <a href="index.php?action=lire-histoire&idb=<?= $b['id_cover'] ?>&idc=<?= getReadingProgress($_SESSION['id'], $book['id_cover']) ?>" class="btn btn-info px-2 mt-auto">Continuer
                                l'histoire</a>
                        <?php } ?>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">Lu par <?= $b['nb_reading'] ?> personnes.</small>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php $content = ob_get_clean();
require('base.php'); ?>