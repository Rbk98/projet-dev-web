<nav class="bg_navbar navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid ">
        <a class="navbar-brand" href="index.php"><i class="fa fa-book"></i> UStory</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item px-2 pt-1">
                    <a class="nav-link text-white" href="index.php?action=rechercher">Rechercher des histoires</a>
                </li>
                <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 1) { ?>

                <?php } ?>
                <?php if (isset($_SESSION['id'])) {
                    if ($_SESSION['role'] == 1) { ?>
                        <li class="nav-item px-2 pt-1">
                            <a class="nav-link text-white" href="index.php?action=creer-histoire">Créer une histoire</a>
                        </li>

                        <li class="nav-item px-2 pt-1">
                            <a class="nav-link text-white" href="index.php?action=mes-creations">Mes créations</a>
                        </li>

                    <?php } ?>
                    <li class="nav-item px-2 pt-1">
                        <a class="nav-link text-white" href="index.php?action=mes-lectures">Mes lectures</a>
                    </li>
                <?php } ?>

            </ul>
            <ul class="navbar-nav" style="margin-left: 5px;">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><i
                                class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <?php if (isset($_SESSION['id'])) { ?>
                            <a class="dropdown-item" href="index.php?action=mon-compte">Mon compte</a>
                            <a class="dropdown-item" href="index.php?action=deconnexion">Deconnexion</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="index.php?action=connexion">Connexion</a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>