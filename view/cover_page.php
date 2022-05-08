<?php
$title = "UStory - Ajout d'histoire";
ob_start();
?>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-7  ">
                <div class="row p-lg-5 bg-light background_type ">
                    <div class="col-12 mb-4 ">
                        <h2 class="h2_title"><?= $cover['title'] ?></h2>
                        <hr class="hr_content"/>
                    </div>
                    <div class="col-12 d-flex justify-content-center mb-4">
                        <img class="book_img" src="public/images/book_open_2.jpg" alt="image livre"/>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <p class="text-justify">&nbsp;&nbsp;&nbsp;<?= $cover['summary'] ?></p>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <a href="index.php?action=modifier-livre&id=<?= $cover['id_cover'] ?>" class="btn btn-primary">Modifier
                            mon histoire</a>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center p-0">
                        <div class="card text-center" style="width: 50rem;">
                            <div class="card-body">
                                <i class="fa fa-book fa-2x mb-4 icon"></i>
                                <p class="mb-4">Vous n'avez pour l'instant aucun chapitre associé à cette
                                    histoire. </br>Commencez à écrire votre premier chapitre dès maintenant </p>
                                <a type="sumbit" class="btn btn-success" href="index.php?action=creer-chapitre">Créer un
                                    chapitre</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


<?php $content = ob_get_clean();
require('base.php'); ?>