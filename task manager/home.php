<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }


        form {
            margin-top: 50px;
        }

        input[type="submit"] {
            background-color: brown;
            color: #fff;
            padding: 30px 60px;
            font-size: 25px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            margin: 25px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include('head.php') ?>
    <!-- Two buttons to create a Task and view all Tasks -->
    <form action="create_task.php" method="post">
        <input type="submit" value="Create Task">
    </form>
    <form action="tasks.php" method="post">
        <input type="submit" value="View Tasks">
    </form>
</body>
</html>
