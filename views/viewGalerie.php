<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$this->_t = 'Galerie pensionnaire';
// Si la variable $_POST['consulter'] est 'setté'
if(isset($_POST['consulter'])){
    // Je met dans la variable global $_SESSION l'id du pensionnaire
    $_SESSION['idPensionnaire'] = $_POST['id'];
    // et je met aussi le numéro de l'enclos dans la variable global $_SESSION pour y avoir accès dans la vue détail.
    $_SESSION['idEnclos'] = GalerieManager::getEnclos($_POST['id']);
    // Je redirige vers l'accueil sans conecter l'utilisateur
    header("location:detail");
}
?>
<div class="container">
    <div class="titre">
        <h1>Galerie des compagnons du refuge</h1>
    </div>
    <div class="blockContent">
        <?php
        // Je récupère tout les pensionnaire de la table pensionnaire
        $pensionnaires = AccueilManager::getAccueil();
        // un foreach me permet de boucler sur tout les pensionnaire et de faire une card pour chacun d'entre-eux dans la variable $pensionnaire toutes les infos d'un pensionnaire sont réunis
        foreach($pensionnaires as $pensionnaire): ?>
            <div class="blockContent">
                <div class="row">
                    <div class="card" style="width: 15vw;height: 50vh; margin: 0 15px 0 15px" >
                        <div class="card-body">
                            <!--en passant par la variable qui contient toutes les infos du pensionnaire je séléctionne son nom pour l'afficher dans une card-->
                            <p class="card-text">Nom : <?= $pensionnaire['nom'] ?></p>
                            <!--idem pour la race-->
                            <p class="card-title">Race : <?= $pensionnaire['race'] ?></p>
                            <!--et son age-->
                            <p class="card-text">Agé de : <?= $pensionnaire['age'] ?> ans</p>
                            <?php
                            // pour ne pas avoir de problème avec la taille de mes cards, j'applique un substring qui tronque la description
                            ?><p>Description : <br><?php $pensionnaire['description'] = substr($pensionnaire['description'], 0, 30);
                                echo $pensionnaire['description']."(...)";?></p><?php
                            ?>
                            <!--j'utilise la methode strtotime afin d'inverser le sens des dates, vu que mysql ne me l'envoi pas au bon formatge-->
                            <p class="card-text">Date d'entrée : <?php $timeStamp = strtotime($pensionnaire['dateEntree']); $dateUTC = date("d-m-Y", $timeStamp); echo $dateUTC?></p>
                            <p class="card-text">Date de sortie : <?php $timeStamp = strtotime($pensionnaire['dateSortie']); $dateUTC = date("d-m-Y", $timeStamp); echo $dateUTC?></p>
                            <form method="post">
                                <!--un input de type 'hidden' me permet de récupérer l'id du pensionnaire que je vais stocker dans la variable de $_SESSION ainsi je peux m'en servir lors de l'affichage détails-->
                                <input name="id" type="hidden" value="<?= $pensionnaire['idPensionnaire']; ?>">
                                <input type="hidden" value="">
                                <input class="btmCard btn btn-outline-secondary" name="consulter" type="submit" value="Consulter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
