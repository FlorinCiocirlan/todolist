<?php
    function createFormElement($i)
    {
        return '
<div style="display: block">
    <label>Name</label>
    <input type="text" name="name'.$i.'">'.
    '<label>Description</label>
    <input type="text" name="description'.$i.'">'.
    '<label>Due date</label>
    <input type="text" name="date'.$i.'">'.
    '<input type="file" accept=".jpg,.png" name="img'.$i.'"></div>';
    }

    function createSubmitButton(){
        return '<button type="button" id="submit-button">Submit</button>';
    }

    function defineNumberOfForms()
    {
        if(isset($_GET['forms'])){
            $formsNr = $_GET['forms'];
            echo '<form action="add.php" method="post" id="form">';
            for ($i = 0; $i < $formsNr; $i++) {
                $element = createFormElement($i);

                echo $element;
            }
            echo '</form>';
            echo createSubmitButton();
        }

    }

    function dbConnect(){
        $dsn = 'mysql:host=localhost;dbname=Todolist';
        $user = 'root';
        $passwd = '';
        return new PDO($dsn,$user,$passwd);
    }

    function addTask($listValues){
        $pdo = dbConnect();
        $stmt = $pdo->prepare("INSERT INTO Tasks(name, description , due_date, image , done, deleted) VALUES(:name, :description, :due_date, :image, 0 , 0)");
        print_r($listValues);
        $stmt-> execute([
            'name'=>$listValues[0],
            'description'=>$listValues[1],
            'due_date'=>$listValues[2],
            'image'=>$listValues[3]
        ]);
    }


    if (isset($_POST['forms'])) {
        $attributes=['name','description','date','img'];
        $formsNr=(int)$_POST['forms'];
        for($i=0;$i<$formsNr;$i++){
            $temp=[];
           foreach($attributes as $attr){
//               array_push($temp,$_POST[$attr.$i]);
               $temp[]=$_POST[$attr.$i];
            }
           addTask($temp);
        }
        header('Location:'.'http://localhost:8080/TodoList/');
    };


