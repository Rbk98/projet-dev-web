<?php
$title = 'UStory - Lire une histoire';
ob_start();
?>

<div class="bg-grey py-3">
    <div class="containerscreen">
        <div class="monitor">
            <div class="monitorscreen">
                <h3 class="text-center text-white mt-2"><?= $book['title'] ?></h3>
                <h2 class="text-center text-white mt-2"><?= $chapter['title'] ?></h2>
                <p class="p-4 text-white">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $chapter['content'] ?>
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

<?php $content = ob_get_clean();
require('base.php'); ?>