<?php


class GalerieManager extends Model
{
    public function getGalerie()
    {
        return $this->getAll('pensionnaire','Pensionnaire');
    }

    public static function galerie($id){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT * FROM pensionnaire");
        $requete->execute(array(
            $id
        ));
        $lignes = $requete->fetch(PDO::FETCH_ASSOC);
        return $lignes;
    }

    public static function getEnclos($id){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT * FROM enclos");
        $requete->execute(array(
            $id
        ));
        $lignes = $requete->fetch(PDO::FETCH_ASSOC);
        return $lignes;


    }
}