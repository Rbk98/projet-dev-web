<?php
$title = 'UStory - Lire une histoire';
ob_start();
?>
<div class="py-3">
    <div id="wrapper">
        <div id="container" class="my-5">
            <section class="open-book">
                <header>
                    <h1><?= $writer['nickname'] ?></h1>
                    <h6><?= $cover['genre'] ?></h6>
                </header>
                <article>
                    <h2 class="chapter-title font-"><?= $cover['title'] ?></h2>
                    <p class="pb-3">
                        <?= $cover['summary'] ?>
                    </p>
                    <h3 class="text-center py-3"> </h3>
                    <p>
                    </p>
                </article>
                <footer>
                    <ol id="page-numbers">
                        <li>1</li>
                        <li>2</li>
                    </ol>
                </footer>
            </section>

        </div>
    </div>

    <div class="text-center my-5 py-4">
        <div class="btn-group btn-group-lg" role="group">
            <?php $indice = 0;
            foreach ($choices as $choice) {
                $indice++; ?>
                <a href="index.php?action=lire-histoire&idb=<?= $choice['id_cover'] ?>&idc=<?= $choice['id_next_chapter'] ?>" class="btn btn-primary mx-2">Choix <?= $indice ?></a>
            <?php } ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>