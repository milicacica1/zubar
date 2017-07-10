<?php

class SadrzajController extends AdminController {
    /**
     * Metod index u Sadrzaj kontroleru koji prikazuje sve usluge koje postoje u ovoj zubarskoj ordinaciji. 
     * Sadrzaj model poziva funkciju getAll kako bi uzeo sve usluge.
     * Takodje se postavlja i naslov.
     */
    public function index() {
        $this->setData('naslov', 'Usluge');
        $listaUsluga = SadrzajModel::getAll();
        $this->setData('usluge', $listaUsluga);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
    }

    public function prikaziPoKategoriji($kategorija_id) {
        $naslov = KategorijaModel::getById($kategorija_id);
        $this->setData('naslov', $naslov->vrsta);
        $listaUslugaPoKateoriji = KategorijaModel::getById($kategorija_id);
        $this->setData('uslugepokategoriji', $listaUslugaPoKateoriji);
        $listaKategorija = KategorijaModel::getAll();
        $this->setData('kategorija', $listaKategorija);
    }

    public function dodaj() {
        $listaUsluga = SadrzajModel::getAll();
        $this->setData('usluge', $listaUsluga);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
        $this->setData('naslov', 'Dodaj uslugu');
        if ($_POST) {
            $kataloski_broj = filter_input(INPUT_POST, 'kataloski_broj');
            $naziv = filter_input(INPUT_POST, 'naziv');
            $opis = filter_input(INPUT_POST, 'opis');
            $cena = filter_input(INPUT_POST, 'cena', FILTER_SANITIZE_NUMBER_INT);
            $cena_sa_popustom = filter_input(INPUT_POST, 'cena_sa_popustom', FILTER_SANITIZE_NUMBER_INT);
            $kategorija_id = filter_input(INPUT_POST, 'kategorija', FILTER_SANITIZE_NUMBER_INT);
            
            if (preg_match('/^[A-Z]{2}[0-9]{4}/', $kataloski_broj) == 1 and preg_match('/([A-Za-z 0-9.,])*$/', $naziv) == 1
                    and preg_match('/([A-Za-z 0-9.,])*$/', $opis) == 1
                    and preg_match('/^[0-9]{1,4}$/', $cena) == 1
                    and preg_match('/^[0-9]{1,4}$/', $cena_sa_popustom) == 1
                    and preg_match('/^[0-9]$/', $kategorija_id) == 1) {
                
                $res = SadrzajModel::dodaj($kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id);

                if ($res) {
                    $this->setData('poruka', "UNETI SU PODACI");
                    Misc::redirect('usluge/');
                } else {

                    $this->setData('poruka', "Doslo je do greske. Nova usluga nije dodata.");
                }
            }else{
                $this->setData('poruka', "Nisu uneti dobri podaci.");
            }
        }
    }

    public function izmeni($usluga_id) {
        $listaUsluga = SadrzajModel::getById($usluga_id);
        $this->setData('usluge', $listaUsluga);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
        $this->setData('naslov', 'Izmena usluge');
        if ($_POST) {
            $kataloski_broj = filter_input(INPUT_POST, 'kataloski_broj');
            $naziv = filter_input(INPUT_POST, 'naziv');
            $opis = filter_input(INPUT_POST, 'opis');
            $cena = filter_input(INPUT_POST, 'cena');
            $cena_sa_popustom = filter_input(INPUT_POST, 'cena_sa_popustom');
            $kategorija_id = filter_input(INPUT_POST, 'kategorija');
            
            if (preg_match('/^[A-Z]{2}[0-9]{4}/', $kataloski_broj) == 1 and preg_match('/([A-Za-z 0-9.,])*$/', $naziv) == 1
                    and preg_match('/([A-Za-z 0-9.,])*$/', $opis) == 1
                    and preg_match('/^[0-9]{1,4}$/', $cena) == 1
                    and preg_match('/^[0-9]{1,4}$/', $cena_sa_popustom) == 1
                    and preg_match('/^[0-9]$/', $kategorija_id) == 1) {
                $res = SadrzajModel::izmeni($usluga_id, $kataloski_broj, $naziv, $opis, $cena, $cena_sa_popustom, $kategorija_id);
                if ($res) {
                    Misc::redirect('usluge/');
                } else {
                    $this->setData('poruka', "Doslo je do greske. Usluga nije izmenjena!");
                }
            }else{
                $this->setData('poruka', "Uneli ste neispravne podatke!");
            }
           
        }
    }

    public function ukloni($usluga_id) {
        $listaUsluga = SadrzajModel::getById($usluga_id);
        $this->setData('usluge', $listaUsluga);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
        $this->setData('naslov', 'Ukloni uslugu');

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = SadrzajModel::ukloni($usluga_id);
                if ($res == true) {
                    Misc::redirect('usluge');
                } else {
                    $this->setData('poruka', "Usluga nije uklonjena!");
                }
            }
        }
    }

}
