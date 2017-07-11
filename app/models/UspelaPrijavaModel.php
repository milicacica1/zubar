<?php
class UspelaPrijavaModel implements ModelInterface {
    /**
     * Vraca sve uspesne prijave iz tabele uspela prijava poredjano po vremenu u opadajucem poredku.
     * @return array
     */
    public static function getAll() {
        $SQL = 'SELECT * FROM uspela_prijava ORDER BY datetime DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca objekat sa podacima uspele prijave
     * ciji uspela prijava id je dat kao argument metode.
     * @param int $uspela_prijava_id
     * @return stdClass/null
     */
    public static function getById($uspela_prijava_id) {
        $uspela_prijava_id = intval($uspela_prijava_id);
        $SQL = 'SELECT * FROM uspela_prijava WHERE uspela_prijava_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$uspela_prijava_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vrsi dodavanje zapisa uspela prijava u bazu podataka.
     * @param int $zubar_id
     * @param timestamp $datetime
     * @param varchar $ip
     * @param varchar $user_agent
     * @return boolean
     */
    public static function addUspela($zubar_id, $datetime, $ip, $user_agent) {
        $SQL = 'INSERT INTO uspela_prijava (zubar_id, datetime, ip, user_agent) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$zubar_id, $datetime, $ip, $user_agent]);
    }

    
}

