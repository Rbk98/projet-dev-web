<?php $title = "Ajouter une histoire";
ob_start(); ?>
<div class="container my-5">
        <h2 class="h2_title">Nom du livre</h2>
        <hr class="hr_content"/>
</div>

<div class="container mb-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-5">
                <form>
                    <fieldset class= "form bg-light p-4 background ">
                        <legend class="text-center mb-3">Création d'un chapitre</legend>
                        <div class="row mb-2">
                            <div class="col-12 mb-3">
                                <label for="title_chap" class="col-form-label">Titre</label>
                                <input type="text" placeholder="Titre du chapitre" name="title_chap" id="title_chap" class="form-control">                                    
                            </div>
                            <div class="col-12 mb-3">
                                <label for="content" class="col-form-label">Contenu</label>
                                <textarea class="form-control" placeholder="Contenu du chapitre" id="content" style="height: 100px"></textarea>
                            </div>                            
                            <div class="col-12 mb-5">
                                <label for="nb_choice" class="col-form-label">Nombre de choix possibles</label>
                                <input class="form-control" type="number" placeholder="Nombre de choix  que peut faire le lecteur à l’issu de ce chapitre" value="1" name="nb_choice" id="nb_choice" >                                    
                            </div>
                            <div class="col-12 d-grid gap-2 ">
                                <a type="submit" class="btn btn-success mb-2" href="index.php?action=page-chapitre">Configurer les choix du chapitre</a>
                                <a type="submit" class="btn btn-outline-success" href="index.php?action=page-livre">Configurer les choix plus tard</a>
                            </div>                            
                        </div> 
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>