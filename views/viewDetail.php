<?php
include_once('./models/DetailManager.php');
include_once('./models/PensionnaireManager.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$this->_t = 'Détail activité';
?>

<div class="container">
    <div class="titre">
        <h1>Détails pensionnaire </h1>
    </div>
    <div class="row">
        <div class="card" style="width: 100%; height: 68vh; border: solid black 1px ">
            <div>
                <?php
                // déclaration et iniatilisation de la variable $idPensionnaire elle contient l'id du pensionnaire envoyé depuis la view galerie
                $idPensionnaire = $_SESSION['idPensionnaire'];
                // $detailPensionnaire stock toutes les infos sous forme de tableau du pensionnaire de la session
                $detailsPensionnaire = DetailManager::detail($idPensionnaire);
                // déclaration et iniatilisation de la variable $idEnclos elle contient l'id de l'enclos envoyé depuis la view galerie
                $idEnclos = $_SESSION['idEnclos'];
                // $detailEnclos contient au travers de la methode getEnclos() un tabeau associatif dispose de toutes les infos relativent à l'enclos
                $detailEnclos = DetailManager::getEnclos($idEnclos);
                $countPensionnaire = DetailManager::countEnclos($idEnclos);
                //
                ?>
                <div>
                    </br>
                </div>

                <h2 class="card-title"><?= $detailsPensionnaire['nom'] ?></h2>
                <h4 class="card-title"><?= 'type du pensionnaire : '.$detailsPensionnaire['type'] ?></h4>
                <h5 class="card-title"><?= ('Identification refuge : '.$detailEnclos['nom']);
                    echo'</br>';echo('Emplacement : '.$detailEnclos['emplacement']);
                    echo'</br>';echo('Nombre de pensionnaire(s) présent dans l\'enclos : '.$countPensionnaire['count(idPensionnaire)']);
                    echo'</br>';echo('Taille de l\'enclos : '.$detailEnclos['taille'].' m²');
                    echo'</br>';echo('Status : '.$detailEnclos['status']); ?></h5>
                <p class="card-text">Description : </br><?= $detailsPensionnaire['description']?></p>
                <p class="card-text"><?php $timeStamp = strtotime($detailsPensionnaire['dateEntree']); $dateUTC = date("d-m-Y", $timeStamp); echo 'Date d\'entré au refuge : '.$dateUTC?></p>
                <p class="card-text"><?php $timeStamp = strtotime($detailsPensionnaire['dateSortie']); $dateUTC = date("d-m-Y", $timeStamp); echo 'Date de sortie du refuge : '.$dateUTC?></p>
                <?php if(isset($_SESSION['email'])) {
                    ?>
                    <a class="btmCard btn btn-outline-secondary" href="http://localhost/refuge/galerie">retour</a>
                    <?php
                }else
                { ?>
                    <div class="btmCard">
                        <p>L'adoption d'un pensionnaire est soumise à inscription obligatoire</p>
                        <a href="http://localhost/refuge/membre" class="btn btn-outline-secondary ">S'inscrire</a>
                        <a href="http://localhost/refuge/login" class="btn btn-outline-secondary ">Connexion</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

