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
        $data = [ 'title' => 'Iniciar sesion',];
        return view('layouts/header_view', $data) . view('login', $data) . view('layouts/footer_view');
    }
    function getSignup(){
        $data = [ 'title' => 'Registrarse'];
        return view('layouts/header_view', $data) . view('signup', $data) . view('layouts/footer_view');
    }

}