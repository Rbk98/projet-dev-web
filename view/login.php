<?php
$title = 'Connexion';
ob_start();
?>
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-5">
                <form name="connexion" action="index.php?action=connexion" method="POST">
                    <fieldset class="form bg-light p-4">
                        <legend class="text-center">Connexion</legend>
                        <div class="row mb-5">
                            <div class="col-12 mb-3">
                                <label for="nickname" class="col-form-label">Surnom</label>
                                <input type="text" class="form-control" id="nickname" name="nickname"
                                    placeholder="Entrez votre surnom" required>
                            </div>
                            <div class="col-12">
                                <label for="password" class="col-form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Entrez votre mot de passe" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-grid gap-2 mb-3">
                                <button type="sumbit" class="btn btn-success ">Se connecter</button>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <p class="login_register">Pas encore de compte ? <a class="text-success text-decoration-none" href="index.php?action=creer-compte">Je m'inscris</a></p>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>