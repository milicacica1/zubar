<?php

class PacijentModel implements ModelInterface {
    /**
     * Metod getAll vraca sve pacijente iz baze poredjane po id-ju.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM pacijent ORDER BY pacijent_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat sa podacima pacijenta ciji je id dat kao
     * argument metoda.
     * @param int $pacijent_id
     * @return stdClass/null
     */
    public static function getById($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT * FROM pacijent WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat sa kategorijom pacijenta ciji je id dat kao
     * argument metoda.
     * @param int $pacijent_id
     * @return stdClass/null
     */
    public static function getKategorijaPacijentaById($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT kategorija_pacijenta FROM pacijent WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca sve pacijente sa zubarom ciji je id dat kao argument metoda.
     * @param int $zubar_id
     * @return array
     */
    public static function getByZubarId($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT * FROM pacijent WHERE zubar_id = ? ORDER BY pacijent_id DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vrsi dodavanje zapisa pacijenta u bazu podataka.
     * @param varchar $ime
     * @param varchar $prezime
     * @param varchar $email
     * @param varchar $jmbg
     * @param date $datum_rodjenja
     * @param varchar $telefon
     * @param varchar $alergije
     * @param varchar $kategorija
     * @param int $zubar_id
     * @return boolean
     */
    public static function dodaj($ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id) {
        $SQL = 'INSERT INTO pacijent (ime, prezime, email, jmbg, datum_rodjenja, telefon, alergije, kategorija_pacijenta, zubar_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id]);
    }
    /**
     * Metod koji vrsi brisanje zapisa pacijenta iz baze podataka.
     * @param int $pacijent_id
     * @return boolean
     */
    public static function ukloni($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'DELETE from pacijent WHERE pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$pacijent_id]);
    }
    /**
     * Metod koji vrsi izmenu zapisa pacijenta.
     * @param int $pacijent_id
     * @param varchar $ime
     * @param varchar $prezime
     * @param varchar $email
     * @param varchar $jmbg
     * @param date $datum_rodjenja
     * @param varchar $telefon
     * @param varchar $alergije
     * @param varchar $kategorija
     * @param int $zubar_id
     * @return boolean
     */
    public static function izmeni($pacijent_id, $ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'UPDATE pacijent SET ime = ?, prezime = ?, email = ?, jmbg = ?, datum_rodjenja = ?, telefon = ?, alergije = ?, kategorija_pacijenta = ?, zubar_id  = ? WHERE pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id, $pacijent_id]);
    }
    /**
     * Metod koji vraca poslednji id iz tabele pacijent. 
     * @return stdClass/null
     */
    public static function getLastInsertID() {
        $SQL = 'SELECT `AUTO_INCREMENT` from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "singident"  AND TABLE_NAME = "pacijent";';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetch(PDO::FETCH_OBJ);
    }

}
