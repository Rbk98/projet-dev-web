<?php
$title = 'Inscription';
ob_start();
?>
    <div class="container my-2">
        <div class="container d-flex justify-content-center m-5">
            <form>
                <fieldset class="bg-light p-4">
                    <legend>Inscription</legend>
                    <div class="row mb-5">
                        <div class="col-12 mb-3">
                            <label for="nickname" class="col-form-label">Surnom :</label>
                            <input type="text" placeholder="Entrez un surnom" name="nickname" id="nickname"
                                   class="form-control">
                        </div>
                        <div class="col-12  mb-3">
                            <label for="birth_date" class="col-form-label">Dâte de naissance :</label>
                            <input type="date" name="birth-date" placeholder="Entrez votre dâte de naissance"
                                   id="birth_date" class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password" class="col-form-label ">Mot de passe :</label>
                            <input type="password" name="password" placeholder="Entrez un surnom" id="password"
                                   class="form-control">
                        </div>
                        <div class="col-12 mb-3">
                            <label for="mail" class="col-form-label">Adresse email :</label>
                            <input type="email" name="mail" id="password" placeholder="Entrez votre adresse e-mail"
                                   class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 d-grid gap-2 mb-1">
                            <button type="submit" class="btn btn-success">M'inscrire</button>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <p>J'ai déjà un compte ? <a href="login.php">Je me connecte</a></p>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php $content = ob_get_clean(); ?>
    </div>
<?php require('base.php'); ?>