<?php
$title = 'UStory - Lire une histoire';
ob_start();
?>
    <div class="py-3">
        <h4 class="text-center pt-4 my-2 font-weight-bold"><?= $book['title'] ?></h4>
        <div class="containerscreen">
            <div class="monitor">
                <div class="monitorscreen">
                    <p class="p-4 text-white">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;?
                        <?= $chapter['content'] ?>

                    </p>
                </div>
            </div>
        </div>
        <div class="text-center py-4">
            <div class="btn-group btn-group-lg" role="group">
                <button type="button" class="btn btn-primary mx-2">Choix 1</button>
                <button type="button" class="btn btn-primary mx-2">Choix 2</button>
                <button type="button" class="btn btn-primary mx-2">Choix 3</button>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean();
require('base.php'); ?>