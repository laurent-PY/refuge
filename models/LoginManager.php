<?php
class LoginManager extends Model
{
    public function getLogin()
    {
        return $this->getAll('membre', 'Membre');
    }


    public static function checkLogin(Membre $membre)
    {
        $bdd = Model::getBdd();
        $email = $membre->getEmail();
        $pass = $membre->getPass();

        $requete = $bdd->prepare("SELECT * FROM membre WHERE email = ? AND pass = SHA1(?)");
        $requete->execute(array(
            $email, $pass));
        if ($requete->rowCount() > 0) {

            $lignes = $requete -> fetchAll(PDO::FETCH_ASSOC);

            foreach($lignes as $ligne) {
                $membreStatus = new Membre();
                $membreStatus->setIdMembre($ligne['idMembre']);
                $membreStatus->setNom($ligne['nom']);
                $membreStatus->setPrenom($ligne['prenom']);
                $membreStatus->setEmail($ligne['email']);
                $membreStatus->setDateNaissance($ligne['dateNaissance']);
                $membreStatus->setAdresse($ligne['adresse']);
                $membreStatus->setNomVille($ligne['nomVille']);
                $membreStatus->setCpVille($ligne['cpVille']);
                $membreStatus->setPays($ligne['pays']);
                $membreStatus->setTelPortable($ligne['telPortable']);
                $membreStatus->setTelFixe($ligne['telFixe']);
                $membreStatus->setTelFixe($ligne['telFixe']);
                $membreStatus->setStatus($ligne['status']);

            }
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['status'] = $membreStatus->getStatus();
            $_SESSION['prenom'] = $membreStatus->getPrenom()." ".$membreStatus->getNom();
            $_SESSION['idMembre'] = $membreStatus->getIdMembre();

            header("location:accueil");
        }
    }
}


