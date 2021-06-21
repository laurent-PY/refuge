<?php


class AccueilManager extends Model
{
    public function getAccueils()
    {
        return $this->getAll('pensionnaire', 'Pensionnaire');
    }

    public static function getAccueil(){
        $bdd = Model::getBdd();
        $requete = $bdd->prepare("SELECT * FROM pensionnaire");
        $requete->execute();
        $lignes = $requete->fetchAll((PDO::FETCH_ASSOC));
        return $lignes;
    }
}