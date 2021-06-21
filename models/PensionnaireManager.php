<?php


class PensionnaireManager extends Model
{
    public function getPensionnaire()
    {
        return $this->getAll('pensionnaire', 'Pensionnaire');
    }

    public static function insertPensionnaire(Pensionnaire $newPensionnaire){


        $nom = $newPensionnaire->getNom();
        $type = $newPensionnaire->getType();
        $age = $newPensionnaire->getAge();
        $race = $newPensionnaire->getRace();
        $dateEntree = $newPensionnaire->getDateEntree();
        $dateSortie = $newPensionnaire->getDateSortie();
        $description = $newPensionnaire->getDescription();
        $urlPhoto = $newPensionnaire->getUrlPhoto();
        $idMembre = $newPensionnaire->getIdMembre();
        $idSante = $newPensionnaire->getIdSante();
        $idEnclos = $newPensionnaire->getIdEnclos();

        $bdd = Model::getBdd();

        $requete = $bdd->prepare("INSERT INTO pensionnaire(nom, type, age, race, dateEntree, dateSortie, description, urlPhoto, idMembre, idSante, idEnclos) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $requete -> execute(array(
            $nom,
            $type,
            $age,
            $race,
            $dateEntree,
            $dateSortie,
            $description,
            $urlPhoto,
            $idMembre,
            $idSante,
            $idEnclos
        ));
        header("location:accueil");
    }


    public static function selectSante()
    {
        $bdd = Model::getBdd();
        $requete = $bdd->prepare('SELECT * FROM etatsante'); //preparation de la requete stockée dans $pdoStat
        $requete->execute(); //execution de la requete
        $lignes = $requete->fetchAll(); // stockage du resultat dans la variable $race
        return $lignes;
    }

    public static function selectEnclos()
    {
        $bdd = Model::getBdd();
        $requete = $bdd->prepare('SELECT * FROM enclos'); //preparation de la requete stockée dans $pdoStat
        $requete->execute(); //execution de la requete
        $lignes = $requete->fetchAll(); // stockage du resultat dans la variable $race
        return $lignes;
    }
    public static function getPensionnaires(){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT * FROM Pensionnaire");
        $requete->execute();
        $lignes = $requete->fetchAll((PDO::FETCH_ASSOC));
        return $lignes;
    }

}