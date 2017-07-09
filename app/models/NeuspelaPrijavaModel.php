<?php

class NeuspelaPrijavaModel implements ModelInterface{
       public static function getAll() {
        $SQL = 'SELECT * FROM neuspela_prijava ORDER BY datetime DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($neuspela_prijava_id) {
        $uspela_prijava_id = intval($uspela_prijava_id);
        $SQL = 'SELECT * FROM neuspela_prijava WHERE neuspela_prijava_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$neuspela_prijava_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function addNeuspela($datetime, $username) {
        $SQL = 'INSERT INTO neuspela_prijava (datetime, username) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$datetime, $username]);
    }
}


