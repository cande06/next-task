<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;

class Views extends BaseController
{
    public function index(): string
    {
        // Obtener la fecha actual
        $fechaActual = Time::now();

        $dia = $fechaActual->getDay();
        $mes = $fechaActual->getMonth();
        $anio = $fechaActual->getYear();

        $fecha = $dia . '/' . $mes . '/' . $anio;

        $data = ['title' => 'Inicio', 'date' => $fecha];
        $tasks = ['tasks' => Views::getTasks()];
        return view('Layouts/header', $data)
            . view('Layouts/menu')
            . view('Home/home', $tasks)
            . view('Layouts/footer');
    }

    function getLogin()
    {
        $data = ['title' => 'Iniciar sesion',];
        return view('Layouts/header', $data) . view('login', $data) . view('Layouts/footer');
    }

    function getSignup()
    {
        $data = ['title' => 'Registrarse'];
        return view('Layouts/header', $data) . view('signup', $data) . view('Layouts/footer');
    }

    public function getTasks()
    {
        $model = new \App\Models\TaskModel();
        // $session = session();
        // $tareas = $model->where('idUser', $session->get('idUser'))->findAll();
        $tareas = $model->where('idUser', 0)->findAll();


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
                'taskTitle' => $task['title'],
                'taskDesc' => $task['description'],
                'taskPriority' => $task['priority'],
                'taskStatus' => $task['status'],
                'taskDate' => $task['exp_date'],
                'taskReminder' => $task['reminder'],
                'taskColor' => $task['color'],
                'taskColorID' => $colorID,
                'taskChecked' => $task['checked'],
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
        //format status
        switch ($task['status']) {
            case -1:
                $task['status'] = 'Completada';
                break;
            case 0:
                $task['status'] = 'Creada';
                break;
            case 1:
                $task['status'] = 'En Progreso';
                break;
        }

        $subtareas = Views::getSubtasks($id);
        $tarea = [
            'taskID' => $task['id'],
            'taskTitle' => $task['title'],
            'taskDesc' => $task['description'],
            'taskPriority' => $task['priority'],
            'taskStatus' => $task['status'],
            'taskDate' => $task['exp_date'],
            'taskReminder' => $task['reminder'],
            'taskColor' => $task['color'],
            'taskColorID' => $colorID,
            'taskChecked' => $task['checked'],
            'taskArchived' => $task['archived'],
        ];

        $taskContent = [
            'task' => $tarea,
            'subtasks' => $subtareas,
        ];

        $data = ['title' => $tarea['taskTitle'],];

        return view('Layouts/header', $data) .
            view('Layouts/menu') .
            view('Task/task', $taskContent) .
            view('Layouts/footer');
    }

    public function getSubtasks($id)
    {
        $model = new \App\Models\SubtaskModel();
        $tareas = $model->where('idTask', $id)->findAll();


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
                    $task['priority'] = 'Sin Prioridad';
            }

            //format status
            switch ($task['status']) {
                case -1:
                    $task['status'] = 'Finalizada';
                    break;
                case 0:
                    $task['status'] = 'Creada';
                    break;
                case 1:
                    $task['status'] = 'En Progreso';
                    break;
            }

            $newTask = [
                'subtaskID' => $task['id'],
                'subtaskTitle' => $task['title'],
                'subtaskDesc' => $task['description'],
                'subtaskPriority' => $task['priority'],
                'subtaskStatus' => $task['status'],
                'subtaskDate' => $task['exp_date'],
                'subtaskResp' => $task['assigned'],
                'subtaskComment' => $task['comment'],
                'subtaskChecked' => $task['checked'],
            ];

            $getSubTareas[] = $newTask;
        }

        return $getSubTareas;
    }
}
