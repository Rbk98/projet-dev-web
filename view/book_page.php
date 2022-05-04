<?php
$title = "Ajout d'histoire";
ob_start();
?>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-7  " >
                <div class="row p-lg-5 bg-light background_type ">
                    <div class="col-12 mb-4 ">
                        <h2 class="h2_title">Nom de l'histoire</h2>
                        <hr class="hr_content"/>
                    </div>
                    <div class="col-12 d-flex justify-content-center mb-4">
                        <img class="book_img" src="public/images/book_open_2.jpg" alt="image livre" />
                    </div>  
                    <div class="col-12 d-flex justify-content-center">
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula nisl in urna dapibus consequat. 
                            Sed convallis quam augue, id facilisis arcu posuere pulvinar. Etiam et lacus sodales, mattis nulla a, 
                            sagittis augue. Nullam efficitur egestas vehicula. Proin congue odio mauris, in aliquet ex ultricies ut. 
                            Vivamus ornare ornare nibh, nec placerat leo tincidunt sit amet. Vivamus id odio eu felis laoreet malesuada.
                            Duis laoreet, nibh et faucibus pharetra, nisl elit dignissim lorem, et tincidunt risus dui vel urna. 
                            Fusce sit amet mi malesuada, luctus urna ut, mattis turpis.
                        </p>
                    </div>
                    
                </div>  
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center p-0" >
                        <div class="card text-center" style="width: 50rem;">                
                        <div class="card-body">
                            <i class="fa fa-book fa-2x mb-4 icon"></i>
                            <p class="mb-4">Vous n'avez pour l'instant aucun chapitre associé à cette histoire. </br>Commencez à écrire votre premier chapitre dès maintenant </p>
                            <a type="sumbit" class="btn btn-success" href="index.php?action=creer-chapitre">Créer un chapitre</a>
                        </div>
                    </div>
                </div>
                 
            </div>
        </div>       
        
    </div>
    </div>

    

<?php $content = ob_get_clean();
require('base.php'); ?>