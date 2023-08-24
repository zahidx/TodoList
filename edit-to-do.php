<?php
require_once 'database.php';

$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM todo WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $task = mysqli_fetch_assoc($result);

    if (!$task) {
        $message = 'Task not found.';
    }
}

if (isset($_POST['task'])) {
    $newTask = $_POST['task'];
    $query = "UPDATE todo SET task = '$newTask' WHERE id = $id";
    
    if (mysqli_query($connection, $query)) {
        header("Location: index.php");
        exit();
    } else {
        $message = 'Failed to update task.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            font-weight: bold; /* Added */
            font-size: 16px; /* Added */
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #444;
        }

        .back-button {
            background-color: #D64C35;
            color: #fff;
            padding: 7px 15px;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #B63E2D;
        }

        a {
            text-decoration: none;
            color: #333;
            margin-top: 10px;
        }

        p {
            color: #ff0000;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>

        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if ($task): ?>
            <form action="" method="post">
                <input type="text" name="task" value="<?php echo $task['task']; ?>" required>
                <div class="button-group">
                    <input type="submit" value="Save">
                    <a class="back-button" href="index.php">Back to List</a>
                </div>
            </form>
        <?php else: ?>
            <p>No task found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
