<?php
class KategorijaModel implements ModelInterface{
    
    public static function getAll() {
        $SQL = 'SELECT * FROM kategorija ORDER BY kategorija_id;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($kategorija_id) {
        $kategorija_id = intval($kategorija_id);
        $SQL = 'SELECT * FROM kategorija WHERE kategorija_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$kategorija_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }
    
    public static function dodaj($vrsta) {
        $SQL = 'INSERT INTO kategorija (vrsta) VALUES (?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$vrsta]);
    
    }
    public static function ukloni($kategorija_id){
        $kategorija_id = intval($kategorija_id);
        $SQL = 'DELETE from kategorija WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$kategorija_id]);
        
    }
    public static function izmeni($vrsta, $kategorija_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'UPDATE kategorija SET vrsta = ?  WHERE kategorija_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$vrsta, $kategorija_id]);
    
    }

}

