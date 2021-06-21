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
        $requete = $bdd->prepare("SELECT * FROM enclos WHERE idEnclos = ?");
        $requete->execute(array(
            $id
        ));
        $lignes = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $lignes;
    }
}