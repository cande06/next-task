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
            //->with('error', 'No has iniciado sesion')
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

    public function getTasks($iduser)
    {

        $model = new \App\Models\TaskModel();
        $tareas = $model->where('idUser', $iduser)->findAll();

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
            case 0:
                $task['status'] = 'Creada';
                break;
            case 1:
                $task['status'] = 'En proceso';
                break;
            case 2:
                $task['status'] = 'Completada';
                break;
        }

        $activeUser = session()->get('idUser');
        $isOwner = ($activeUser == $task['idUser']) ? true : false;

        $subtareas = Views::getSubtasks($id);
        $data = Views::subtasksCount($id);


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
            'subtaskData' => $data,
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


        $data = ['title' => 'Tareas archivadas'];
        $t = ['tasks' => $get];

        return view('Layouts/header', $data) . view('Layouts/menu') . view('Archived/archived', $t) . view('Layouts/footer');
    }

    public function subtasksCount($idTask)
    {
        $model = new \App\Models\SubtaskModel();
        // $subs = $model->where('idTask', $idTask)->findAll();

        // $finished = 0;
        // foreach ($subs as $subtarea) {
        //     if ($subtarea['status'] == 2) {
        //         $finished++;
        //     }
        // }

        $finished = $model->where(['idTask' => $idTask, 'status'=> 2])->countAllResults();
        $total =  $model->where('idTask', $idTask)->countAllResults();

        $data = ['finished' => $finished, 'total' => $total];

        return $data;
    }
}
