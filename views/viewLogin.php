<?php
include_once('./models/LoginManager.php');
if(isset($_POST['connexion'])) {
    $membre = new Membre();
    $membre->SetEmail($_POST['email']);
    $membre->setPass($_POST['pass']);
    if(LoginManager::checkLogin($membre) == true){
        ?>
        <div class="alert alert-success alertPopup" role="alert" style="height: 7vh">
            Utilisateur authentifié.
        </div>
        <?php
    }else{
        ?>
        <div class="alert alert-warning alertPopup" role="alert" style="height: 7vh">
            Mot de passe ou email incorrect.
        </div>
        <?php
    }
}
?>
<div class="blockLogin">
    <div class="titre">
        <h1>Connexion</h1>
    </div>
    <div class="connexion">
        <form method="post">
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="email" name="email" class="form-control" value="<?php if (isset($_POST['email'])){echo $_POST['email'];} ?>" />
                        <label class="form-label" for="email">Email</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="password" id="pass" name="pass" class="form-control" />
                        <label class="form-label" for="pass">Password</label>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-secondary btn-block mb-4 d-flex justify-content-center" style="margin: auto;" name="connexion" value="Connexion">
        </form>
    </div>
</div>