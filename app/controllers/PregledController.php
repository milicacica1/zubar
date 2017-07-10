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
    public function racun($pacijent_id) {
        $pacijent = PacijentModel::getById($pacijent_id);
        $this->setData('pacijent', $pacijent);
        $zubar_id = Session::get('zubar_id');
        $this->setData('naslov', 'Racun');
        if($_POST){
            $p = $_POST['check_List'];
            foreach ($p as $pp):
               list($zub, $usluga_id) = explode('_' , $pp );
               $res = PregledModel::dodajIntervenciju($pacijent_id, $zubar_id, $usluga_id, $zub);
            endforeach;
        }
        $intervencije = PregledModel::intervencijaPacijenta($pacijent_id);
        $this->setData('intervencije', $intervencije);
        $i = 0;
        foreach ($intervencije as $ist):
            $i += $ist->cena;
        endforeach;
        $this->setData('ukupno', $i);
    }
    public function ukloni($pacijent_id) {
//        $intervencije = PregledModel::getById($pacijent_id);
//        $this->setData('intervencije', $intervencije);
        var_dump($_POST);
        exit();
        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = PregledModel::ukloni($pacijent_id);
                var_dump($res);
                exit();
                if ($res) {
                    Misc::redirect('usluge');
                } else {
                    $this->setData('poruka', "Pacijent nije uklonjen!");
                }
            }
        }
    }
    
    
}

