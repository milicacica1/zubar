<?php

class MainController extends Controller {

    public function login() {
        if (!empty($_POST)) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            if (preg_match('/^[a-z]{4,}$/', $username) and preg_match('/^.{6,}$/', $password)) {
                $hash = hash('sha512', $password . Configuration::USER_SALT);
                //unset($password);

                $user = UserModel::getByUsernameAndPasswordHash($username, $hash);
                //unset($hash);

                if ($user) {
                    Session::set('zubar_id', $user->zubar_id);
                    Session::set('username', $username);
                    Session::set('ip', filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_FLAG_IPV4));
                    Session::set('user_agent', filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING));
                    $uspela = UspelaPrijavaModel::addUspela($user->zubar_id, date("Y-m-d H:i:s"), filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_FLAG_IPV4), filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_STRING));

                    if($uspela){
                       Misc::redirect('usluge'); 
                    }else{
                        $this->setData('message', 'Prijava nije evidentirana');
                    }
                    
                } else {
                    $this->setData('message', 'Nisu dobri login parametri.');
                    $neuspela = NeuspelaPrijavaModel::addNeuspela(date("Y-m-d H:i:s"), $username);
                    sleep(1);
                }
            } else {
                $this->setData('message', 'Nisu dobri login parametri.');
                $neuspela = NeuspelaPrijavaModel::addNeuspela(date("Y-m-d H:i:s"), $username);
                sleep(1);
            }
        }
    }

    public function logout() {
        Session::end();
        Misc::redirect('login');
    }

}
