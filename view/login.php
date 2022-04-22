<?php
session_start();
require ('header.php');
?>
<body>
    <div class="container d-flex justify-content-center m-5">
        <form>
            <fieldset class="bg-light p-4">
                <legend>Connexion</legend>
                <div class="row mb-5">
                    <div class="col-12 mb-3">
                        <label for="nickname" class="col-form-label">Surnom :</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Entrez votre surnom" required>  
                    </div>
                    <div class="col-12">
                        <label for="password" class="col-form-label">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-grid gap-2">
                        <button type="sumbit" class="btn btn-success ">Se connecter</button>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center"> 
                    <p>Pas encore de compte ? <a href="registration.php">Je m'inscris</p>
                </div>
            </fieldset>
        </form>
    </div>

<?php
require('_footer.php');
?>
</body>
</html>