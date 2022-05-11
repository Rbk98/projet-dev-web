<?php $title = "Administration des choix"; ?>

<?php ob_start(); ?>
<div class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <h2 class="h2_title">Livre : <?= $cover['title'] ?></h2>
            <h4 class="text-center">Chapitre : <?= $chapter['title'] ?></h4>
            <hr class="hr_content"/>
        </div>
    </div>

    <?php if(count($choices)==0){?>
                    
        <div class="row mt-5">
            <div class="col d-flex justify-content-center p-0">
                <div class="card text-center" style="width: 50rem;">
                    <div class="card-body">
                        <i class="fa fa-book fa-2x mb-4 icon"></i>
                        <p class="mb-4">Vous n'avez pour l'instant aucun choix associé à ce
                            chapitre. </br>Ajoutez un premier choix dès maintenant </p>
                        <a type="sumbit" class="btn btn-success" href="index.php?action=creer-choix&idCover=<?= $cover['id_cover']?>&idChapter=<?= $chapter['id_chapter']?>">Ajouter un
                            choix</a>
                    </div>
                </div>
            </div>
        </div>                   
        
    <?php } else{ ?>

    <div class="row mt-5">        
            <?php foreach($choices as $choice){ ?>
                <div class="col-3">
                    <a href="book_page.php" class="text-dark text-decoration-none">
                        <div class="card choix" href="book_page.php">
                            <h5 class="card-header text-center">Choix n°<?= $choice['id_choice'] ?></h5>
                            <div class="card-body text-center">                                
                                    <p><?= $choice['title'] ?></p>
                                <?php if($choice['unsafe']==1){ ?>                
                                    <span class="badge bg-danger">Dangereux</span>
                                <?php }else{ ?>
                                    <span class="badge bg-success">Correct</span>
                                <?php }  ?>
                            </div>
                        </div>
                    </a>
                </div>
        <?php } ?>       
    </div>
    <?php } ?>
    
</div>



<?php $content = ob_get_clean();
require('base.php'); ?> 