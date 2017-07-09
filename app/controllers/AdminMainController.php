<?php

class AdminMainController extends Controller {

    public function logout() {
        Session::end();
        Misc::redirect('adminlogin');
    }

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
