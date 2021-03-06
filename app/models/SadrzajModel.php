<?php

class SadrzajModel implements ModelInterface{
    /**
     * Metod getAll vraca sve usluge iz baze podataka.
     * @return array
     */
    public static function getAll(){
        $SQL = 'SELECT * FROM usluga';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metog getAllWithCat vraca sve usluge iz baze podataka zajedno sa njihovim kategorijama.
     * @return array
     */
    public static function getAllWithCat(){
        $SQL = 'SELECT * FROM usluga inner join kategorija on usluga.kategorija_id = kategorija.kategorija_id';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat sa podacima usluge ciji je id dat kao
     * argument metoda.
     * @param int $usluga_id
     * @return stdClass/null
     */
    public static function getById($usluga_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'SELECT * FROM usluga inner join kategorija on usluga.kategorija_id = kategorija.kategorija_id WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$usluga_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Ovaj metod vraca sve usluge koje imaju kategorju id 
     * koja je prosledjena kao argument ove funkcije.
     * @param int $kategorija_id
     * @return array
     */
    public static function getByCategoryId($kategorija_id){
        $kategorija_id = intval($kategorija_id);
        $SQL = 'SELECT * FROM usluga WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$kategorija_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param int $usluga_id
     * @param varchar $kataloski_broj
     * @param varchar $naziv
     * @param varchar $opis
     * @param int $cena
     * @param int $cena_sa_popustom
     * @param int $kategorija_id
     * @return boolean
     */
    public static function izmeni($usluga_id, $kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'UPDATE usluga SET kataloski_broj = ?, naziv = ?, opis = ?, cena = ?, cena_sa_popustom = ?, kategorija_id = ? WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id, $usluga_id]);
        
    }
    /**
     * Metod ukloni brise zapis iz tabele usluga koji ima id prosledjen kao argument funkcije.
     * @param int $usluga_id
     * @return boolean
     */
    public static function ukloni($usluga_id){
        $usluga_id = intval($usluga_id);
        $SQL = 'DELETE from usluga WHERE usluga_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$usluga_id]);
        
    }
    /**
     * Metod koji vrsi dodavanje zapisa usluga u bazu podataka.
     * @param varchar $kataloski_broj
     * @param varchar $naziv
     * @param varchar $opis
     * @param int $cena
     * @param int $cena_sa_popustom
     * @param int $kategorija_id
     * @return boolean
     */
    public static function dodaj($kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id) {
        $SQL = 'INSERT INTO usluga (kataloski_broj, naziv, opis, cena, cena_sa_popustom, kategorija_id) VALUES (?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id]);
    }

    
    
}