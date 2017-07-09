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
    public function istorijaPacijenta($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT zub, naziv, vreme FROM `intervencija` inner JOIN usluga on  intervencija.usluga_id=usluga.usluga_id inner join trenutnizub on intervencija.trenutni_zub_id = trenutnizub.trenutnizub_id where pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
}
