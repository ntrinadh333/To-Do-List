<?php
include('config.php'); // Include your database connection configuration

// Check if the user is logged in (you may need to modify this based on your session management)
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Handle task creation form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskName = $_POST["taskName"];
    $taskDescription = $_POST["taskDescription"];
    $userId = $_SESSION['user_id']; // Retrieve user ID from the session
    $task_status = 0;
    // Prepare and execute the SQL statement to insert the task into the database
    $stmt = $conn->prepare("INSERT INTO tasks (user_id, task_name, task_description, task_status) VALUES (?, ?, ? ,?)");
    $stmt->bind_param("isss", $userId, $taskName, $taskDescription, $task_status);

    if ($stmt->execute()) {
        // Task creation successful
        echo '<script>alert("Task created successfully!"); window.location.href = "tasks.php";</script>';
    } else {
        // Task creation failed
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>