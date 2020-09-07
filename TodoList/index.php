<?php
    function fetchAllData()
    {
        $pdo = dbConnect();

        return $pdo->query("SELECT * FROM Tasks WHERE DELETED=0")->fetchAll(PDO::FETCH_ASSOC);
    }

    function dbConnect()
    {
        $dsn = 'mysql:host=localhost;dbname=Todolist';
        $user = 'root';
        $passwd = '';

        return new PDO($dsn, $user, $passwd);
    }

    function displayData()
    {
        $tasks = fetchAllData();
        $counter = 0;
        foreach ($tasks as $task) {
            if (!$task['deleted']) {
                $counter++;
                $in = '<tr>';
                $out = '</tr>';
                $task['done'] ? $doneCheckbox = '<td>'.'<input type="checkbox" value="tasks'.$task['id'].'" checked> </td>' : $doneCheckbox = '<td>'.'<input type="checkbox"  value="tasks'.$task['id'].'"> </td>';
                $content = $in.'<td>'.$counter.'</td>'.'<td>'.$task['name'].'</td>'.'<td>'.$task['description'].'</td>'
                    .'<td>'.$task['due_date'].'</td>'.'<td>'.$task['image'].$doneCheckbox.
                    '<td><a href="http://localhost:8080/TodoList/update.php/?id='.$task['id'].'">Update</a>'.'</td>'.'<td><a href="http://localhost:8080/TodoList/index.php/?id='.$task['id'].'">Delete</a>'.'</td>'.$out;
                echo $content;
            }
        }
    }

    function deleteRow($id)
    {
        $pdo = dbConnect();
        $stmt = $pdo->prepare("UPDATE Tasks SET deleted=1 WHERE id=?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        deleteRow($id);
    }


    require './index.view.php';

