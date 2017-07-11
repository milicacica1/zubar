<?php
class UserModel implements ModelInterface {
    /**
     * Vraca sve zubare iz tabele zubar;
     * @return array
     */
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
    /**
     * Metod koji vraca zubara sa id-jem prosledjenimkao argument funkcije.
     * @param int $id
     * @return stdClass/null
     */
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
    /**
     * Ukoliko postoji korisnik sa zadatim login parametrima vratice se vrednost true.
     * @param varchar $username
     * @param char $passwordHash
     * @return boolean
     */
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

}
