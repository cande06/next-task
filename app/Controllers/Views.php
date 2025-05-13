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

        if(!session()->has('idUser')){
            return redirect()->to('login');
            //->with('error', 'No has iniciado sesion')
        }

        $userID = session()->get('idUser');

        $data = ['title' => 'Inicio', ]; //'date' => $fecha
        $tasks = ['tasks' => Views::getTasks($userID)];

        return view('Layouts/header', $data)
            . view('Layouts/menu')
            . view('Home/home', $tasks)
            . view('Layouts/footer');
    }

    public function getLogin()
    {
        $data = ['title' => 'Iniciar sesion',];
        return view('Layouts/header', $data) . view('login', $data) . view('Layouts/footer');
    }

    public function getSignup()
    {
        $data = ['title' => 'Registrarse'];
        return view('Layouts/header', $data) . view('signup', $data) . view('Layouts/footer');
    }

    public function goBack(){
        return redirect()->back();
    }

    public function getTasks($iduser)
    {
        $model = new \App\Models\TaskModel();
        $tareas = $model->where('idUser', $iduser)->findAll();
        // $tareas = $model->where('idUser', 0)->findAll();


        $colorID = '';
        $getTareas = [];

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
                case -1:
                    $task['status'] = 'Completada';
                    break;
                case 0:
                    $task['status'] = 'Creada';
                    break;
                case 1:
                    $task['status'] = 'En Proceso';
                    break;
            }

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
            ];

            $getTareas[] = $newTask;
        }

        return $getTareas;
    }

    public function getTask($id)
    {
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
            case -1:
                $task['status'] = 'Completada';
                break;
            case 0:
                $task['status'] = 'Creada';
                break;
            case 1:
                $task['status'] = 'En Proceso';
                break;
        }

        $activeUser = session()->get('idUser');
        $isOwner = ($activeUser == $task['idUser']) ? true : false;

        $subtareas = Views::getSubtasks($id);
        $tarea = [
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
            'isTaskOwner' => $isOwner,
        ];

        $taskContent = [
            'task' => $tarea,
            'subtasks' => $subtareas,
        ];

        $data = ['title' => 'Tarea: ' . $tarea['taskTitle'],];

        return view('Layouts/header', $data) .
            view('Layouts/menu') .
            view('Task/task', $taskContent) .
            view('Layouts/footer');
    }

    public function getSubtasks($idTask)
    {
        $model = new \App\Models\SubtaskModel();
        $tareas = $model->where('idTask', $idTask)->findAll();

        $getSubTareas = [];

        foreach ($tareas as $task) {
            //format priority
            switch ($task['priority']) {
                case 1:
                    $task['priority'] = 'Baja';
                    break;
                case 2:
                    $task['priority'] = 'Normal';
                    break;
                case 3:
                    $task['priority'] = 'Alta';
                    break;
                default:
                    $task['priority'] = 0;
            }
            //format status
            switch ($task['status']) {
                case -1:
                    $task['status'] = 'Completada';
                    break;
                case 0:
                    $task['status'] = 'Creada';
                    break;
                case 1:
                    $task['status'] = 'En proceso';
                    break;
            }

            $activeUser = session()->get('idUser');
            $isOwner = ($activeUser == $task['idAuthor']) ? true : false;

            $newTask = [
                'subtaskID' => $task['id'],
                'idTask' => $task['idTask'],
                'idAuthor' => $task['idAuthor'],
                'subtaskTitle' => $task['title'],
                'subtaskDesc' => $task['description'],
                'subtaskPriority' => $task['priority'],
                'subtaskStatus' => $task['status'],
                'subtaskDate' => $task['exp_date'],
                'subtaskResp' => $task['assigned'],
                'subtaskComment' => $task['comment'],
                'isSubOwner' => $isOwner,
            ];

            $getSubTareas[] = $newTask;
        }

        return $getSubTareas;
    }
}
