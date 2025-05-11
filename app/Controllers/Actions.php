<?php

namespace App\Controllers;

class Actions extends BaseController
{
    // public function __construct()
    // {
    //     helper('form');
    // }

    public function signup()
    {
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

        return redirect()->to('login');

    }

    public function login()
    {
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
                'idUser' => $user['id'],
                'nick' => $user['nickname'],
                'email' => $user['email'],
                'logged' => true,
            ]);

            return redirect()->to('home');
        } else {
            return redirect()->back()->with('errors', ['loginPass' => 'Correo o contraseña incorrectos.']);
        }
    }

    public function createTask(){
        $validation = service('validation');
        $validation->setRules(
            [
                'taskTitle' => 'required|alpha_numeric_punct',
                'taskDesc' => 'required|alpha_numeric_punct',
                // 'taskCollab' => 'valid_email',
                // 'taskReminder' => 'valid_date',
            ],
            [
                'taskTitle' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'taskDesc' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                // 'taskCollab' => [
                //     'valid_email' => 'El correo no es válido',
                // ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                            ->withInput()
                            ->with('modalTarget', 'modalNewTask')
                            ->with('errors', $validation->getErrors());
        }

        // $session = session();
        $data = array(
            'title' => $this->request->getPost('taskTitle'),
            // 'idUser' => $session->('idUser'),
            'description' => $this->request->getPost('taskDesc'),
            'priority' => $this->request->getPost('taskPriority'),
            'exp_date' => $this->request->getPost('taskDate'),
            'reminder' => $this->request->getPost('taskReminder'),
            'color' => $this->request->getPost('taskColor'),
        );

        $model = new \App\Models\TaskModel();
        $model->insert($data);

        return redirect()->to('home');
    }

    public function editTask(){
        $validation = service('validation');
        $validation->setRules(
            [
                'taskTitleEdit' => 'required|alpha_numeric_punct',
                'taskDescEdit' => 'required|alpha_numeric_punct',
                // 'taskReminder' => 'valid_date',
            ],
            [
                'taskTitleEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'taskDescEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
            ]
        );

        $taskID = $this->request->getPost('taskID');

        if (!$validation->withRequest($this->request)->run()) {
            $target = 'modalEditTask' . $taskID; 
            return redirect()->back()
                            ->withInput()
                            ->with('modalTarget', $target)
                            ->with('errors', $validation->getErrors());
        }

        //format priority
        switch ($this->request->getPost('taskPriorityEdit')) {
            case 'Baja':
                $pr = -1;
                break;
            case 'Normal':
                $pr = 0;
                break;
            case 'Alta':
                $pr = 1;
                break;
        }

        // $session = session();
        $data = array(
            'title' => $this->request->getPost('taskTitleEdit'),
            // 'idUser' => $session->('idUser'),
            'description' => $this->request->getPost('taskDescEdit'),
            'priority' => $pr ,
            'exp_date' => $this->request->getPost('taskDateEdit'),
            'reminder' => $this->request->getPost('taskReminderEdit'),
            'color' => $this->request->getPost('taskColor'),
        );

        $model = new \App\Models\TaskModel();
        $model->where('id', $taskID)->set($data)->update();

        return redirect()->to('home');

    }

    public function deleteTask(){
        $taskID = $this->request->getPost('taskID');
        $model = new \App\Models\TaskModel();
        $model->where('id', $taskID)->delete();

        return redirect()->to('home');
    }

    public function createSubtask(){
        $validation = service('validation');
        $validation->setRules(
            [
                'subtaskTitle' => 'required|alpha_numeric_punct',
                'subtaskDesc' => 'required|alpha_numeric_punct',
                'subtaskResp' => 'required|valid_email',
                // 'taskReminder' => 'valid_date',
            ],
            [
                'subtaskTitle' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'subtaskDesc' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'subtaskResp' => [
                    'required' => 'Este campo es obligatorio',
                    'valid_email' => 'El correo no es válido',
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                            ->withInput()
                            ->with('modalTarget', 'modalNewSubtask')
                            ->with('errors', $validation->getErrors());
        }

        // $session = session();
        $data = array(
            'idTask' => $this->request->getPost('taskID'),
            // 'idUser' => $session->('idUser'),
            'title' => $this->request->getPost('subtaskTitle'),
            'description' => $this->request->getPost('subtaskDesc'),
            'priority' => $this->request->getPost('subtaskPriority'),
            'exp_date' => $this->request->getPost('subtaskDate'),
            'assigned' => $this->request->getPost('subtaskResp'),
            'comment' => $this->request->getPost('subtaskComment'),
        );

        $model = new \App\Models\SubtaskModel();
        $model->insert($data);

        return redirect()->to('home');
    }

 
    
}
