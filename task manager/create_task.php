<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
    <meta charset="UTF-8">
    <title>Create Task</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        center {
            margin-top: 50px;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <center>
        <h2>Create a New Task</h2>
        <form action="createtask.php" method="post">
            <label for="taskName">Task Name:</label>
            <input type="text" id="taskName" name="taskName" required>

            <label for="taskDescription">Task Description:</label>
            <textarea id="taskDescription" name="taskDescription" rows="4" cols="50" required></textarea>

            <input type="submit" value="Create Task">
        </form>

        <p><a href="tasks.php">Go to Tasks</a></p>
    </center>
</body>
</html>
