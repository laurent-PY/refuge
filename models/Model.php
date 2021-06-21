<?php

abstract class Model
{
    private static $bdd;
    //instancie la connexion a la bdd
    private static function setBdd()
    {
        self::$bdd = new PDO('mysql:host=localhost;dbname=refuge;charset=utf8', 'root', '');
        self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    //recupère la connexion à la bdd
    protected static function getBdd()
    {
        if(self::$bdd == null)
            self::setBdd();
        return self::$bdd;
    }
    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM '.$table);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}