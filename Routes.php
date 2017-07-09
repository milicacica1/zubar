<?php
    return [
        [
            'Pattern'    => '|^login/?$|',
            'Controller' => 'Main',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^logout/?$|',
            'Controller' => 'Main',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^usluge/?$|',
            'Controller' => 'Sadrzaj', 
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^usluge/prikaziPoKategoriji/([0-9]+)/?$|',
            'Controller' => 'Sadrzaj',
            'Method'     => 'prikaziPoKategoriji'
        ],
        [
            'Pattern'    => '|^usluga/izmeni/([0-9]+)/?$|',
            'Controller' => 'Sadrzaj',
            'Method'     => 'izmeni'
        ],
        [
            'Pattern'    => '|^usluga/ukloni/([0-9]+)/?$|',
            'Controller' => 'Sadrzaj',
            'Method'     => 'ukloni'
        ],
        [
            'Pattern'    => '|^usluga/dodaj/?$|',
            'Controller' => 'Sadrzaj',
            'Method'     => 'dodaj'
        ],
        [
            'Pattern'    => '|^pacijenti/?$|',
            'Controller' => 'Pacijent',
            'Method'     => 'index'
        ]
        ,
//        [
//            'Pattern'    => '|^intervencija/?$|',
//            'Controller' => 'Pregled',
//            'Method'     => 'index'
//        ]
//        ,
        [
            'Pattern'    => '|^pacijent/dodaj/?$|',
            'Controller' => 'Pacijent',
            'Method'     => 'dodaj'
        ],
        [
            'Pattern'    => '|^pacijent/ukloni/([0-9]+)/?$|',
            'Controller' => 'Pacijent',
            'Method'     => 'ukloni'
        ],
        [
            'Pattern'    => '|^pacijent/izmeni/([0-9]+)/?$|',
            'Controller' => 'Pacijent',
            'Method'     => 'izmeni'
        ],
//        [
//            'Pattern'    => '|^zubi/([0-9]+)/?$|',
//            'Controller' => 'Pregled',
//            'Method'     => 'zubi'
//        ]
//        ,
        [
            'Pattern'    => '|^pregled/([0-9]+)/?$|',
            'Controller' => 'Pregled',
            'Method'     => 'pregledajPacijenta'
        ]
        ,
        [
            'Pattern'    => '|^admin/?$|',
            'Controller' => 'AdminLogin',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^adminlogin/?$|',
            'Controller' => 'AdminMain',
            'Method'     => 'login'
        ],
        [
            'Pattern'    => '|^adminlogout/?$|',
            'Controller' => 'AdminMain',
            'Method'     => 'logout'
        ],
        [
            'Pattern'    => '|^admin/dodaj/?$|',
            'Controller' => 'AdminLogin',
            'Method'     => 'dodaj'
        ],
        [
            'Pattern'    => '|^admin/ukloni/([0-9]+)/?$|',
            'Controller' => 'AdminLogin',
            'Method'     => 'ukloni'
        ],
        [
            'Pattern'    => '|^admin/izmeni/([0-9]+)/?$|',
            'Controller' => 'AdminLogin',
            'Method'     => 'izmeni'
        ],
        [
            'Pattern'    => '|^admin/uspele/?$|',
            'Controller' => 'AdminLogin',
            'Method'     => 'uspele'
        ],
        [
            'Pattern'    => '|^admin/neuspele/?$|',
            'Controller' => 'AdminLogin',
            'Method'     => 'neuspele'
        ],
        [
            'Pattern'    => '|^kategorije/?$|',
            'Controller' => 'Kategorija',
            'Method'     => 'index'
        ],
        [
            'Pattern'    => '|^kategorija/dodaj/?$|',
            'Controller' => 'Kategorija',
            'Method'     => 'dodaj'
        ],
        [
            'Pattern'    => '|^kategorija/ukloni/([0-9]+)/?$|',
            'Controller' => 'Kategorija',
            'Method'     => 'ukloni'
        ],
        [
            'Pattern'    => '|^kategorija/izmeni/([0-9]+)/?$|',
            'Controller' => 'Kategorija',
            'Method'     => 'izmeni'
        ],
//        ,
//        [
//            'Pattern'    => '|^pacijenti/?$|',
//            'Controller' => 'Pregled',
//            'Method'     => 'index'
//        ],
        
//        [
//            'Pattern'    => '|^pacijenti/([0-9]+)/?$|',
//            'Controller' => 'Pregled',
//            'Method'     => 'index'
//        ],
//        [
//            'Pattern'    => '|^dodavanje/?$|',
//            'Controller' => 'Sadrzaj',
//            'Method'     => 'dodaj'
//        ],
        
        [
            'Pattern'    => '|^.*$|',
            'Controller' => 'Main',
            'Method'     => 'login'
        ]
    ];