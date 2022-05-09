<?php $title = "Page choix"; ?>

<?php ob_start(); ?>
<div class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <h2 class="h2_title"><? $book['title'] ?></h2>
            <h4 class="text-center"><? $chapter['title'] ?></h4>
            <hr class="hr_content"/>
        </div>
    </div>
    <div class="row mt-5">
        <?if (!empty($choices)) { 
            foreach($choices as $choice){ ?>
                <div class="col-3">
                    <a href="book_page.php" class="text-dark text-decoration-none">
                        <div class="card choix" href="book_page.php">
                            <h5 class="card-header text-center">Choix</h5>
                            <div class="card-body text-center">
                                <?if($choices['title']=!null) {?>
                                    <p>Ce choix n'a pas encore été configuré</p>
                                <? }else{?>
                                    <p><? $choices['title'] ?></p>
                                <? }?>
                                <span class="badge bg-danger">A configurer</span>
                            </div>
                        </div>
                    </a>
                </div>
        <?}} ?>
            
        
        
    </div>
    
</div>



<?php $content = ob_get_clean();
require('base.php'); ?> 