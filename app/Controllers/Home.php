<?php

namespace App\Controllers;

class Home extends BaseController{
    public function index(): string{
        return view('layouts/header_view')
                . view('layouts/menu_view') 
                . view('layouts/main_view') 
                . view('layouts/footer_view');
    }

    function getLogin(){
        $data = [ 'flag' => 1,
                    'opt' => 'Iniciar sesion',];
        return view('layouts/header_view', $data) . view('start', $data) . view('layouts/footer_view');
    }
    function getSignup(){
        $data = ['flag' => 0,
                    'opt' => 'Registrarse',];
        return view('layouts/header_view', $data) . view('start', $data) . view('layouts/footer_view');
    }

}