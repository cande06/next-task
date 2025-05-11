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
        // $tasks = ['tasks' => Views::getTasks()];
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

            //format priority
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

        $tarea = [
            'id' => $task['id'],
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

        $data = ['title' => $tarea['taskTitle'],];
        return view('Layouts/header', $data) . view('Layouts/menu') . view('Task/task', $tarea) . view('Layouts/footer');
    }
}
