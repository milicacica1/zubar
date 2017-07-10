<?php

class PregledController extends AdminController {

    public function index() {

//        $this->setData('naslov', 'Pregled');
//        $pregled = PregledModel::getAll();
//        $this->setData('pregled', $pregled);
//        $pacijent = PregledModel::getById($pacijent_id);
//        $pregledi = PregledModel::getAllUsluge();
//        $this->setData('pregledi', $pregledi);
//        $this->setData('pacijent', $pacijent);
    }

    public function pregledajPacijenta($pacijent_id) {
        $pacijent = PacijentModel::getById($pacijent_id);
        $this->setData('pacijent', $pacijent);
        $this->setData('naslov', 'Pregled');

        $pregledi = PregledModel::getAllUsluge();
        $this->setData('pregledi', $pregledi);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
        $istorija = PregledModel::istorijaPacijenta($pacijent_id);
        $this->setData('istorija', $istorija);
//        $pregled = PregledModel::setZubi($j);
//        $this->setData('pregled', $pregled);
    }

    public function istorijaPacijenta($pacijent_id) {
        $pacijent = PregledModel::getById($pacijent_id);
        $this->setData('pacijent', $pacijent);
        $this->setData('naslov', 'Pregled');

        $pregledi = PregledModel::getAllUsluge();
        $this->setData('pregledi', $pregledi);
        $listaKategorija = SadrzajModel::getCategory();
        $this->setData('kategorija', $listaKategorija);
//        $pregled = PregledModel::setZubi($j);
//        $this->setData('pregled', $pregled);
    }
    public function intervencije() {
        $zubar_id = Session::get('zubar_id');
        $intervencije = PregledModel::getAllByZybarID($zubar_id);
        $this->setData('intervencije', $intervencije);
        $this->setData('naslov', 'Sve intervencije');
    }

    public function racun($pacijent_id) {
        $pacijent = PacijentModel::getById($pacijent_id);
        $kategorija = PacijentModel::getKategorijaPacijentaById($pacijent_id);

        $this->setData('kategorija', $kategorija);
        $this->setData('pacijent', $pacijent);
        $zubar_id = Session::get('zubar_id');
        $this->setData('naslov', 'Racun');
        $usluge = array();
        $zubi = array();
        if ($_POST['check_List']) {
            $p = $_POST['check_List'];
            foreach ($p as $pp):
                list($zub, $usluga_id) = explode('_', $pp);
                $res = PregledModel::dodajIntervenciju($pacijent_id, $zubar_id, $usluga_id, $zub);
                $u = SadrzajModel::getById($usluga_id);
                array_push($usluge, $u);
                array_push($zubi, $zub);
            endforeach;
        }else{
            Misc::redirect('pregled/' . $pacijent_id);
        }
        $this->setData('zubi', $zubi);
        $this->setData('usluge', $usluge);
        $intervencije = PregledModel::intervencijaPacijenta($pacijent_id);
        $this->setData('intervencije', $intervencije);
        if ($kategorija == 'odrasli') {
            $i = 0;
            foreach ($usluge as $usluga):
                $i += $usluga->cena;
            endforeach;
            $this->setData('ukupno', $i);
        }else {
            $i = 0;
            foreach ($usluge as $usluga):
                $i += $usluga->cena_sa_popustom;
            endforeach;
            $this->setData('ukupno', $i);
        }
    }

    public function izvrsi($pacijent_id) {
        $this->setData('pacijent', $pacijent_id);

        $usluge = array();
        if (!isset($_POST['check_list'])) {
            $this->setData('bla', $usluge);
        } else {

            foreach ($_POST['check_list'] as $checkbox) :
                array_push($usluge, $checkbox);

            endforeach;
            $pregledi = SadrzajModel::getAllWithCat();
            $this->setData('pregledi', $pregledi);
            $this->setData('bla', $usluge);
        }
    }

}
