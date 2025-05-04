<?php

namespace App\Controllers;

class Actions extends BaseController
{
    public function __construct()
    {
        helper('form');
    }

    public function signup()
    {
        // valida los datos ingresados
        $validation = service('validation');
        $validation->setRules(
            [
                'signNickname' => 'required|min_length[2]|max_length[10]', //alpha
                'signEmail' => 'required|valid_email',
                'signPass' => 'required|min_length[6]',
                'signPass2' => 'matches[signPass]',
            ],
            [
                'signNickname' => [
                    'required' => 'Este campo es obligatorio',
                    'min_length' => 'Debe tener mínimo 2 caracteres',
                    'max_length' => 'Debe tener máximo 10 caracteres'
                ],
                'signEmail' => [
                    'required' => 'Este campo es obligatorio',
                    'valid_email' => 'El correo no es válido. Intentalo nuevamente.'
                ],
                'signPass' => [
                    'required' => 'Este campo es obligatorio',
                    'min_length' => 'Debe tener mínimo seis caracteres'
                ],
                'signPass2' => [
                    'required' => 'Este campo es obligatorio',
                    'matches' => 'Las contraseñas no coinciden'
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // $data = array(
        //     'email' => $this->request->getPost('email'),
        //     'password' => $this->request->getPost('password')
        // );

        $data = ['title' => 'Tareas',];
        return view('layouts/header_view', $data)
            . view('layouts/menu_view')
            . view('layouts/main_view')
            . view('layouts/footer_view');
    }

    public function login()
    {
        // valida los datos ingresados
        $validation = service('validation');
        $validation->setRules(
            [
                'loginEmail' => 'required|valid_email',
                'loginPass' => 'required|min_length[6]',
            ],
            [
                'loginEmail' => [
                    'required' => 'Este campo es obligatorio',
                    'valid_email' => 'El correo no es valido'
                ],
                'loginPass' => [
                    'required' => 'Este campo es obligatorio',
                    'min_length' => 'Mínimo seis caracteres'
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // $data = array(
        //     'email' => $this->request->getPost('email'),
        //     'password' => $this->request->getPost('password')
        // );

        $data = ['title' => 'Tareas',];
        return view('layouts/header_view', $data)
            . view('layouts/menu_view')
            . view('layouts/main_view')
            . view('layouts/footer_view');
    }

    
}
