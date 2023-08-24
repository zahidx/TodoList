<?php
require_once 'get-to-do.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            background-color: #f9f9f9;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            margin-left: 10px;
            transition: color 0.3s;
        }

        a.edit-button {
            color: #3992B4;
        }

        a.delete-button {
            color: #D64C35;
        }

        a:hover {
            color: #333;
        }

        form {
            display: flex;
            margin-top: 20px;
        }

        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 0 5px 5px 0;
            padding: 10px 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li>
                    <?php echo $task['task']; ?>
                    <div>
                        <a class="edit-button" href="edit-to-do.php?id=<?php echo $task['id']; ?>">Edit</a>
                        <a class="delete-button" href="delete-to-do.php?id=<?php echo $task['id']; ?>">Delete</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <form action="create-to-do.php" method="post">
            <input type="text" name="task" placeholder="Enter a new task..." required>
            <input type="submit" value="Add Task">
        </form>
    </div>
</body>
</html>
