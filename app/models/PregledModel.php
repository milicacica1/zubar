<?php
class PregledModel implements ModelInterface{
    /**
     * Metod getAll vraca sve intervencije iz baze podatak.
     * @return array
     */
    public static function getAll(){
        $SQL = 'SELECT * FROM intervencija';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute();
        return $prep->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Metod koji vraca sve zapise iz tabele intervencija za zadatkog pacijenta.
     * @param int $pacijent_id
     * @return stdClass/null
     */
    public static function getById($pacijent_id){
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT * FROM intervencija WHERE pacijent_id = ?';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Ovaj metod vraca zub, naziv, cena, vreme, kataloski_broj, vrsta, cena_sa_popustom, opis, email
     * iz tabele intervencijeazajedno sa uslugama i kategorijama koje su 
     * uradjene na pacijentu ciji je id prosledjen kao argument funkcije.
     * @param int $pacijent_id
     * @return array
     */
    public function istorijaPacijenta($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT zub, naziv, cena, vreme, kataloski_broj, vrsta, cena_sa_popustom, opis, email FROM `intervencija`  INNER JOIN 
            pacijent on intervencija.pacijent_id = pacijent.pacijent_id INNER JOIN 
            usluga on intervencija.usluga_id = usluga.usluga_id INNER JOIN 
            kategorija on usluga.kategorija_id = kategorija.kategorija_id where pacijent.pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
    /**
     * Ovaj metod vraca zub, naziv, cena i vreme vrsenja intervencije za
     * pacijenta ciji je id prosledjen kao argument funkcije. 
     * @param int $pacijent_id
     * @return array
     */
    public function intervencijaPacijenta($pacijent_id) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'SELECT zub, naziv, cena, vreme FROM `intervencija` inner JOIN usluga on  intervencija.usluga_id=usluga.usluga_id  where pacijent_id = ?;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$pacijent_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
    /**
     * Metod koji vrsi dodavanje zapisa intervencije u bazu podataka.
     * @param int $pacijent_id
     * @param int $zubar_id
     * @param int $usluga_id
     * @param int $zub
     * @return boolean
     */
    public function dodajIntervenciju($pacijent_id, $zubar_id, $usluga_id, $zub) {
        $pacijent_id = intval($pacijent_id);
        $SQL = 'INSERT INTO `intervencija` (pacijent_id, zubar_id, usluga_id, zub) VALUES (?, ?, ?, ?);';
        $prep = DataBase::getInstance()->prepare($SQL);
        return $prep->execute([$pacijent_id, $zubar_id, $usluga_id, $zub]);
        
    }
    /**
     * Ovaj metod vraca sve intervencije, pacijente, usluge, kategorije koje je
     * izvrsio zubar ciji je id prosledjen kao argument funkcije.
     * @param int $zubar_id
     * @return array
     */
    public function getAllByZybarID($zubar_id) {
        $zubar_id = intval($zubar_id);
        $SQL = 'SELECT pacijent.ime, pacijent.prezime, jmbg, kategorija_pacijenta, zub, naziv, cena, vreme, kataloski_broj, vrsta, cena_sa_popustom, opis, email FROM `intervencija`  INNER JOIN 
            pacijent on intervencija.pacijent_id = pacijent.pacijent_id INNER JOIN 
            usluga on intervencija.usluga_id = usluga.usluga_id INNER JOIN 
            kategorija on usluga.kategorija_id = kategorija.kategorija_id inner join zubar on intervencija.zubar_id = zubar.zubar_id  where intervencija.zubar_id = ?  order by vreme DESC;';
        $prep = DataBase::getInstance()->prepare($SQL);
        $prep->execute([$zubar_id]);
        return $prep->fetchAll(PDO::FETCH_OBJ);
        
    }
}
