<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 2px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 15px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<h2>Welcome, $username!</h2>";
    } else {
        echo '<h2>Welcome!</h2>';
    }
    ?>
    <p> <!-- Your welcome page content here --> </p>
</a>
  <div class="header-right">
    <a class="active" href="home.php">Home</a>
<?php
if (isset($_SESSION['user_id'])) {
    echo '<a href="create_task.php">Add a Task</a>';
    echo '<a href="logout.php">Logout</a>';
} else {
    // User is not logged in
    echo '<a href="login.php">Login</a>';
}
?>
  </div>
</div>

</body>
</html>