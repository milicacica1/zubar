<?php

class KategorijaController extends AdminController {
    public function index() {
        $this->setData('naslov', 'Kategorije');
        $listaKategorija = KategorijaModel::getAll();
        $this->setData('kategorije', $listaKategorija);
    }

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
