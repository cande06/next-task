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
                'signupNickname' => 'required|min_length[2]|max_length[10]', //alpha
                'signupEmail' => 'required|valid_email|is_unique[user.email]',
                'signupPass' => 'required|min_length[6]',
                'signupPass2' => 'matches[signupPass]',
            ],
            [
                'signupNickname' => [
                    'required' => 'Este campo es obligatorio',
                    'min_length' => 'Debe tener mínimo 2 caracteres',
                    'max_length' => 'Debe tener máximo 10 caracteres'
                ],
                'signupEmail' => [
                    'required' => 'Este campo es obligatorio',
                    'valid_email' => 'El correo no es válido. Intentalo nuevamente.',
                    'is_unique' => 'Este correo ya se encuentra en uso'
                ],
                'signupPass' => [
                    'required' => 'Este campo es obligatorio',
                    'min_length' => 'Debe tener mínimo seis caracteres'
                ],
                'signupPass2' => [
                    'required' => 'Este campo es obligatorio',
                    'matches' => 'Las contraseñas no coinciden'
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = array(
            'nickname' => $this->request->getPost('signupNickname'),
            'email' => $this->request->getPost('signupEmail'),
            'password' => password_hash($this->request->getPost('signupPass'), PASSWORD_DEFAULT)
        );

        $model = new \App\Models\UserModel();
        $model->insert($data);

        // $vista = ['title' => 'Tareas',];
        // return view('layouts/header_view', $vista)
        //     . view('layouts/menu_view')
        //     . view('layouts/main_view')
        //     . view('layouts/footer_view');

        redirect('login');
        // $this->load->view('login');

    }

    public function login()
    {
        // valida los datos ingresados
        $validation = service('validation');
        $validation->setRules(
            [
                'loginEmail' => 'required|valid_email',
                'loginPass' => 'required', //|min_length[6]
            ],
            [
                'loginEmail' => [
                    'required' => 'Este campo es obligatorio',
                    'valid_email' => 'El correo no es valido'
                ],
                'loginPass' => [
                    'required' => 'Este campo es obligatorio',
                    // 'min_length' => 'Mínimo seis caracteres'
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $email = $this->request->getPost('loginEmail');
        $password = $this->request->getPost('loginPass');

        $model = new \App\Models\UserModel();
        $user = $model->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session = session();
            $session->set([
                'id' => $user['id'],
                'nick' => $user['nickname'],
                'email' => $user['email'],
                'logged' => true,
            ]);
        } else {
            return redirect()->back()->with('errors', ['loginPass' => 'Correo o contrase;a no valido.']);
        }
    }
}
