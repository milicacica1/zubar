<?php

/**
 * Description of AdminLoginController
 * Klasa AdminLogin kontrolera.
 * @author milica
 */
class AdminLoginController extends AdminController {

    /**
     * Metod index postavlja naslov "Admin" za stranicu index koja se prikazuje samo adminu.
     * Ovaj metod poziva AdminLoginModel i njegovu funkciju getAll(), koja vraca sve aktivne zubare
     * iz baze podataka. Promenljiva $listaZubara sadrzi sve zubare iz ordinacije SingiDent.
     * Dalje se podaci iz proenljive postavljaju kao vrednost pod kljucem 'zubari'.
     * 
     */
    public function index() {
        $this->setData('naslov', 'Admin');
        $listaZubara = AdminLoginModel::getAll();
        $this->setData('zubari', $listaZubara);
    }

    /**
     * Metod prikazNjegovihPacijenata je metod kom je prosledjen zubar_id i 
     * koji iz baze podataka uzima sve pacijente koji imaju zubara sa tim parametrom.
     * Takodje postavlja naslov "Admin" pod kljucem 'Naslov'
     * @param int $zubar_id
     */
    public function prikazNjegovihPacijenata($zubar_id) {
        $this->setData('naslov', 'Admin');
        $listaPacijenata = AdminLoginModel::getAllByZubarId($zubar_id);
        $this->setData('zubari', $listaPacijenata);
    }

    /**
     * Metod dodaj sluzi adminu da doda zubare u bazu podataka.
     * Nema nijedan argument. Takodje postavlja naslov "Dodaj zubara".
     * U ovom metodu se uzima vrednost i metoda POST ukoliko je setovan.
     * Iz forme se uzimaju vrednosti iz inputa sa odredjenim imenima.
     * Te vrednosti se proveravaju funkcijom preg match i odgovarajucim regexima kako
     * bi se uneli validni podaci. Pre nego sto se pozove funkcija dodaj modela AdminLogin Model,
     * sve vrednosti moraju biti validne i lozinka se mora hesovati kako bi se unela u bazu.
     * Lozinka se hesuje uz pomoc funkcije hash. Koriscen je sha512 sigurnosni algoritam za hesiranje.
     * Poziva se funkcija dodaj iz odgovarajuceg modela i ukoliko su vrednosti unete u bazu, promenjljiva
     * $res ce vratiti true vrednost. Ukoliko je vrednost true, admin ce biti preusmeren na stranicu za izlistavanje
     * svih zubara gde ce moci da vidi i novog zubara zajedno sa ostalima.
     * ukoliko promenljiva $res vrati false vrednost, podaci nisu uneti i ispisuje se dgovarajuca poruka.
     * Takodje ukoliko podaci ne zadovoljavaju regularne izraze, prikazace se poruka, kao i ako je POST prazan.
     */
    public function dodaj() {
        $this->setData('naslov', 'Dodaj zubara');
        if ($_POST) {
            $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
            $prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            
            if (preg_match('/^[a-z]{4,}$/', $username) and preg_match('/^.{6,}$/', $password)
                    and preg_match('/^[A-Z][a-z]+/', $ime)
                    and preg_match('/^[A-Z][a-z]+(-[A-Z][a-z]+)*/', $prezime)) {
                $hash = hash('sha512', $password . Configuration::USER_SALT);
                $res = AdminLoginModel::dodaj($username, $hash, $ime, $prezime);
                if ($res) {
                    $this->setData('poruka', "UNETI SU PODACI");
                    Misc::redirect('admin/');
                } else {
                    $this->setData('poruka', 'Doslo je do greske. Novi zubar nije dodat!');
                }
            } else {
                $this->setData('poruka', 'Nisu uneti ispravni podaci.');
            }
        }
    }
    /**
     * Metod klase AdminLoginController koji prima parametar tipa int kako bi se obrisao zubar pod tim kljucem.
     * Ovaj metod postavlja naslov i podatke sa kljucem zubar kako bi korisnik mogao da potvrdi brisanje zubara pod tim kljucem.
     * Metod poziva AdminLoginModel i njegovu funkciju 'ukloni'.
     * @param int $zubar_id
     */

    public function ukloni($zubar_id) {
        $zubar = AdminLoginModel::getById($zubar_id);
        $this->setData('zubar', $zubar);
        $this->setData('naslov', 'Ukloni zubara');

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = AdminLoginModel::ukloni($zubar_id);
                if ($res) {
                    Misc::redirect('admin/');
                } else {
                    $this->setData('poruka', "Zubar nije uklonjen!");
                }
            }
        }
    }
    /**
     * Metod klase AdminLoginController koji prima parametar tipa int kako bi se izmenio zubar pod tim kljucem.
     * Ovaj metod postavlja naslov i podatke sa kljucem zubar kako bi korisnik mogao vidi prethodno unesene podatke za zubara
     * sa tim jedinstvenim parametrom.
     * Metod poziva AdminLoginModel i njegovu funkciju 'ukloni'.
     * @param int $zubar_id
     */

    public function izmeni($zubar_id) {
        $zubar = AdminLoginModel::getById($zubar_id);
        $this->setData('zubar', $zubar);
        $this->setData('naslov', 'Izmena zubara');
        if ($_POST) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
            $prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);

            if (preg_match('/^[a-z]{4,}$/', $username)
                    and preg_match('/^[A-Z][a-z]+/', $ime)
                    and preg_match('/^[A-Z][a-z]+(-[A-Z][a-z]+)*/', $prezime)) {
                $hash = hash('sha512', $password . Configuration::USER_SALT);
                $res = AdminLoginModel::izmeni($username, $ime, $prezime, $zubar_id);
                if ($res) {
                    $this->setData('poruka', "UNETI SU PODACI");
                    Misc::redirect('admin/');
                } else {
                    $this->setData('poruka', 'Doslo je do greske. Zubar nije izmenjen!');
                }
            } else {
                $this->setData('poruka', 'Nisu uneti ispravni podaci.');
            }
        }
    }
    /**
     * Metod kontrolera AdminLogin koji postavlja naslov i izlistava sve uspele prijave na siste.
     * U ovom metodu se poziva model UspelaPrijava, odakle se uzimaju sve uspele prijave.
     * Nema argumente.
     */

    public function uspele() {
        $prijava = UspelaPrijavaModel::getAll();
        $this->setData('prijave', $prijava);
        $this->setData('naslov', 'Uspele prijave');
    }
    /**
     * Metod kontrolera AdminLogin koji postavlja naslov i izlistava sve neuspele prijave na siste.
     * U ovom metodu se poziva model UspelaPrijava, odakle se uzimaju sve neuspesne prijave.
     * Nema argumente.
     */

    public function neuspele() {
        $prijava = NeuspelaPrijavaModel::getAll();
        $this->setData('prijave', $prijava);
        $this->setData('naslov', 'Neuspele prijave');
    }

}
