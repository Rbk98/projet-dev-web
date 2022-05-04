<?php
$title = 'Mes créations';
ob_start();
?>
    <div class="container my-3">
        <h2 class="h2_title my-2">Mes créations</h2>
        <hr class="hr_content mb-5"/>


        <?php
        if (isset($_SESSION['nickname']) && isset($_SESSION['role'])) {
        //s'il n'y a pas encore d'histoire créée
        if (empty($startedBooks) && empty($finishedBooks)) {
        ?>
        <div class="container my-5">
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <div class="card text-center" style="width: 30rem;">
                        <div class="card-body">
                            <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                            <p class="mb-4">Vous n'avez pour l'instant créé aucune histoire. <br/>Commencez à écrire
                                votre première histoire dès maintenant ! </p>
                            <a type="sumbit" class="btn btn-success" href="index.php?action=creer-histoire">Créer mon
                                histoire</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else {
                //s'il y a des histoires en cours de création
                if (!empty($startedBooks)) { ?>
                    <div class="row mb-5 d-flex justify-content-center justify-content-lg-between align-items-center infos bg-light p-3 m-0">
                        <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                            <h4 class="intitule mx-2 text-center">Histoire(s) en cours de création</h4>
                        </div>
                        <div class="col-12 col-lg-auto d-flex justify-content-center justify-content-lg-start">
                            <a type="sumbit" class="btn btn-success" href="index.php?action=creer-histoire">Ajouter une histoire</a>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <?php
                        foreach ($startedBooks as $book) { ?>
                            <div class="col-6 col-lg-3 mb-5 mb-lg- ">
                                <div class="card ">
                                    <img src="public/images/<?= $book['image'] ?>" class="card-img-top" alt="book_img">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $book['title'] ?></h5>
                                        <p class="card-text  text-truncate--3"><?= $book['summary'] ?></p>
                                        <div class="d-grid gap-2">
                                            <a href="index.php?action=modifier-histoire" class="btn btn-primary px-2">Editer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>                        
                    </div>
                <?php }
                //s'il y a des histoires en cours de création ET des histoires finies
                if (!empty($finishedBooks) && !empty($startedBooks)) { ?>
                    <!--<div class="mb-2 mx-2">
                        <hr class="hr_content"/>
                    </div>-->
                <?php }
                //s'il y a des histoires finies
                if (!empty($finishedBooks)) { ?>
                    <div class="row mb-5 d-flex justify-content-center justify-content-lg-between align-items-center infos bg-light p-3 m-0">
                        <div class="col-12 col-lg-auto mb-3 mb-lg-0">
                            <h4 class="intitule mx-2 text-center">Histoires terminées</h4>
                        </div>
                        <div class="col-12 col-lg-auto d-flex justify-content-center justify-content-lg-start">
                            <a type="sumbit" class="btn btn-success" href="index.php?action=mon-compte">Voir mes chiffres</a>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <?php
                        foreach ($finishedBooks as $book) { ?>
                            <div class="col-6 col-lg-3 mb-5 mb-lg-0">
                                <div class="card mb-4">
                                    <img src="public/images/<?= $book['image'] ?>" class="card-img-top" alt="book_img">
                                    <div class="card-body">
                                        <h5 class="card-title book_title"><?= $book['title'] ?></h5>
                                        <span class="badge badge-pill badge_style mb-3"><?= $book['genre'] ?></span>
                                        <p class="card-text  text-truncate--3"><?= $book['summary'] ?></p>
                                        <?php
                                            if ($book['status'] == 1) { ?>
                                                <div class="row ">
                                                    <div class="col-12 col-lg-6  mb-2 ">
                                                        <a href="index.php?action=mon-histoire&1" class="btn px-2  btn-success btn-block mb-2">
                                                        <i class="bi bi-eye"></i> Publié</a>
                                                     </div>
                                                     <div class="col-12 col-lg-6  px-2 ">
                                                        <a href="index.php?action=info-histoire" class="btn btn-light btn-block ">
                                                        <i class="bi bi-graph-up"></i> Stats</a>
                                                     </div>
                                                </div>
                                                
                                                
                                            <?php } else if ($book['status'] == 2) { ?>
                                                <div>
                                                    <a href="index.php?action=info-histoire" class="btn btn-secondary btn-block px-2">
                                                    <i class="bi bi-eye-slash"></i> Non publié</a>
                                                </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>                        
                    </div>                   

                    
                <?php } ?>
                
            <?php } ?>
                    
                
           
        </div>
        <?php } ?>

    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>
