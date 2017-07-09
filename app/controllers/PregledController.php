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
        $pacijent = PregledModel::getById($pacijent_id);
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
    
}

