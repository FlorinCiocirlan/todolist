<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Title</h1>
    <table>
        <thead>
        <tr>
            <th>
                Nr
            </th>
            <th>
                Name
            </th>
            <th>
                Description
            </th>
            <th>
                Date
            </th>
            <th>
                Image
            </th>
            <th>
               Done
            </th>
            <th>
              Update
            </th>
            <th>
              Delete
            </th>
        </tr>
        </thead>
        <tbody>
        <?=displayData()?>
        </tbody>
    </table>
<a href="http://localhost:8080/TodoList/add.view.php?forms=1"><h4>Add task</h4></a>
</body>
</html>
