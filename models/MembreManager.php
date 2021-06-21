<?php

class MembreManager extends Model
{
    public function getMembres()
    {
        return $this->getAll('membre', 'Membre');
    }

    public static function insertMembre(Membre $newMembre)
    {

        $nom = $newMembre->getNom();
        $prenom = $newMembre->getPrenom();
        $email = $newMembre->getEmail();
        $pass = $newMembre->getPass();
        $dateNaissance = $newMembre->getDateNaissance();
        $adresse = $newMembre->getAdresse();
        $nomVille = $newMembre->getNomVille();
        $cpVille = $newMembre->getCpVille();
        $pays = $newMembre->getPays();
        $telPortable = $newMembre->getTelPortable();
        $telFixe = $newMembre->getTelFixe();
        $status = 'membre';

        $bdd = Model::getBdd();
        $requete = $bdd->prepare("INSERT INTO membre(nom, prenom, email, pass, dateNaissance, adresse, nomVille, cpVille, pays, telportable, telfixe, status ) VALUES (?, ?, ?, SHA1(?), ?, ?, ?, ?, ?, ?, ?, ?)");

        $requete -> execute(array(
            $nom,
            $prenom,
            $email,
            $pass,
            $dateNaissance,
            $adresse,
            $nomVille,
            $cpVille,
            $pays,
            $telPortable,
            $telFixe,
            $status
        ));

        header("location:accueil");
    }

    public static function chekFields(Membre $newMembre)
    {
        if($newMembre->getNom() == "" ||
            $newMembre->getPrenom() == "" ||
            $newMembre->getEmail() == "" ||
            $newMembre->getPrenom() == "" ||
            $newMembre->getPass() == "" ||
            $newMembre->getDateNaissance() == "" ||
            $newMembre->getAdresse() == "" ||
            $newMembre->getNomVille() == "" ||
            $newMembre->getCpVille() == "" ||
            $newMembre->getPays() == "" )
        {
            return false;
        }else{
            return true;
        }
    }

    public static function checkPasssword(Membre $newMembre){

        if($newMembre->getPass() != $newMembre->getCheckPass()){
            return false;
        }
        return true;
    }

    public static function checkMail(Membre $newMembre)
    {
        $bdd = Model::getBdd();
        $email = $newMembre->getEmail();
        $requete = $bdd->prepare('SELECT * FROM membre WHERE email = ?');
        $requete->execute(array(
            $email
        ));
        $requete->fetch();
        if($requete->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}