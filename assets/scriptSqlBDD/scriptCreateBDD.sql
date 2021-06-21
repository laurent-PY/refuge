#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: membre
#------------------------------------------------------------

CREATE TABLE membre(
        idMembre      Int  Auto_increment  NOT NULL ,
        nom           Varchar (150) NOT NULL ,
        prenom        Varchar (150) NOT NULL ,
        email         Varchar (150) NOT NULL ,
        pass          Text NOT NULL ,
        dateNaissance Date NOT NULL ,
        adresse       Varchar (50) NOT NULL ,
        nomVille      Varchar (150) NOT NULL ,
        cpVille       Varchar (5) NOT NULL ,
        pays          Varchar (150) NOT NULL ,
        telPortable   Varchar (10) NOT NULL ,
        telFixe       Varchar (10) NOT NULL ,
        status        Varchar (50) ,
        urlPhoto      Varchar (50)
	,CONSTRAINT membre_PK PRIMARY KEY (idMembre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enclos
#------------------------------------------------------------

CREATE TABLE enclos(
        idEnclos    Int  Auto_increment  NOT NULL ,
        nom         Varchar (50) NOT NULL ,
        taille      Int NOT NULL ,
        emplacement Varchar (50) NOT NULL ,
        status      Varchar (50) NOT NULL
	,CONSTRAINT enclos_PK PRIMARY KEY (idEnclos)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: race
#------------------------------------------------------------

CREATE TABLE race(
        idRace Int  Auto_increment  NOT NULL ,
        nom    Varchar (50) NOT NULL
	,CONSTRAINT race_PK PRIMARY KEY (idRace)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etatSante
#------------------------------------------------------------

CREATE TABLE etatSante(
        idSante Int  Auto_increment  NOT NULL ,
        etat    Varchar (50) NOT NULL
	,CONSTRAINT etatSante_PK PRIMARY KEY (idSante)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pensionnaire
#------------------------------------------------------------

CREATE TABLE pensionnaire(
        idPensionnaire Int  Auto_increment  NOT NULL ,
        nom            Varchar (50) NOT NULL ,
        type           Varchar (50) NOT NULL ,
        age            Int NOT NULL ,
        dateEntree     Date NOT NULL ,
        dateSortie     Date NOT NULL ,
        description    Text ,
        urlPhoto       Varchar (50) ,
        idMembre       Int NOT NULL ,
        idRace         Int NOT NULL ,
        idSante        Int NOT NULL ,
        idEnclos       Int NOT NULL
	,CONSTRAINT pensionnaire_PK PRIMARY KEY (idPensionnaire)

	,CONSTRAINT pensionnaire_membre_FK FOREIGN KEY (idMembre) REFERENCES membre(idMembre)
	,CONSTRAINT pensionnaire_race0_FK FOREIGN KEY (idRace) REFERENCES race(idRace)
	,CONSTRAINT pensionnaire_etatSante1_FK FOREIGN KEY (idSante) REFERENCES etatSante(idSante)
	,CONSTRAINT pensionnaire_enclos2_FK FOREIGN KEY (idEnclos) REFERENCES enclos(idEnclos)
	,CONSTRAINT pensionnaire_enclos_AK UNIQUE (idEnclos)
)ENGINE=InnoDB;

