<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
        <h2>Login to your Account</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
            <p>Don't have an account? <a href="register.jsp">Register here</a></p>
        </form>
    </center>
</body>
</html>
<?php
include('config.php'); // Include your database connection configuration

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user data from the database based on the provided username
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $dbUsername, $dbPassword);
        $stmt->fetch();
        if (password_verify($password, $dbPassword)) {
            session_start();
            $_SESSION['user_id'] = $userId;
            $_SESSION['username'] = $dbUsername;
            header("Location: home.php"); // Replace with the secure page's URL
            exit();
        } else {
            // Incorrect password
            echo '<script>alert("Incorrect username or password."); window.location.href = "login.php";</script>';
        }
    } else {
        // User not found
        echo '<script>alert("Incorrect username or password."); window.location.href = "login.php";</script>';
    }

    $stmt->close();
}

$conn->close();
?>