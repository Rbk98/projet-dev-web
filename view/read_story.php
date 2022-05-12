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
                    <p class="text-center pb-3"> Il vous reste : <?= getRemainingLives($cover['id_cover'], $chapter['id_chapter'], getLastChoiceReading($cover['id_cover'])) ?> vie(s)</p>
                    <h3 class="text-center py-3"> <?= $chapter['title'] ?></h3>
                    <p>
                        <?= $chapter['content'] ?>
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
            <?php foreach ($choices as $choice) {
                if ($choice['end_cover'] == 0) { ?>
                    <a href="index.php?action=lire-histoire&idCover=<?= $choice['id_cover'] ?>&idChapter=<?= $choice['id_next_chapter'] ?>&idChoice=<?= $choice['id_choice'] ?>" class="btn btn-primary mx-2"> <?= $choice['title'] ?></a>
                <?php } else { ?>
                    <a href="index.php?action=finir-histoire&id=<?= $choice['id_cover'] ?>&idChapter=<?= $choice['id_next_chapter'] ?>&idChoice=<?= $choice['id_choice'] ?>" class="btn btn-primary mx-2"> <?= $choice['title'] ?> </a>
            <?php }
            } ?>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require('base.php'); ?>