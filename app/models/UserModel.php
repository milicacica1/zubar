<?php
class UserModel implements ModelInterface {
    public static function getAll() {
        $SQL = 'SELECT * FROM zubar;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute();
        if ($res) {
            return $prep->fetchAll(PDO::FETCH_OBJ);
        } else {
            return [];
        }
    }

    public static function getById($id) {
        $SQL = 'SELECT * FROM zubar WHERE zubar_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$id]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }

    public static function getByUsernameAndPasswordHash($username, $passwordHash) {
        $SQL = 'SELECT * FROM zubar WHERE `username` = ? AND `password` = ? AND active = 1;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $res = $prep->execute([$username, $passwordHash]);
        if ($res) {
            return $prep->fetch(PDO::FETCH_OBJ);
        } else {
            return null;
        }
    }
    public static function addUspela($zubar_id, $datetime, $ip, $user_agent) {
        $SQL = 'INSERT INTO uspela_prijava (zubar_id, datetime, ip, user_agent) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$zubar_id, $datetime, $ip, $user_agent]);
    }
    public static function addNeuspela($datetime, $username) {
        $SQL = 'INSERT INTO neuspela_prijava (datetime, username) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$datetime, $username]);
    }

}
