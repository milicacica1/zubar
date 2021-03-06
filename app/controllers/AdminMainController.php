<?php

class AdminMainController extends Controller {
    /**
     * Metod logout u AdminMain kontoleru, koji prekida sesiju i preusmerava
     * admina na stranicu za ponovno logovanuje na sistem.
     */
    public function logout() {
        Session::end();
        Misc::redirect('adminlogin');
    }
    /**
     * Metod login u AdminMain kontroleru, koji ukoliko POST nije prazan
     * uzima vrednosti iz inputa pod nazivom username i password.
     * Te vrednosti se proveravaju, koristeci funkciju prag match i odgovarajuce regularne izraze.
     * U ovom metodu se hesuje lozinka uz pomoc funkcije hash koristeci sigunrnosni algoritam za hesovanje sha512.
     * Proverava se da li korisnik sa tim korisnickim imenom i lozinkom postoji u bazi. 
     * Promenljiva $admin vraca vrednost true ili false. Ukoliko je vrednosti true, postavice se nova sesija za kljucem admin_id.
     * I vrednoscu jeidnstvenog parametra za tog korisnika tj admina.
     * Kor  isnik se onda preusmerava na pocetnu stranu za admina.
     */

    public function login() {
        if (!empty($_POST)) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            if (preg_match('/^[a-z]{4,}$/', $username) and preg_match('/^.{6,}$/', $password)) {
                $hash = hash('sha512', $password . Configuration::USER_SALT);

                $admin = AdminLoginModel::getByUsernameAndPasswordHash($username, $hash);

                if ($admin) {
                    Session::set('admin_id', $admin->admin_id);
                    Session::set('username', $username);
                    Misc::redirect('admin');
                } else {
                    $this->setData('message', 'Nisu dobri login parametri.');
                    sleep(1);
                }
            } else {
                $this->setData('message', 'Nisu dobri login parametri.');
                sleep(1);
            }
        }
    }

}
