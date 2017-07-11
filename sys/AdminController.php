<?php

class AdminController extends Controller {

    public final function __pre() {
        if (!Session::exists('zubar_id')) {
            Misc::redirect('logout');
        }
    }
    public final function __preAdmin() {
        if (!Session::exists('admin_id')) {
            Misc::redirect('adminlogout');
        }
    }
}