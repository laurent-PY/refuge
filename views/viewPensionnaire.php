<?php
include_once('./models/PensionnaireManager.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$this->_t = 'Ajouter un nouveau pensionnaire';



if(isset($_POST['enregistrer'])) {
    $newPensionnaire = new Pensionnaire();
    $newPensionnaire->setNom($_POST['nom']);
    $newPensionnaire->setType($_POST['type']);
    $newPensionnaire->setRace($_POST['race']);
    $newPensionnaire->setAge($_POST['age']);
    $newPensionnaire->setDateEntree($_POST['dateEntree']);
    $newPensionnaire->setDateSortie($_POST['dateSortie']);
    $newPensionnaire->setDescription($_POST['description']);
    //TODO attention à modifier, en cours (les deux lignes du dessous) !!
    $target_dir = "../asset/pensionnaires/";
    $newPensionnaire->setUrlPhoto($target_file = $target_dir . basename($_FILES["urlPhoto"]["name"]));
    //        $newPensionnaire->setUrlPhoto($_FILES["urlPhoto"]['name']);
    $newPensionnaire->setIdMembre($_SESSION['idMembre']);
    $newPensionnaire->setIdSante($_POST['idSante']);
    $newPensionnaire->setIdEnclos($_POST['idEnclos']);
    PensionnaireManager::insertPensionnaire($newPensionnaire);
}


?>

<div class="blockActivite">
    <div class="titre">
        <h1>Ajouter un pensionnaire</h1>
    </div>
    <form method="post" enctype="multipart/form-data">

        <!-- nom input -->
        <div class="form-outline mb4 ">
            <input type="text" name="nom" class="form-control" value="<?php if (isset($_POST['nom'])){echo $_POST['nom'];} ?>" placeholder="Nom"/>
        </div>

        <div class="form-outline mb4">
            <label class="form-label" for="type"></label>
            <select class="form-select" name="type">
                <option selected>Type du pensionnaire</option>
                <option value="Chat">Chat</option>
                <option value="Chien">Chien</option>
            </select>
        </div>

        <!-- age input -->
        <div class="form-outline mb4 ">
            <label class="form-label" for="age"></label>
            <input type="text" name="age" class="form-control" value="<?php if (isset($_POST['age'])){echo $_POST['age'];} ?>" placeholder="Age *"/>
        </div>

        <!-- race input -->
        <div class="form-outline mb4 ">
            <label class="form-label" for="race"></label>
            <input type="text" name="race" class="form-control" value="<?php if (isset($_POST['race'])){echo $_POST['race'];} ?>" placeholder="race *"/>
        </div>


        <div class="form-outline mb-4">
            <label class="form-label" for="idSante">Etat de santé de pensionnaire</label>
            <select class="form-control" name="idSante" value="<?php if (isset($_POST['idSante'])){echo $_POST['idSante'];}  ?>">
                <?php $sante = PensionnaireManager::selectSante(); foreach($sante as $santes){ ?>
                    <option value="<?= $santes['idSante']; ?>"><?= $santes['etat']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-outline mb-4">
            <label class="form-label" for="idEnclos"></label>
            <select class="form-control" name="idEnclos" value="<?php if (isset($_POST['idEnclos'])){echo $_POST['idEnclos'];} ?>">
                <?php $enclo = PensionnaireManager::selectEnclos(); foreach($enclo as $enclos){ ?>
                    <option value="<?= $enclos['idEnclos']; ?>"><?= $enclos['emplacement']; ?></option>
                <?php } ?>
            </select>
        </div>


        <!-- date d'entree input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="dateEntree">Date d'entrée au refuge *</label>
            <input type="date" name="dateEntree" class="form-control" value="<?php if (isset($_POST['dateEntree'])){echo $_POST['dateEntree'];} ?>"/>
        </div>

        <!-- date de sortie input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="dateSortie">Date de sortie du refuge *</label>
            <input type="date" name="dateSortie" class="form-control" value="<?php if (isset($_POST['dateSortie'])){echo $_POST['dateSortie'];} ?>"/>
        </div>

        <!-- description input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="description"></label>
            <textarea class="form-control" name="description" rows="3" value="<?php if (isset($_POST['description'])){echo $_POST['description'];} ?>" placeholder="Description de l'animal"></textarea>
        </div>

        <!-- essaie ajout de fichier à uploader -->
        <div class="form-outline mb-4">
            <label class="form-label" for="urlPhoto"></label>
            <input type="file" name="urlPhoto" class="form-control"/>
        </div>


        <!-- UrlPhoto Temporaire input -->
<!--        <div class="form-outline mb-4">-->
<!--            <label class="form-label" for="pass"></label>-->
<!--            <input type="text" name="urlPhoto" class="form-control" value="--><?php //if (isset($_POST['urlPhoto'])){echo $_POST['urlPhoto'];} ?><!--" placeholder="Télécharger une image *"/>-->
<!--        </div>-->

        <!-- Submit button -->
        <input type="submit" class="btn btn-secondary btn-block" name="enregistrer" value="Enregistrer">
    </form>
</div>
