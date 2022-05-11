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
                    <p class="pb-3">
                    </p>
                    <p class="pb-3">
                    </p>
                    <p class="pb-3">
                    </p>
                    <h3 class="text-center py-3"><?= $chapter['title'] ?> </h3>
                    <p>
                        The "time of year" that is being referenced relates to Erin's job when the pile of
                        projects temporarily slow down. This doesn't happen to just her. The reduction of work
                        happens to many, but at various times throughout the year, depending on their position.
                        She could submit to boredom and brainlessly surf The "time of year" that is being referenced relates to Erin's job when the pile of
                        projects temporarily slow down. This doesn't happen to just her. The reduction of work
                        happens to many, but at various times throughout the year, depending on their position.
                        She could submit to boredom and brainlessly surf the Internet, but this particular
                        developer decided to take advantage of the situation.the Internet, but this particular
                        developer decided to take advantage of the situation.
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