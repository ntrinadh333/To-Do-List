<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php') ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6e6e6;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h2 {
            color: black;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: brown;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }

        input[type="submit"] {
            background-color: #4285f4;
            color: #fff;
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3367d6;
        }

        a {
            color: #4285f4;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        center {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
include 'config.php';

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//session_start();
$userId = $_SESSION['user_id'];
// Fetch tasks from the database
$sql = "SELECT task_id, task_name, task_description FROM tasks where user_id = $userId and task_status = 0";
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
    echo "<h2>Task List</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Task Name</th><th>Task Description</th><th>Status</th</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["task_name"] . "</td><td>" . $row["task_description"] . "</td><td>
            <form method='post' action='update_task.php'>
                <input type='hidden' name='task_id' value='" . $row["task_id"] . "'>
                <input type='submit' name='completed' value='Click Me if Completed'>
            </form>
        </tr>";
    }

    echo "</table>";
} else {
    echo "<center>No tasks found.</center>";
}

// Close the connection
$conn->close();
?>

</body>
</html>
