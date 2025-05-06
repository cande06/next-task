<?php

namespace App\Controllers;

class Views extends BaseController{
    public function index(): string{
        $data = [ 'title' => 'Inicio'];
        return view('layouts/header_view', $data)
                . view('layouts/menu_view') 
                . view('home') 
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