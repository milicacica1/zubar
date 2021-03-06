<?php

class NeuspelaPrijavaModel implements ModelInterface{
    /**
     * Uzimaju se sve kategorije iz baze neuspela_prijava
     * @return array
     */
       public static function getAll() {
        $SQL = 'SELECT * FROM neuspela_prijava ORDER BY datetime DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Vraca sve neuspele prijave sa zadatim id-jem.
     * @param int $neuspela_prijava_id
     * @return type
     */
    public static function getById($neuspela_prijava_id) {
        $uspela_prijava_id = intval($uspela_prijava_id);
        $SQL = 'SELECT * FROM neuspela_prijava WHERE neuspela_prijava_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$neuspela_prijava_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Ukoliko korisnik unese pogresnu lozinku, u tabelu neuspela_prijava se
     * dodaje username za koji je ukucana neispravna lozinka.
     * @param timestamp $datetime
     * @param varchar $username
     * @return boolean
     */
    public static function addNeuspela($datetime, $username) {
        $SQL = 'INSERT INTO neuspela_prijava (datetime, username) VALUES (?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$datetime, $username]);
    }
}


