<?php

class PacijentController extends AdminController {

    public function index() {
        $this->setData('naslov', 'Kartoni');
        $listaPacijenata = PacijentModel::getAll();
        $this->setData('pacijent', $listaPacijenata);
        $pacijenti = PacijentModel::getByZubarId(Session::get('zubar_id'));
        $this->setData('pacijentitogzubara', $pacijenti);
    }

    public function dodaj() {
        $listaUsluga = PacijentModel::getAll();
        $this->setData('usluge', $listaUsluga);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
        $this->setData('naslov', 'Dodaj pacijenta');

        $w = false;
        $h = false;
        $k = false;

        if ($_POST) {

            $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
            $prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $jmbg = filter_input(INPUT_POST, 'jmbg', FILTER_SANITIZE_STRING);
            $datum_rodjenja = filter_input(INPUT_POST, 'datum_rodjenja');
            $telefon = filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING);
            $alergije = filter_input(INPUT_POST, 'alergije', FILTER_SANITIZE_STRING);
            $kategorija = filter_input(INPUT_POST, 'kategorija', FILTER_SANITIZE_STRING);
            $zubar_id = Session::get('zubar_id');

            if ($kategorija == 'odrasli' or $kategorija == 'dete' or $kategorija == 'penzioner' or $kategorija == 'student') {
                $k = true;
            }

            $last_id = PacijentModel::getLastInsertID();
            $a = $last_id->AUTO_INCREMENT;

            if (isset($_FILES['fileToUpload'])) {
                $file_name = $_FILES['fileToUpload']['name'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];

                list($width, $height) = getimagesize($file_tmp);
                if ($width === 150) {
                    $w = true;
                }
                if ($height === 150) {
                    $h = true;
                }

                $file_name = $a . '.jpg';
            }
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);

            if (preg_match('/^[A-Z][a-z]+/', $ime) == 1 and preg_match('/^[A-Z][a-z]+(-[A-Z][a-z]+)*/', $prezime) == 1
                    and preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $email) == 1
                    and preg_match('/^[0-9]{13}/', $jmbg) == 1
                    and preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $datum_rodjenja) == 1
                    and preg_match('/^[0-9]*$/', $telefon) == 1
                    and preg_match('/^([A-Za-z]+)$/', $alergije) == 1
                    and $w == true
                    and $h == true
                    and $ext == 'jpg'
                    and $k == true) {
                $res = PacijentModel::dodaj($ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id);
                if ($res) {
                    move_uploaded_file($file_tmp, "assets/img/profil/" . $file_name);
                    $this->setData('poruka', "UNETI SU PODACI");
                    Misc::redirect('pacijenti/');
                } else {
                    $this->setData('poruka', 'Doslo je do greske. Novi pacijent nije dodat!');
                }
            } else {
                $this->setData('poruka', 'Niste uneli dobre podatke. Slika mora biti jpg i dimenzije 150x150');
            }
        }
    }

    public function ukloni($pacijent_id) {
        $pacijent = PacijentModel::getById($pacijent_id);
        $this->setData('pacijent', $pacijent);
        $this->setData('naslov', 'Ukloni pacijenta');

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = PacijentModel::ukloni($pacijent_id);
                if ($res) {
                    Misc::redirect('pacijenti/');
                } else {
                    $this->setData('poruka', "Pacijent nije uklonjen!");
                }
            }
        }
    }

    public function izmeni($pacijent_id) {
        $pacijent = PacijentModel::getById($pacijent_id);
        $this->setData('pacijent', $pacijent);
        $k = false;
        $this->setData('naslov', 'Izmena pacijenta');
        if ($_POST) {
            $ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
            $prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $jmbg = filter_input(INPUT_POST, 'jmbg', FILTER_SANITIZE_STRING);
            $datum_rodjenja = filter_input(INPUT_POST, 'datum_rodjenja');
            $telefon = filter_input(INPUT_POST, 'telefon', FILTER_SANITIZE_STRING);
            $alergije = filter_input(INPUT_POST, 'alergije', FILTER_SANITIZE_STRING);
            $kategorija = filter_input(INPUT_POST, 'kategorija', FILTER_SANITIZE_STRING);
            $zubar_id = Session::get('zubar_id');
            if ($kategorija == 'odrasli' or $kategorija == 'dete' or $kategorija == 'penzioner' or $kategorija == 'student') {
                $k = true;
            }

            if (preg_match('/^[A-Z][a-z]+/', $ime) == 1 and preg_match('/^[A-Z][a-z]+(-[A-Z][a-z]+)*/', $prezime) == 1
                    and preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $email) == 1
                    and preg_match('/^[0-9]{13}/', $jmbg) == 1
                    and preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $datum_rodjenja) == 1
                    and preg_match('/^[0-9]*$/', $telefon) == 1
                    and preg_match('/^([A-Za-z]+)$/', $alergije) == 1
                    and $k == true) {

                $res = PacijentModel::izmeni($pacijent_id, $ime, $prezime, $email, $jmbg, $datum_rodjenja, $telefon, $alergije, $kategorija, $zubar_id);
                if ($res) {
                    Misc::redirect('pacijenti/');
                } else {
                    $this->setData('poruka', "Doslo je do greske. Podaci o pacijentu nisu izmenjeni!");
                }
            } else {
                $this->setData('poruka', "Unesite ispravne podatke!");
            }
        }
    }

}
