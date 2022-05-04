<?php
$title = 'Modifier son compte';
ob_start();
?>

    <div class="container my-5 ">

        <h2 class="h2_title my-2">Modifier mon compte</h2>
        <hr class="hr_content mb-4"/>

        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-6">
                <form name="creation" method="POST">
                    <fieldset class= "form bg-light p-4">
                        <legend class="test text-center">Mes informations personnelles : </legend>
                        <div class="row mb-5">
                            <div class="col-12 mb-3">
                                <label for="birth_date" class="col-form-label">Date de naissance :</label>
                                <input type="date" name="birth_date" placeholder="aaaa-mm-jj"
                                       id="birth_date" class="form-control" value="<?=$user['birth']?>" required>
                            </div>
                            <div class="col-12">
                                <label for="mail" class="col-form-label">Adresse email</label>
                                <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse e-mail"
                                       class="form-control" value="<?=$user['mail']?>" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="password" class="col-form-label ">Mot de passe</label>
                                <input type="password" name="password" placeholder="Entrez un mot de passe" id="password"
                                       class="form-control" required>
                                <span class="error text-danger font-italic d-flex justify-content-center"> Veuillez réécrire ou modifier votre mot de passe</span>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success">Modifier mes infos</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>