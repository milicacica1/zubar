<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminLoginController
 *
 * @author milica
 */
class AdminLoginController extends AdminController {

    public function index() {
        $this->setData('naslov', 'Admin');
        $listaPacijenata = AdminLoginModel::getAll();
        $this->setData('pacijenti', $listaPacijenata);
    }

    public function prikazNjegovihPacijenata($zubar_id) {
        $this->setData('naslov', 'Admin');
        $listaPacijenata = AdminLoginModel::getAllByZubarId($zubar_id);
        $this->setData('zubari', $listaPacijenata);
    }

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
                $res = AdminLoginController::dodaj($username, $hash, $ime, $prezime);
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


    public function ukloni($zubar_id) {
        $zubar = AdminLoginModel::getById($zubar_id);
        $this->setData('zubar', $zubar);
        $this->setData('naslov', 'Ukloni zubara');

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = AdminLoginController::ukloni($zubar_id);
                if ($res) {
                    Misc::redirect('admin/');
                } else {
                    $this->setData('poruka', "Zubar nije uklonjen!");
                }
            }
        }
    }
    
     public function izmeni($zubar_id) {
        $zubar = AdminLoginModel::getById($zubar_id);
        $this->setData('zubar', $zubar);
        $this->setData('naslov', 'Izmena zubara');
        if ($_POST) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password');
            $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
            $prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
            
            if (preg_match('/^[a-z]{4,}$/', $username) and preg_match('/^.{6,}$/', $password)
                    and preg_match('/^[A-Z][a-z]+/', $ime)
                    and preg_match('/^[A-Z][a-z]+(-[A-Z][a-z]+)*/', $prezime)) {
                $hash = hash('sha512', $password . Configuration::USER_SALT);
                $res = AdminLoginController::izmeni($username, $hash, $ime, $prezime);
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
    
       public function uspele() {
        $prijava = UspelaPrijavaModel::getAll();
        $this->setData('prijave', $prijava);
        $this->setData('naslov', 'Uspele prijave');
        
    }
     public function neuspele() {
        $prijava = NeuspelaPrijavaModel::getAll();
        $this->setData('prijave', $prijava);
        $this->setData('naslov', 'Neuspele prijave');
        
    }

}
