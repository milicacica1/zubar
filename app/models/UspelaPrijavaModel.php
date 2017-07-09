<?php
class UspelaPrijavaModel implements ModelInterface {
    
    public static function getAll() {
        $SQL = 'SELECT * FROM uspela_prijava ORDER BY datetime DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($uspela_prijava_id) {
        $uspela_prijava_id = intval($uspela_prijava_id);
        $SQL = 'SELECT * FROM uspela_prijava WHERE uspela_prijava_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$uspela_prijava_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
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

