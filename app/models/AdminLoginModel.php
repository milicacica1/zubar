<?php

class AdminLoginModel implements ModelInterface {
    /**
     * Vraca sve zubare iz tabele zubar poredjano po zubar id-ju
     * @return type
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM zubar ORDER BY zubar_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Vraca sve pacijente koji imaju zubara sa zadatim id-jem
     * @param int $zubar_id
     * @return array
     */
    public function getAllByZubarId($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT * FROM pacijent where zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Vraca sve informacije o zubaru sa zadatim id-jem
     * @param type $zubar_id
     * @return type
     */
    public static function getById($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT * FROM zubar WHERE zubar_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Ukoliko postoji korisnik sa zadatim login parametrima vratice se vrednost true.
     * @param varchar $username
     * @param char $passwordHash
     * @return boolean
     */
    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM admin WHERE `username` = ? AND `password` = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    /**
     * Uklanja se zubar iz tabele zubar sa zadatim id-ijem
     * @param int $zubar_id
     * @return boolean
     */
    public static function ukloni($zubar_id){
        $zubar_id = intval($zubar_id);
        $SQL = 'DELETE from zubar WHERE zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$zubar_id]);
        
    }
   /**
    * Dodaje se novi korisnik ili zubar u tabelu zubar.
    * @param varchar $username
    * @param char $password
    * @param varchar $ime
    * @param varchar $prezime
    * @return boolean
    */
    public static function dodaj($username, $password, $ime, $prezime) {
        $SQL = 'INSERT INTO zubar (username, password, ime, prezime) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$username, $password, $ime, $prezime]);
    
    }
    /**
     * Azurira se tabela zubar.
     * @param varchar $username
     * @param varchar $ime
     * @param varchar $prezime
     * @param int $zubar_id
     * @return boolean
     */
    public static function izmeni($username, $ime, $prezime, $zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'UPDATE zubar SET username = ?, ime = ?, prezime = ? WHERE zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$username, $ime, $prezime, $zubar_id]);
    
    }

}
