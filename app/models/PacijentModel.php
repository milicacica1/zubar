<?php
class PacijentModel implements ModelInterface{
    public static function getAll(){
        $SQL = 'SELECT * FROM pacijent ORDER BY pacijent_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    //getKategorijaPacijentaById
    public static function getById($pacijent_id){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT * FROM pacijent WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    public static function getKategorijaPacijentaById($pacijent_id){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT kategorija_pacijenta FROM pacijent WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
     public static function getByZubarId($zubar_id){
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT * FROM pacijent WHERE zubar_id = ? ORDER BY pacijent_id DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
     public static function dodaj($ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id) {
        $SQL = 'INSERT INTO pacijent (ime, prezime, email, jmbg, datum_rodjenja, telefon, alergije, kategorija_pacijenta, zubar_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $zubar_id]);
    
    }
    public static function ukloni($pacijent_id){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'DELETE from pacijent WHERE pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$pacijent_id]);
        
    }
    public static function izmeni($pacijent_id, $ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'UPDATE pacijent SET ime = ?, prezime = ?, email = ?, jmbg = ?, datum_rodjenja = ?, telefon = ?, alergije = ?, kategorija_pacijenta = ?, zubar_id  = ? WHERE pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id, $pacijent_id]);
    
    }
    public static function getLastID(){
        
        $SQL = 'SELECT Max(pacijent_id) as ID FROM pacijent;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
    public static function getLastInsertID(){
        $SQL = 'SELECT `AUTO_INCREMENT` from INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = "singident"  AND TABLE_NAME = "pacijent";';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetch(PDO::FETCH_OBJ);
   }
    
}
