<?php $title = "Ajouter un choix";
ob_start(); ?>
   <div class="container my-5">
        <div class="row mb-5">
            <div class="col">
                <h2 class="h2_title">Livre : <?= $cover['title'] ?></h2>
                <h4 class="text-center">Chapitre : <?= $chapter['title'] ?></h4>
                <hr class="hr_content"/>
            </div>
        </div>

    
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-5">
                <form name="creation_chapter" method="POST">
                    <fieldset class="form bg-light p-4 background ">
                        <legend class="text-center mb-3">Ajout d'un choix</legend>
                        <div class="row mb-2">
                            <div class="col-12 mb-3">
                                <label for="choice_name" class="col-form-label">Nom</label>
                                <input type="text" placeholder="Nom du choix" name="choice_name" id="choice_name"
                                       class="form-control" required>
                            </div>                            
                                       
                            <div class="col-12 mb-4">
                                <label for="genre" class="col-form-label ">Chapitre suivant</label>
                                <select class="form-select" name="next_chapter" id="next_chapter" required>
                                    <option value="end">Aucune suite</option>
                                    <?php foreach($chapters as $chap){ 
                                        if($chap['id_chapter']!= $chapter['id_chapter']){?>
                                        
                                        <option value=<?= $chap['id_chapter']?>>Chapitre n°<?= $chap['id_chapter']?> : <?= $chap['title']?></option>
                                    <?php }} ?>                                
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <input type="checkbox" id="unsafe" name="unsafe" value="1">
                                <label for="unsafe" class="ml-2">Sélectionnez si ce choix est dangereux</label>
                            </div>

                            <div class="col-12 d-grid gap-2 ">
                                <button type="submit" class="btn btn-success">Ajouter le choix</button>
                                
                            </div>                            
                        </div> 
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>