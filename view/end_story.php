<?php
$title = "UStory - Fin d'histoire";
ob_start();
?>
<div class="py-3">
    <h4 class="text-center pt-4 my-2 mb-5 font-weight-bold"><?= $book['title'] ?></h4>
    <div class="container text-center mb-5  ">
        <div class="fin">
            <?php
            $nbLives = getRemainingLives($book['id_cover'], getReadingProgress($choice), $idChoice);
            if ($nbLives == 0) { ?>
                <h2 class="h2_title my-2">Vous avez perdu !</h2>
                <hr class="hr_content mb-4 mt-4" />
            <?php } else { ?>
                <h2 class="h2_title my-2">Vous avez gagné !</h2>
                <hr class="hr_content mb-4 mt-4" />
            <?php } ?>
        </div>
    </div>
    <div class="text-center">
        <?php
        $indice = 0;
        foreach ($choiceNames as $choice) {
            $indice++;
        ?>
            <p class="mt-2">Choix n° <?= strval($indice) . " : " . $choice['title'] ?> </p>
            <i class="bi bi-arrow-down"></i>
        <?php } ?>
        <p class="mt-2">Fin</p>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card text-center" style="width: 30rem;">
                    <div class="card-body">
                        <i class="fa fa-book fa-2x mb-4" style="color:#0883cd;"></i>
                        <p class="mb-4">Merci d'avoir lu cette histoire ! J'espère qu'elle vous a plu </p>
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