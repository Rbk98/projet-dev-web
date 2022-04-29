<?php
$title = 'Accueil';
ob_start();
?>
    <div>
        <?php
        if (isset($_SESSION['nickname']) and isset($_SESSION['role'])) {
            echo "<h1>Bienvenue" . $_SESSION['nickname'] . "</h1>";
        }
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="https://placeimg.com/1080/500/animals" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Bienvenue sur notre site Lambda ! </h2>
                        <p>Ici vous pouvez retrouver des histoires et participer à l'aventure bla bla bla.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://placeimg.com/1080/500/arch" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Des histoires variées... </h2>
                        <p>De nombreux genres sont disponibles afin de plaire à tout le monde.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://placeimg.com/1080/500/nature" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Accès illimité... </h2>
                        <p>Lors de la création de votre compte, vous aurez accès à votre espace et à vos histoires.</p>
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
            <div class="col">
                <div class="card h-100">
                    <img src="public/images/book_1.jpg" class="card-img-top p-3" alt="book_img">
                    <div class="card-body">
                        <h5 class="card-title">Histoire n°1</h5>
                        <span class="badge bg-info text-dark">Aventure</span>
                        <p class="card-text">Petit résumé concernant la première histoire...</p>
                        <a href="index.php?action=lire-histoire&id=1" class="btn btn-primary px-2">Commencer
                            l'histoire</a>
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
                        <a href="index.php?action=lire-histoire" class="btn btn-primary">Reprendre l'histoire</a>
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
                        <a href="index.php?action=lire-histoire" class="btn btn-primary px-2">Commencer
                            l'histoire</a>
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
                        <a href="index.php?action=lire-histoire" class="btn btn-primary px-2">Commencer
                            l'histoire</a>
                    </div>
                    <div class="card-footer bg-white text-end">
                        <small class="text-muted">Lu par 16 personnes.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>