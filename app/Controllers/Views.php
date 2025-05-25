<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Views extends BaseController
{
    public function index()
    {
        // // Obtener la fecha actual
        // $fechaActual = Time::now();

        // $dia = $fechaActual->getDay();
        // $mes = $fechaActual->getMonth();
        // $anio = $fechaActual->getYear();

        // $fecha = $dia . '/' . $mes . '/' . $anio;

        if (!session()->has('idUser')) {
            return redirect()->to('login');
        }

        $userID = session()->get('idUser');

        $data = ['title' => 'Inicio',]; //'date' => $fecha
        $tasks = ['tasks' => Views::getTasks($userID)];

        return view('Layouts/header', $data)
            . view('Layouts/menu')
            . view('Home/home', $tasks)
            . view('Layouts/footer');
    }

    public function getLogin()
    {
        $data = ['title' => 'Iniciar sesion',];
        return view('Layouts/header', $data) . view('login') . view('Layouts/footer');
    }
    public function getSignup()
    {
        $data = ['title' => 'Registrarse'];
        return view('Layouts/header', $data) . view('signup') . view('Layouts/footer');
    }

    public function getProfile($id){

        $model = new \App\Models\UserModel();
        $u = $model->where('id', $id)->first();

        $user = [
            'idUser' => $u['id'],
            'userNick' => $u['nickname'],
            'userEmail' => $u['email'],
            'userPassword' => $u['password'],
        ];

        $title = ['title' => 'Perfil',];

        return view('Layouts/header', $title)
            . view('Layouts/menu')
            . view('Profile/profile', $user)
            . view('Layouts/footer');
    }


    public function filter($opt)
    {
        if ($opt == 'p') {
            $value = $this->request->getPost('prioridad');

            $model = new \App\Models\TaskModel();
            $tareas = $model->where('priority', $value)
                ->where('archived !=', 1, false)
                ->findAll();

            session()->set('filtered', $tareas);
            return redirect()->to('/form/filtered/p');
        }
        else if ($opt == 'd') {
            $value = $this->request->getPost('date');

            $model = new \App\Models\TaskModel();
            $tareas = $model->where('archived !=', 1, false)
                ->where('exp_date !=', null, false)
                ->orderBy('exp_date', $value)
                ->findAll();

            session()->set('filtered', $tareas);
            return redirect()->to('/form/filtered/d');
        }
    }

    public function showFilter(){
        $tareas = session()->get('filtered');
        $colorID = '';
        $getTareas = [];
        $activeUser = session()->get('idUser');

        foreach ($tareas as $task) {
            //format color
            switch ($task['color']) {
                case '#E5ADAE':
                    $colorID = 'frut';
                    break;
                case '#BFD5A9':
                    $colorID = 'kiwi';
                    break;
                case '#EABFA0':
                    $colorID = 'mand';
                    break;
                case '#D0AFCD':
                    $colorID = 'uva';
                    break;
                case '#D8C9B4':
                    $colorID = 'coco';
                    break;
                case '#FFFFFF':
                    $colorID = 'none';
            }
            //format priority
            switch ($task['priority']) {
                case -1:
                    $task['priority'] = 'Baja';
                    break;
                case 0:
                    $task['priority'] = 'Normal';
                    break;
                case 1:
                    $task['priority'] = 'Alta';
                    break;
            }
            //format status
            switch ($task['status']) {
                case 0:
                    $task['status'] = 'Creada';
                    $statusIcon = '<i class="bi bi-clipboard2"></i>';
                    break;
                case 1:
                    $task['status'] = 'En proceso';
                    $statusIcon = '<i class="bi bi-hourglass-split"></i>';
                    break;
                case 2:
                    $task['status'] = 'Completada';
                    $statusIcon = '<i class="bi bi-check"></i></i>';
                    break;
            }

            $isOwner = ($activeUser == $task['idUser']) ? true : false;

            $data = Views::subtasksCount($task['id']);

            $newTask = [
                'taskID' => $task['id'],
                'taskUserID' => $task['idUser'],
                'taskTitle' => $task['title'],
                'taskDesc' => $task['description'],
                'taskPriority' => $task['priority'],
                'taskStatus' => $task['status'],
                'statusIcon' => $statusIcon,
                'taskDate' => $task['exp_date'],
                'taskReminder' => $task['reminder'],
                'taskColor' => $task['color'],
                'taskColorID' => $colorID,
                'taskArchived' => $task['archived'],

                'isTaskOwner' => $isOwner,
                'subtaskData' => $data,
            ];

            $getTareas[] = $newTask;
        }

        $tasks = ['tasks' => $getTareas];

        return view('Layouts/header', ['title' => 'Inicio',])
            . view('Layouts/menu')
            . view('Home/home', $tasks)
            . view('Layouts/footer');
    }


    public function getTasks($iduser)
    {
        $model = new \App\Models\TaskModel();
        $tareas = $model->where('idUser', $iduser)
            ->where('archived !=', 1, false)
            ->findAll();

        $colorID = '';
        $getTareas = [];
        $activeUser = session()->get('idUser');

        foreach ($tareas as $task) {
            //format color
            switch ($task['color']) {
                case '#E5ADAE':
                    $colorID = 'frut';
                    break;
                case '#BFD5A9':
                    $colorID = 'kiwi';
                    break;
                case '#EABFA0':
                    $colorID = 'mand';
                    break;
                case '#D0AFCD':
                    $colorID = 'uva';
                    break;
                case '#D8C9B4':
                    $colorID = 'coco';
                    break;
                case '#FFFFFF':
                    $colorID = 'none';
            }
            //format priority
            switch ($task['priority']) {
                case -1:
                    $task['priority'] = 'Baja';
                    break;
                case 0:
                    $task['priority'] = 'Normal';
                    break;
                case 1:
                    $task['priority'] = 'Alta';
                    break;
            }
            //format status
            switch ($task['status']) {
                case 0:
                    $task['status'] = 'Creada';
                    $statusIcon = '<i class="bi bi-clipboard2"></i>';
                    break;
                case 1:
                    $task['status'] = 'En proceso';
                    $statusIcon = '<i class="bi bi-hourglass-split"></i>';
                    break;
                case 2:
                    $task['status'] = 'Completada';
                    $statusIcon = '<i class="bi bi-check"></i></i>';
                    break;
            }

            $isOwner = ($activeUser == $task['idUser']) ? true : false;

            $data = Views::subtasksCount($task['id']);

            $newTask = [
                'taskID' => $task['id'],
                'taskUserID' => $task['idUser'],
                'taskTitle' => $task['title'],
                'taskDesc' => $task['description'],
                'taskPriority' => $task['priority'],
                'taskStatus' => $task['status'],
                'statusIcon' => $statusIcon,
                'taskDate' => $task['exp_date'],
                'taskReminder' => $task['reminder'],
                'taskColor' => $task['color'],
                'taskColorID' => $colorID,
                'taskArchived' => $task['archived'],

                'isTaskOwner' => $isOwner,
                'subtaskData' => $data,
            ];

            $getTareas[] = $newTask;
        }

        return $getTareas;
    }

    public function getTask($id)
    {
        if (!session()->has('idUser')) {
            return redirect()->to('login');
        }


        $model = new \App\Models\TaskModel();
        $task = $model->find($id);

        // format color
        switch ($task['color']) {
            case '#E5ADAE':
                $colorID = 'frut';
                break;
            case '#BFD5A9':
                $colorID = 'kiwi';
                break;
            case '#EABFA0':
                $colorID = 'mand';
                break;
            case '#D0AFCD':
                $colorID = 'uva';
                break;
            case '#D8C9B4':
                $colorID = 'coco';
                break;
            case '#FFFFFF':
                $colorID = 'none';
        }
        //format priority
        switch ($task['priority']) {
            case -1:
                $task['priority'] = 'Baja';
                break;
            case 0:
                $task['priority'] = 'Normal';
                break;
            case 1:
                $task['priority'] = 'Alta';
                break;
        }
        //format status
        switch ($task['status']) {
            case 0:
                $task['status'] = 'Creada';
                $statusIcon = '<i class="bi bi-clipboard2"></i>';
                break;
            case 1:
                $task['status'] = 'En proceso';
                $statusIcon = '<i class="bi bi-hourglass-split"></i>';
                break;
            case 2:
                $task['status'] = 'Completada';
                $statusIcon = '<i class="bi bi-check"></i></i>';
                break;
        }
        // format exp_date
        if ($task['exp_date'] == null) {
            $task['exp_date'] = 'No definido';
        }
        // format reminder
        if ($task['reminder'] == null) {
            $task['reminder'] = 'No definido';
        }


        $activeUser = session()->get('idUser');
        $isOwner = ($activeUser == $task['idUser']) ? true : false;

        $modelC = new \App\Models\CollabModel();
        $res = $modelC->where(['idTask' => $id, 'idUser' => $activeUser])->first();
        $isCollaborator = $res != null ? 'true' : 'false';

        $collabList = [];
        $cList = $modelC->where('idTask', $id)->findAll();

        if ($cList != null) {
            $uModel = new \App\Models\UserModel();

            foreach ($cList as $c) {
                $user = $uModel->where('id', $c['idUser'])->first();
                $email = $user['email'];

                $collabList[] = ['email' => $email,  'user' => $c['idUser']];
            }
        } else {
            $collabList = [['email' => '', 'user' => '']];
        }

        $collab = [
            'collaborators' => $collabList,
            'isCollaborator' => $isCollaborator,
        ];

        $subtareas = Views::getSubtasks($id);
        $data = Views::subtasksCount($id);

        $tarea = [
            'taskID' => $task['id'],
            'taskUserID' => $task['idUser'],
            'taskTitle' => $task['title'],
            'taskDesc' => $task['description'],
            'taskPriority' => $task['priority'],
            'taskStatus' => $task['status'],
            'statusIcon' => $statusIcon,
            'taskDate' => $task['exp_date'],
            'taskReminder' => $task['reminder'],
            'taskColor' => $task['color'],
            'taskColorID' => $colorID,
            'taskArchived' => $task['archived'],

            'isTaskOwner' => $isOwner,
        ];

        $taskContent = [
            'task' => $tarea,
            'subtasks' => $subtareas,
            'subtaskData' => $data,
            'collabData' => $collab,
        ];

        $title = ['title' => 'Tarea: ' . $tarea['taskTitle'],];

        return view('Layouts/header', $title) .
            view('Layouts/menu') .
            view('Task/task', $taskContent) .
            view('Layouts/footer');
    }



    public function getSubtasks($idTask)
    {
        $model = new \App\Models\SubtaskModel();
        $subtareas = $model->where('idTask', $idTask)->findAll();

        $getSubTareas = [];

        foreach ($subtareas as $subtarea) {
            //format priority
            switch ($subtarea['priority']) {
                case 1:
                    $subtarea['priority'] = 'Baja';
                    break;
                case 2:
                    $subtarea['priority'] = 'Normal';
                    break;
                case 3:
                    $subtarea['priority'] = 'Alta';
                    break;
                default:
                    $subtarea['priority'] = 0;
            }
            //format status
            switch ($subtarea['status']) {
                case 0:
                    $subtarea['status'] = 'Creada';
                    break;
                case 1:
                    $subtarea['status'] = 'En proceso';
                    break;
                case 2:
                    $subtarea['status'] = 'Completada';
                    break;
            }
            // format exp_date
            if ($subtarea['exp_date'] == null) {
                $subtarea['exp_date'] = 'No definido';
            }

            $activeUser = session()->get('idUser');
            $isOwner = ($activeUser == $subtarea['idAuthor']) ? true : false;

            $newTask = [
                'subtaskID' => $subtarea['id'],
                'idTask' => $subtarea['idTask'],
                'idAuthor' => $subtarea['idAuthor'],
                'subtaskTitle' => $subtarea['title'],
                'subtaskDesc' => $subtarea['description'],
                'subtaskPriority' => $subtarea['priority'],
                'subtaskStatus' => $subtarea['status'],
                'subtaskDate' => $subtarea['exp_date'],
                'subtaskResp' => $subtarea['assigned'],
                'subtaskComment' => $subtarea['comment'],

                'isSubOwner' => $isOwner,
            ];

            $getSubTareas[] = $newTask;
        }

        return $getSubTareas;
    }

    public function getArchived($iduser)
    {
        $model = new \App\Models\TaskModel();
        $tareas = $model->where('idUser', $iduser)
            ->where('archived', 1)
            ->findAll();

        $get = [];
        $activeUser = session()->get('idUser');

        foreach ($tareas as $task) {
            //format color
            switch ($task['color']) {
                case '#E5ADAE':
                    $colorID = 'frut';
                    break;
                case '#BFD5A9':
                    $colorID = 'kiwi';
                    break;
                case '#EABFA0':
                    $colorID = 'mand';
                    break;
                case '#D0AFCD':
                    $colorID = 'uva';
                    break;
                case '#D8C9B4':
                    $colorID = 'coco';
                    break;
                case '#FFFFFF':
                    $colorID = 'none';
            }
            //format priority
            switch ($task['priority']) {
                case -1:
                    $task['priority'] = 'Baja';
                    break;
                case 0:
                    $task['priority'] = 'Normal';
                    break;
                case 1:
                    $task['priority'] = 'Alta';
                    break;
            }
            //format status
            // switch ($task['status']) {
            //     case 0:
            //         $task['status'] = 'Creada';
            //         $statusIcon = '<i class="bi bi-clipboard2"></i>';
            //         break;
            //     case 1:
            //         $task['status'] = 'En proceso';
            //         $statusIcon = '<i class="bi bi-hourglass-split"></i>';
            //         break;
            //     case 2:
            $task['status'] = 'Completada';
            $statusIcon = '<i class="bi bi-check"></i>';
            //         break;
            // }

            $isOwner = ($activeUser == $task['idUser']) ? true : false;

            $data = Views::subtasksCount($task['id']);

            $newTask = [
                'taskID' => $task['id'],
                'taskUserID' => $task['idUser'],
                'taskTitle' => $task['title'],
                'taskDesc' => $task['description'],
                'taskPriority' => $task['priority'],
                'taskStatus' => $task['status'],
                'statusIcon' => $statusIcon,
                'taskDate' => $task['exp_date'],
                'taskReminder' => $task['reminder'],
                'taskColor' => $task['color'],
                'taskColorID' => $colorID,
                'taskArchived' => $task['archived'],

                'isTaskOwner' => $isOwner,
                'subtaskData' => $data,
            ];

            // log_message('debug', "isTaskOwner: {$newTask['isTaskOwner']}, total: {$newTask['statusIcon']}");


            $get[] = $newTask;
        }


        $data = ['title' => 'Tareas archivadas'];
        $t = ['tasks' => $get];

        return view('Layouts/header', $data) . view('Layouts/menu') . view('Archived/archived', $t) . view('Layouts/footer');
    }

    public function getCollabs($iduser)
    {
        $modelC = new \App\Models\CollabModel();
        $colab = $modelC->where('idUser', $iduser)->findAll();

        $modelT = new \App\Models\TaskModel();
        $get = [];

        foreach ($colab as $c) {
            $task = $modelT->where('id', $c['idTask'])->first();

            //format color
            switch ($task['color']) {
                case '#E5ADAE':
                    $colorID = 'frut';
                    break;
                case '#BFD5A9':
                    $colorID = 'kiwi';
                    break;
                case '#EABFA0':
                    $colorID = 'mand';
                    break;
                case '#D0AFCD':
                    $colorID = 'uva';
                    break;
                case '#D8C9B4':
                    $colorID = 'coco';
                    break;
                case '#FFFFFF':
                    $colorID = 'none';
            }
            //format priority
            switch ($task['priority']) {
                case -1:
                    $task['priority'] = 'Baja';
                    break;
                case 0:
                    $task['priority'] = 'Normal';
                    break;
                case 1:
                    $task['priority'] = 'Alta';
                    break;
            }
            //format status
            switch ($task['status']) {
                case 0:
                    $task['status'] = 'Creada';
                    break;
                case 1:
                    $task['status'] = 'En Proceso';
                    break;
                case 2:
                    $task['status'] = 'Completada';
                    break;
            }

            $data = Views::subtasksCount($task['id']);

            $newTask = [
                'taskID' => $task['id'],
                'taskUserID' => $task['idUser'],
                'taskTitle' => $task['title'],
                'taskDesc' => $task['description'],
                'taskPriority' => $task['priority'],
                'taskStatus' => $task['status'],
                'taskDate' => $task['exp_date'],
                'taskReminder' => $task['reminder'],
                'taskColor' => $task['color'],
                'taskColorID' => $colorID,
                'taskArchived' => $task['archived'],

                'subtaskData' => $data,
            ];

            $get[] = $newTask;
        }

        $t = ['tasks' => $get];

        return view('Layouts/header', ['title' => 'Tareas colaborativas'])
            . view('Layouts/menu')
            . view('Collab/collabs', $t)
            . view('Layouts/footer');
    }

    public function subtasksCount($idTask)
    {
        $model = new \App\Models\SubtaskModel();
        $finished = $model->where(['idTask' => $idTask, 'status' => 2])->countAllResults();
        $total =  $model->where('idTask', $idTask)->countAllResults();

        $data = ['finished' => $finished, 'total' => $total];

        return $data;
    }
}
