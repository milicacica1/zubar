<?php
require_once 'sys/DataBase.php';
class PregledModel implements ModelInterface{
    public static function getAll(){
        $SQL = 'SELECT * FROM pacijent ORDER BY ime';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getById($pacijent_id){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT * FROM pacijent WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function getAllTeeth(){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT * FROM pacijent WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    public static function zubi($i){
        $i = intval($i);
        $SQL = 'INSERT into trenutnizub (zub) VALUES (?)';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$i]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    public static function getAllUsluge(){
        $SQL = 'SELECT distinct * FROM usluga inner join kategorija on usluga.kategorija_id = kategorija.kategorija_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
}
