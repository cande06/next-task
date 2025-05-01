<?php

namespace App\Controllers;

class Home extends BaseController{
    public function index(): string{
        return view('layouts/headerView') . view('layouts/vista') . view('layouts/footerView');
    }

    function getLogin(){
        return view('layouts/headerView') . view('login') . view('layouts/footerView');
    }


}