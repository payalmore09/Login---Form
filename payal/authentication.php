<?php
ini_set('display_errors', 0);
error_reporting(0);

include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Basic validation
    if (empty($username) || empty($password)) {
        die("<h1>Login failed. Username or Password is empty.</h1>");
    }

    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("<h1>Query failed: " . mysqli_error($con) . "</h1>");
    }

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "<h1><center>Login successful</center></h1>";
    } else {
        echo "<h1>Login failed. Invalid username or password.</h1>";
    }
}
?>
  