<?php
$title = 'Lire une histoire';
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
    <div class="containerscreen">
        <div class="monitor">
            <div class="container my-3">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-warning">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>