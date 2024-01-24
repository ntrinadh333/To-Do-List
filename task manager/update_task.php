<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST['task_id'];

    // Update the task status in the database
    $sql = "delete from tasks WHERE task_id = $taskId";
    $result = $conn->query($sql);

    if ($result) {
       // echo "Task marked as completed successfully.";
        header("Location: tasks.php");
    } else {
        echo "Error updating task status: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
