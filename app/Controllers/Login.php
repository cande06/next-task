<?php

namespace App\Controllers;

helper('form');

class Login extends BaseController
{
    // public function __construct()
    // {
    //     helper('form');
    // }

    // public function login()
    // {
    //     return view('myform');
    // }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            // valida los datos ingresados
            $validation = service('validation');
            $validation->setRules(
                [
                    'email' => 'required|valid_email',
                    'password' => 'required|min_length[6]',
                ],
                [
                    'email' => [
                        'required' => 'Este campo es obligatorio',
                        'valid_email' => 'El correo no es valido'
                    ],
                    'password' => [
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
            return view('main_view');
        }
    }
}
