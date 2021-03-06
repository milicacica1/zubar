<?php

class KategorijaController extends AdminController {
    /**
     * Metod index u Kategrija kontroleru koji prikazuje sve kategorije iz baze pozivajui KategorijaModel 
     * i njegov u funkciju getAll. Takodje se posatavlja i naslov.
     */
    public function index() {
        $this->setData('naslov', 'Kategorije');
        $listaKategorija = KategorijaModel::getAll();
        $this->setData('kategorije', $listaKategorija);
    }
     /**
     * Metod dodaj u Kategrija kontroleru koji poziva KategorijaModel i njegovu funkciju dodaj.
     * Ovaj metod vrsi dodavanje nove kategorije u bazu. Pre nego sto se unesu vrednosti, proverava se da li su ispravne.
     * Za validnost podataka se koristi funkcija preg match i regex. Takodje se posatavlja i naslov.
     */

    public function dodaj() {
        $listaKategorija = KategorijaModel::getAll();
        $this->setData('kategorije', $listaKategorija);
        $this->setData('naslov', 'Dodaj kategoriju');
        if ($_POST) {

            $vrsta = filter_input(INPUT_POST, 'kategorija', FILTER_SANITIZE_STRING);
            

            if (preg_match('/^[A-Z][a-z]+( [a-z]+)*/', $vrsta) == 1) {
                $res = KategorijaModel::dodaj($vrsta);
                if ($res) {
                    $this->setData('poruka', "UNETI SU PODACI");
                    Misc::redirect('kategorije/');
                } else {
                    $this->setData('poruka', 'Doslo je do greske. Nova kategorija nije dodata!');
                }
            } else {
                $this->setData('poruka', 'Niste uneli dobre podatke.');
            }
        }
    }
    /**
     * Metod ukloni u Kategorija kontroleru koju brise kategoriju sa zadatim jedinstvenim parametrom uz pomoc funkcije ukloni
     * u Kategorija modelu. Takodje i posatavlja naslov.
     * @param int $kategorija_id
     */

    public function ukloni($kategorija_id) {
        $kategorija = KategorijaModel::getById($kategorija_id);
        $this->setData('kategorija', $kategorija);
        $this->setData('naslov', 'Ukloni kategoriju');

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = KategorijaModel::ukloni($kategorija_id);
                if ($res) {
                    Misc::redirect('kategorije/');
                } else {
                    $this->setData('poruka', "Kategorija nije uklonjena!");
                }
            }
        }
    }
    /**
     * Metod izmeni uzima vrednosti iz forme pod nazivom kategorija i unosi nove, izmenjene podatke u tabelu.
     * Izmena se vrsi pozivanjem funkcije izmeni u Kategorija modelu. Izmenice se samo kategorija
     * sa zadatim jedinstvenim parametrom. Takodje ovaj metod postavlja naslov. 
     * @param int $kategorija_id
     */

    public function izmeni($kategorija_id) {
        $kategorija = KategorijaModel::getById($kategorija_id);
        $this->setData('kategorija', $kategorija);
        $this->setData('naslov', 'Izmena kategorije');
        if ($_POST) {
            $vrsta = filter_input(INPUT_POST, 'kategorija', FILTER_SANITIZE_STRING);

            if (preg_match('/^[A-Z][a-z]+( [a-z]+)*/', $vrsta) == 1) {

                $res = KategorijaModel::izmeni($vrsta, $kategorija_id);
                if ($res) {
                    Misc::redirect('kategorije/');
                } else {
                    $this->setData('poruka', "Doslo je do greske. Podaci o kategoriji nisu izmenjeni!");
                }
            } else {
                $this->setData('poruka', "Unesite ispravne podatke!");
            }
        }
    }

}
