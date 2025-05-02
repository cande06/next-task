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
        return view('layouts/header_view') . view('login') . view('layouts/footer_view');
    }


}