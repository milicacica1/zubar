<?php
class KategorijaModel implements ModelInterface{
    /**
     * Uzimaju se sve kategorije iz baze Kategorija
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM kategorija;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat sa podacima kategorije
     * ciji kategorija_id je dat kao argument metode.
     * @param type $kategorija_id
     * @return stdClass/null
     */
    public static function getById($kategorija_id) {
        $kategorija_id = intval($kategorija_id);
        $SQL = 'SELECT * FROM kategorija WHERE kategorija_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$kategorija_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Metod koji vrsi dodavanje zapisa kategorija u bazu podataka.
     * @param varchar $vrsta
     * @return type boolean
     */
    public static function dodaj($vrsta) {
        $SQL = 'INSERT INTO kategorija (vrsta) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$vrsta]);
    
    }
    /**
     * MNetod koji vrsi brisanje zapisa kategorije iz baze podataka.
     * @param int $kategorija_id
     * @return boolean
     */
    public static function ukloni($kategorija_id){
        $kategorija_id = intval($kategorija_id);
        $SQL = 'DELETE from kategorija WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kategorija_id]);
        
    }
    /**
     * Metod koji vrsi izmenu zapisa kategorije u abzi podataka.
     * @param varchar $vrsta
     * @param int $kategorija_id
     * @return boolean
     */
    public static function izmeni($vrsta, $kategorija_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'UPDATE kategorija SET vrsta = ?  WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$vrsta, $kategorija_id]);
    
    }

}

