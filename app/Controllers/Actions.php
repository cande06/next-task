<?php

namespace App\Controllers;

class Actions extends BaseController
{
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
                'loginPass' => 'required|min_length[6]',
            ],
            [
                'loginEmail' => [
                    'required' => 'Este campo es obligatorio.',
                    'valid_email' => 'El correo no es valido.'
                ],
                'loginPass' => [
                    'required' => 'Este campo es obligatorio.',
                    'min_length' => 'Contraseña inválida. Intentelo nuevamente.'
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

    public function signOut()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('login');
    }
    
    public function createTask()
    {
        $validation = service('validation');
        $validation->setRules(
            [
                'taskTitle' => 'required|alpha_numeric_punct',
                'taskDesc' => 'required',
                'taskDate' => 'permit_empty|valid_date[Y-m-d]',
                'taskReminder' => 'permit_empty|valid_date[Y-m-d]',
            ],
            [
                'taskTitle' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'taskDesc' => [
                    'required' => 'Este campo es obligatorio',
                ],
                'taskDate' => [
                    'valid_date' => 'Fecha no válida',
                ],
                'taskReminder' => [
                    'valid_date' => 'Fecha no válida',
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', 'modalNewTask')
                ->with('errors', $validation->getErrors());
        }

        $fechaVencimiento = $this->request->getPost('taskDate');
        $fechaRecordatorio = $this->request->getPost('taskReminder');
        $errors = [];

        // Convertir fechas a objetos DateTime
        $fv = $fechaVencimiento ? new \DateTime($fechaVencimiento) : null;
        $fr = $fechaRecordatorio ? new \DateTime($fechaRecordatorio) : null;
        $hoy = new \DateTime('today');

        // Validar que recordatorio no sea después del vencimiento
        if ($fv && $fr && $fr > $fv) {
            $errors['taskReminder'] = 'El recordatorio no puede ser posterior al vencimiento.';
        }
        // Validar que ninguna fecha sea anterior a hoy
        if ($fv && $fv < $hoy) {
            $errors['taskDate'] = 'La fecha de vencimiento no puede ser anterior a hoy.';
        }
        if ($fr && $fr < $hoy) {
            $errors['taskReminder'] = 'La fecha de recordatorio no puede ser anterior a hoy.';
        }

        if (!empty($errors)) {
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', 'modalNewTask')
                ->with('errors', $errors);
        }


        $session = session();
        $data = array(
            'title' => $this->request->getPost('taskTitle'),
            'idUser' => $session->get('idUser'),
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

    public function editTask()
    {
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
            'priority' => $pr,
            'exp_date' => $this->request->getPost('taskDateEdit'),
            'reminder' => $this->request->getPost('taskReminderEdit'),
            'color' => $this->request->getPost('taskColor'),
        );

        $model = new \App\Models\TaskModel();
        $model->where('id', $taskID)->set($data)->update();

        return redirect()->to('tarea/' . $taskID);
    }

    public function deleteTask()
    {
        $taskID = $this->request->getPost('taskID');
        $model = new \App\Models\TaskModel();
        $model->where('id', $taskID)->delete();

        return redirect()->to('home');
    }

    public function archiveTask($id){
        
        $model = new \App\Models\TaskModel();
        $model->where('id', $id)->set(['archived'=> 1])->update();

        return redirect()->to('home');
    }

    public function changeStatus()
    {
        $taskID = $this->request->getPost('taskID');
        $status = $this->request->getPost('taskStatus');

        //format status
            switch ($status) {
                case 'Completada':
                    $status = -1;
                    break;
                case 'Creada':
                    $status = 0;
                    break;
                case 'En Proceso':
                    $status = 1;
                    break;
            }
            
        $model = new \App\Models\TaskModel();
        $model->where('id', $taskID)->set(['status'=> $status])->update();

        return redirect()->back();
    }

    public function createSubtask()
    {
        $validation = service('validation');
        $validation->setRules(
            [
                'subtaskTitle' => 'required|alpha_numeric_punct',
                'subtaskDesc' => 'required',
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

        //format priority
        switch ($this->request->getPost('subtaskPriority')) {
            case 'Baja':
                $pr = 1;
                break;
            case 'Normal':
                $pr = 1;
                break;
            case 'Alta':
                $pr = 2;
                break;
        }

        $taskID = $this->request->getPost('taskID');
        // $session = session();
        $data = array(
            'idTask' => $taskID,
            // 'idUser' => $session->('idUser'),
            'title' => $this->request->getPost('subtaskTitle'),
            'description' => $this->request->getPost('subtaskDesc'),
            'priority' => $pr,
            'exp_date' => $this->request->getPost('subtaskDate'),
            'assigned' => $this->request->getPost('subtaskResp'),
            'comment' => $this->request->getPost('subtaskComment'),
        );

        $model = new \App\Models\SubtaskModel();
        $model->insert($data);

        return redirect()->to('tarea/' . $taskID);
    }

    public function editSubtask()
    {
        $validation = service('validation');
        $validation->setRules(
            [
                'subtaskTitleEdit' => 'required|alpha_numeric_punct',
                'subtaskDescEdit' => 'required',
                // 'taskReminder' => 'valid_date',
            ],
            [
                'subtaskTitleEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'subtaskDescEdit' => [
                    'required' => 'Este campo es obligatorio',
                ],
            ]
        );

        $id = $this->request->getPost('subtaskID');

        if (!$validation->withRequest($this->request)->run()) {
            $target = 'modalEditSubtask' . $id;
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', $target)
                ->with('errors', $validation->getErrors());
        }

        //format priority
        switch ($this->request->getPost('subtaskPriorityEdit')) {
            case 'Baja':
                $pr = 1;
                break;
            case 'Normal':
                $pr = 2;
                break;
            case 'Alta':
                $pr = 3;
                break;
            default: $pr = 0;
        }

        $taskID = $this->request->getPost('idTask');

        $data = array(
            'idTask' => $taskID,
            // 'idAuthor' => $this->request->getPost('idAuthor'),
            'title' => $this->request->getPost('subtaskTitleEdit'),
            'description' => $this->request->getPost('subtaskDescEdit'),
            'priority' => $pr,
            'exp_date' => $this->request->getPost('subtaskDateEdit'),
            'assigned' => $this->request->getPost('subtaskRespEdit'),
            'comment' => $this->request->getPost('subtaskCommentEdit'),
        );

        $model = new \App\Models\SubtaskModel();
        $model->where('id', $id)->set($data)->update();

        return redirect()->to('tarea/' . $taskID);
    }

    public function deleteSubtask()
    {
        $id = $this->request->getPost('subtaskID');
        $model = new \App\Models\SubtaskModel();
        $model->where('id', $id)->delete();

        return redirect()->back();
    }
}
