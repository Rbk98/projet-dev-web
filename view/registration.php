<?php
$title = 'UStory - Inscription';
ob_start();
?>

    <div class="container my-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-lg-5">
                <form name="creation" method="POST">
                    <fieldset class= "form bg-light p-4">
                        <legend class="test text-center">Inscription</legend>
                        <div class="row mb-5">
                            <div class="col-12 mb-3">
                                <label for="nickname" class="col-form-label">Surnom</label>
                                <input type="text" placeholder="Entrez un surnom" name="nickname" id="nickname"
                                    class="form-control" required>
                                <?php if(isset($error)){
                                    echo '<span class="error text-danger">' . $error . '</span>';
                                }?>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="birth_date" class="col-form-label">Date de naissance :</label>
                                <input type="date" max="<?php echo date("Y-m-d"); ?>" name="birth_date" placeholder="aaaa-mm-jj"
                                    id="birth_date" class="form-control" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="password" class="col-form-label ">Mot de passe</label>
                                <input type="password" name="password" placeholder="Entrez un mot de passe" id="password"
                                    class="form-control" required>
                            </div>
                            <div class="col-12">
                                <label for="mail" class="col-form-label">Adresse email</label>
                                <input type="email" name="mail" id="mail" placeholder="Entrez votre adresse e-mail"
                                    class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success">M'inscrire</button>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <p class="login_register">J'ai déjà un compte ? <a class="text-success text-decoration-none" href="index.php?action=connexion">Je me connecte</a></p>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean();
require('base.php'); ?>