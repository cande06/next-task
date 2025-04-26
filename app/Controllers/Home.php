<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layouts/headerView') . view('layouts/view') . view('layouts/footerView');
    }
}