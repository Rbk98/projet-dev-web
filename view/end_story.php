<?php
$title = 'UStory - Mes lectures';
ob_start();
?>
<div class="py-3">
    <h4 class="text-center pt-4 my-2 font-weight-bold"><?= $book['title'] ?></h4>
    <div class="container my-5">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card text-center" style="width: 30rem;">
                    <div class="card-body">
                        <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                        <p class="mb-4">Merci d'avoir lu cette histoire ! J'espère quelle vous a plu </p>
                        <a type="sumbit" class="btn btn-success" href="index.php?action=rechercher">Lire une autre
                            histoire</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();

require('base.php'); ?>