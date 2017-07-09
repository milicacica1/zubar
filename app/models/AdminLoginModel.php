<?php

class AdminLoginModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM zubar ORDER BY zubar_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAllByZubarId($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT * FROM pacijent where zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    public static function getById($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT * FROM zubar WHERE zubar_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
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
    public static function ukloni($zubar_id){
        $zubar_id = intval($zubar_id);
        $SQL = 'DELETE from zubar WHERE zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$zubar_id]);
        
    }
    public static function dodaj($username, $password, $ime, $prezime) {
        $SQL = 'INSERT INTO zubar (username, password, ime, prezime) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$username, $password, $ime, $prezime]);
    
    }
    public static function izmeni($username, $ime, $prezime, $zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'UPDATE zubar SET username = ?, ime = ?, prezime = ? WHERE zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$username, $ime, $prezime, $zubar_id]);
    
    }

}
