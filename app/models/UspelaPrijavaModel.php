<?php
class UspelaPrijavaModel implements ModelInterface {
    /**
     * 
     * @return type
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM uspela_prijava ORDER BY datetime DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $uspela_prijava_id
     * @return type
     */
    public static function getById($uspela_prijava_id) {
        $uspela_prijava_id = intval($uspela_prijava_id);
        $SQL = 'SELECT * FROM uspela_prijava WHERE uspela_prijava_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$uspela_prijava_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * 
     * @param type $zubar_id
     * @param type $datetime
     * @param type $ip
     * @param type $user_agent
     * @return type
     */
    public static function addUspela($zubar_id, $datetime, $ip, $user_agent) {
        $SQL = 'INSERT INTO uspela_prijava (zubar_id, datetime, ip, user_agent) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$zubar_id, $datetime, $ip, $user_agent]);
    }

    
}

