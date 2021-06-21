<?php


class Pensionnaire
{
    private $_idPensionnaire;
    private $_nom;
    private $_type;
    private $_race;
    private $_age;
    private $_dateEntree;
    private $_dateSortie;
    private $_description;
    private $_urlPhoto;
    private $_idMembre;
    private $_idSante;
    private $_idEnclos;

    //constructeur
    public function __construct()
    {

    }

    public function getIdPensionnaire(){return $this->_idPensionnaire;}
    public function setIdPensionnaire($idPensionnaire): void{$this->_idPensionnaire = $idPensionnaire;}

    public function getNom(){return $this->_nom;}
    public function setNom($nom): void{$this->_nom = $nom;}

    public function getType(){return $this->_type;}
    public function setType($type): void{$this->_type = $type;}

    public function getRace(){return $this->_race;}
    public function setRace($race): void{$this->_race = $race;}

    public function getDateEntree(){return $this->_dateEntree;}
    public function setDateEntree($dateEntree): void{$this->_dateEntree = $dateEntree;}

    public function getAge(){return $this->_age;}
    public function setAge($age): void{$this->_age = $age;}

    public function getDateSortie(){return $this->_dateSortie;}
    public function setDateSortie($dateSortie): void{$this->_dateSortie = $dateSortie;}

    public function getDescription(){return $this->_description;}
    public function setDescription($description): void{$this->_description = $description;}

    public function getUrlPhoto(){return $this->_urlPhoto;}
    public function setUrlPhoto($urlPhoto): void{$this->_urlPhoto = $urlPhoto;}

    public function getIdMembre(){return $this->_idMembre;}
    public function setIdMembre($idMembre): void{$this->_idMembre = $idMembre;}

    public function getIdRace(){return $this->_idRace;}
    public function setIdRace($idRace): void{$this->_idRace = $idRace;}

    public function getIdSante(){return $this->_idSante;}
    public function setIdSante($idSante): void{$this->_idSante = $idSante;}

    public function getIdEnclos(){return $this->_idEnclos;}
    public function setIdEnclos($idEnclos): void{$this->_idEnclos = $idEnclos;}
}