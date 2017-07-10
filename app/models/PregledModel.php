<?php
class PregledModel implements ModelInterface{
    public static function getAll(){
        $SQL = 'SELECT * FROM pacijent ORDER BY ime';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getById($pacijent_id){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT * FROM intervencija WHERE pacijent_id = ?';
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
        $SQL = 'INSERT into trenutnizub (zub) VALUES (?);';
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
        $SQL = 'SELECT zub, naziv, cena, vreme, kataloski_broj, vrsta, cena_sa_popustom, opis, email FROM `intervencija`  INNER JOIN 
            pacijent on intervencija.pacijent_id = pacijent.pacijent_id INNER JOIN 
            usluga on intervencija.usluga_id = usluga.usluga_id INNER JOIN 
            kategorija on usluga.kategorija_id = kategorija.kategorija_id where pacijent.pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function intervencijaPacijenta($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT zub, naziv, cena, vreme FROM `intervencija` inner JOIN usluga on  intervencija.usluga_id=usluga.usluga_id  where pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function dodajIntervenciju($pacijent_id, $zubar_id, $usluga_id, $zub) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'INSERT INTO `intervencija` (pacijent_id, zubar_id, usluga_id, zub) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$pacijent_id, $zubar_id, $usluga_id, $zub]);
        
    }
    public function getAllByZybarID($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT pacijent.ime, pacijent.prezime, jmbg, kategorija_pacijenta, zub, naziv, cena, vreme, kataloski_broj, vrsta, cena_sa_popustom, opis, email FROM `intervencija`  INNER JOIN 
            pacijent on intervencija.pacijent_id = pacijent.pacijent_id INNER JOIN 
            usluga on intervencija.usluga_id = usluga.usluga_id INNER JOIN 
            kategorija on usluga.kategorija_id = kategorija.kategorija_id inner join zubar on intervencija.zubar_id = zubar.zubar_id where intervencija.zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
}
