<?php

namespace App\Controllers;

class Views extends BaseController
{
    public function index(): string
    {
        $data = ['title' => 'Inicio'];
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
        $data = [
            'created' => [],
            'in_progress' => [],
            'finished' => []
        ];


        foreach ($tareas as $task) {
            // color
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

            $newTask = [
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

            // status
            switch ($task['status']) {
                case '0':
                    $data['created'][] = $newTask;
                    break;
                case '1':
                    $data['in_progress'][] = $newTask;
                    break;
                case '-1':
                    $data['finished'][] = $newTask;
                    break;

                // más casos como 'mover', 'eliminar', etc.

                default:
                    echo "Acción no reconocida.";
                    break;
            }
        }

        return $data;
    }

    public function getTask($id){
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

        $data = ['title' => $tarea['taskTitle'],
                  'task' => $tarea ];
        return view('Layouts/header', $data) . view('Layouts/menu', $data) . view('Task/task', $data) . view('Layouts/footer');
    }
}
