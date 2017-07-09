<?php

class SadrzajModel implements ModelInterface{
    public static function getAll(){
        $SQL = 'SELECT * FROM usluga ORDER BY naziv;';
        //$SQL = 'SELECT * FROM usluga INNER JOIN kategorija ON usluga.kategorija_id = kategorija.kategorija_id ORDER BY naziv;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getById($usluga_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'SELECT * FROM usluga inner join kategorija on usluga.kategorija_id = kategorija.kategorija_id WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$usluga_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    public static function getByCategoryId($kategorija_id){
        $kategorija_id = intval($kategorija_id);
        $SQL = 'SELECT * FROM usluga WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$kategorija_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function izmeni($usluga_id, $kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'UPDATE usluga SET kataloski_broj = ?, naziv = ?, opis = ?, cena = ?, cena_sa_popustom = ?, kategorija_id = ? WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id, $usluga_id]);
        
    }
    public static function ukloni($usluga_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'DELETE from usluga WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$usluga_id]);
        
    }
    public static function dodaj($kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id) {
        $SQL = 'INSERT INTO usluga (kataloski_broj, naziv, opis, cena, cena_sa_popustom, kategorija_id) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        
        return $prep->execute([$kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id]);
    
    }
    public static function getCategoryNameById($kategorija_id){
        $kategorija_id = intval($kategorija_id);
        $SQL = 'SELECT distinct vrsta FROM kategorija WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$kategorija_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
     public static function getCategory(){
        $SQL = 'SELECT * FROM kategorija';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    
    
}