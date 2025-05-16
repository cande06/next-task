<?php

namespace App\Controllers;

use App\Models\UserModel;

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
                'taskDescEdit' => 'required',
                // 'taskReminder' => 'valid_date',
            ],
            [
                'taskTitleEdit' => [
                    'required' => 'Este campo es obligatorio',
                    'alpha_numeric_punct' => 'Sólo puedes utilizar estos caracteres: - _ ! # * $ % & + = : . ~ |',
                ],
                'taskDescEdit' => [
                    'required' => 'Este campo es obligatorio',
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
        //format dates
        $expdate = $this->request->getPost('taskDateEdit');
        if (empty($expdate)){
            $expdate = null;
        }
        $rdate = $this->request->getPost('taskReminderEdit');
        if (empty($rdate)){
            $rdate = null;
        }

        $data = array(
            'title' => $this->request->getPost('taskTitleEdit'),
            'description' => $this->request->getPost('taskDescEdit'),
            'priority' => $pr,
            'exp_date' => $expdate,
            'reminder' => $rdate,
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

    public function archiveTask($id)
    {

        $model = new \App\Models\TaskModel();
        $model->where('id', $id)->set(['archived' => 1])->update();

        return redirect()->to('home');
    }

    public function changeTaskStatus($idTask)
    {
        $status = $this->request->getPost('taskStatus');

        //format status
        switch ($status) {
            case 'Completada':
                $status = 2;
                break;
            case 'Creada':
                $status = 0;
                break;
            case 'En Proceso':
                $status = 1;
                break;
        }

        $model = new \App\Models\TaskModel();
        $model->where('id', $idTask)->set(['status' => $status])->update();

        return redirect()->back();
    }



    public function createSubtask()
    {
        $validation = service('validation');
        $validation->setRules(
            [
                'subtaskTitle' => 'required|alpha_numeric_punct',
                'subtaskDesc' => 'required',
                'subtaskResp' => 'permit_empty|valid_email',
                'subtaskRespCheck' => 'permit_empty|required_without[subtaskResp]|in_list[1]',
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
                    'valid_email' => 'El correo no es válido',
                ],
                'subtaskRespCheck' => [
                    'required_without' => 'Debe asignar a un responsable',
                    'in_list' => 'Debe asignar a un responsable',
                ],
            ]
        );

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', 'modalNewSubtask')
                ->with('errors', $validation->getErrors());
        }

        $taskID = $this->request->getPost('taskID');
        $userID = session()->get('idUser');

        //format priority
        switch ($this->request->getPost('subtaskPriority')) {
            case 'Baja':
                $pr = 1;
                break;
            case 'Normal':
                $pr = 2;
                break;
            case 'Alta':
                $pr = 3;
                break;
            default:
                $pr = 0;
        }
        // define email
        $emailResp = $this->request->getPost('subtaskResp');
        if ($emailResp != '') {
            $email = $emailResp;
        } else if ($emailResp == '' && $this->request->getPost('subtaskRespCheck') == 1) {
            $uModel = new \App\Models\UserModel();
            $user = $uModel->find($userID);

            $email = $user['email'];
        } else {
            $email = 'error x_x';
        }

        $data = array(
            'idTask' => $taskID,
            'idAuthor' => $userID,
            'title' => $this->request->getPost('subtaskTitle'),
            'description' => $this->request->getPost('subtaskDesc'),
            'priority' => $pr,
            'exp_date' => $this->request->getPost('subtaskDate'),
            'assigned' => $email,
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
            default:
                $pr = 0;
        }
        //format dates
        $expdate = $this->request->getPost('subtaskDateEdit');
        if (empty($expdate)){
            $expdate = null;
        }

        $taskID = $this->request->getPost('idTask');

        $data = array(
            'idTask' => $taskID,
            // 'idAuthor' => $this->request->getPost('idAuthor'),
            'title' => $this->request->getPost('subtaskTitleEdit'),
            'description' => $this->request->getPost('subtaskDescEdit'),
            'priority' => $pr,
            'exp_date' => $expdate,
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

    public function changeSubtaskStatus($idSub, $idTask)
    {
        $status = $this->request->getPost('subtaskStatus');

        //format status
        switch ($status) {
            case 'Completada':
                $status = 2;
                break;
            case 'Creada':
                $status = 0;
                break;
            case 'En proceso':
                $status = 1;
                break;
        }

        $sModel = new \App\Models\SubtaskModel();
        $sModel->where('id', $idSub)->set(['status' => $status])->update();

        
        return redirect()->to('updT/'. $status . '/' . $idTask);
    }



    public function setCompletedTask($status, $idTask){
        
        $sModel = new \App\Models\SubtaskModel();
        $finished = $sModel->where(['idTask' => $idTask, 'status' => 2])->countAllResults();
        $total =  $sModel->where('idTask', $idTask)->countAllResults();

        $tModel = new \App\Models\TaskModel();
        $task = $tModel->find($idTask);
        $check = '';

        // all sbtks completadas
        if ($finished == $total) { // && $total > 0
            $check = $tModel->where('id', $idTask)->set(['status' => 2])->update(); // = completada
        }
        // 1 sbtk completada
        if (($status == 2) && ($task['status'] == 0)) {
            $tModel->where('id', $idTask)->set(['status' => 1])->update(); // = en proceso
        }

        // esto va en crear sbt
        // else if (($finished != $total) && ($task['status'] == 2)) {  //se agrega un sbt despues de terminar todos
        //     $tModel->where('id', $idTask)->set(['status' => 1])->update(); // = en proceso
        // }

        // log_message('debug', "finished: {$finished}, total: {$total}, check: {$check} ");
            return redirect()->to('tarea/' . $idTask);
    }



    public function sendCollab($idTask)
    {
        $correo = $this->request->getPost('collabMail');
        $opt = $this->request->getPost('collabOpt');

        $opt = ($opt == 'm') ? 'full' : 'read';

        $model = new \App\Models\TaskModel();
        $task = $model->where('id', $idTask)->first();


        $email = \Config\Services::email();
        $email->setFrom('nexttask.service@gmail.com', 'Next Task: Administrador de Tareas');
        $email->setTo($correo);

        $email->setSubject('Invitación a colaborar en una tarea');
        $body = '<h4> Has sido invitado a colaborar en una tarea:</h4>';
        $body .= '<p>'. $task['title'] .'</p> ';
        $body .= '<p><a href="' . base_url('colaboracion/' . $idTask . '/' . $opt) . '">Aceptar invitación</a></p>';

        $email->setMessage($body);


        if ($email->send()) {
            return redirect()->to('tarea/'. $idTask);
        } else {
            return redirect()->back()
                ->withInput()
                ->with('modalTarget', 'modalCollabFor'. $idTask)
                ->with('errors', 'Ha ocurrido un error inesperado');
        
            // echo $email->printDebugger(['headers']);
        }
    }

    public function procesarCollab($idTask, $opt){
        $userActive = session('idUser'); // esto va en la funcion que recibe

        $model = new \App\Models\CollabModel();

        $c = [ 
            'idTask' => $idTask,
            'idUser' => $userActive,
            'allows' => $opt,
        ];

        $model->insert($c);

        return redirect()->to('tarea/'. $idTask);
    }
}
