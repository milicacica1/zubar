<?php

class SadrzajModel implements ModelInterface{
    /**
     * 
     * @return type
     */
    public static function getAll(){
        $SQL = 'SELECT * FROM usluga';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @return type
     */
    public static function getAllWithCat(){
        $SQL = 'SELECT * FROM usluga inner join kategorija on usluga.kategorija_id = kategorija.kategorija_id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $usluga_id
     * @return type
     */
    public static function getById($usluga_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'SELECT * FROM usluga inner join kategorija on usluga.kategorija_id = kategorija.kategorija_id WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$usluga_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $usluga_id
     * @param type $kataloski_broj
     * @param type $naziv
     * @param type $opis
     * @param type $cena
     * @param type $cena_sa_popustom
     * @param type $kategorija_id
     * @return type
     */
    public static function izmeni($usluga_id, $kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'UPDATE usluga SET kataloski_broj = ?, naziv = ?, opis = ?, cena = ?, cena_sa_popustom = ?, kategorija_id = ? WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id, $usluga_id]);
        
    }
    /**
     * 
     * @param type $usluga_id
     * @return type
     */
    public static function ukloni($usluga_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'DELETE from usluga WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$usluga_id]);
        
    }
    /**
     * 
     * @param type $kataloski_broj
     * @param type $naziv
     * @param type $opis
     * @param type $cena
     * @param type $cena_sa_popustom
     * @param type $kategorija_id
     * @return type
     */
    public static function dodaj($kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id) {
        $SQL = 'INSERT INTO usluga (kataloski_broj, naziv, opis, cena, cena_sa_popustom, kategorija_id) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        
        return $prep->execute([$kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id]);
    
    }
    /**
     * 
     * @param type $kategorija_id
     * @return type
     */
    public static function getCategoryNameById($kategorija_id){
        $kategorija_id = intval($kategorija_id);
        $SQL = 'SELECT distinct vrsta FROM kategorija WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$kategorija_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    
}