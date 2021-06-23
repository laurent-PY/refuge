<?php


class DetailManager extends Model
{
    public function getDetail()
    {
        return $this->getAll('pensionnaire', 'Pensionnaire');
    }

    public static function detail($id){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT * FROM pensionnaire WHERE idPensionnaire = ?");
        $requete->execute(array(
            $id
        ));
        $lignes = $requete->fetch(PDO::FETCH_ASSOC);
        return $lignes;
    }

    public static function enclos($id){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT enclos.idEnclos FROM enclos
                                  INNER JOIN pensionnaire ON enclos.idEnclos = pensionnaire.idEnclos
                                  WHERE idPensionnaire = ?;");
        $requete->execute(array(
            $id
        ));
        $lignes = $requete->fetch(PDO::FETCH_ASSOC);
        return $lignes;
    }

    public static function getEnclos($idEnclos){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT * FROM enclos WHERE idEnclos = ?");
        $requete->execute(array(
            $idEnclos['idEnclos']
        ));
        $lignes = $requete->fetch(PDO::FETCH_ASSOC);
        return $lignes;
    }

    public static function countEnclos($idEnclos){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT count(idPensionnaire) FROM pensionnaire WHERE idEnclos = ?");
        $requete->execute(array(
            $idEnclos['idEnclos']
        ));
        $lignes = $requete->fetch(PDO::FETCH_ASSOC);

        return $lignes;
    }
}