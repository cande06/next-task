<?php

namespace App\Controllers;

class Views extends BaseController{
    public function index(): string{
        $data = [ 'title' => 'Inicio'];
        return view('Layouts/header_view', $data)
                . view('Layouts/menu_view') 
                . view('Home/home') 
                . view('Layouts/footer_view');
    }

    function getLogin(){
        $data = [ 'title' => 'Iniciar sesion',];
        return view('Layouts/header_view', $data) . view('login', $data) . view('Layouts/footer_view');
    }
    function getSignup(){
        $data = [ 'title' => 'Registrarse'];
        return view('Layouts/header_view', $data) . view('signup', $data) . view('Layouts/footer_view');
    }

}