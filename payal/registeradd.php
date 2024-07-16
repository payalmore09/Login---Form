<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['txtid'];
    $username = $_POST['txtname'];
    $password = $_POST['txtpass'];

    // Basic validation (you may want to enhance this)
    if (empty($userid) || empty($username) || empty($password)) {
        die("All fields are required.");
    }

    // Prepare and bind SQL statement with placeholders
    $sql = "INSERT INTO register (userid, username, userpass) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters and execute statement
    mysqli_stmt_bind_param($stmt, "sss", $userid, $username, $password);

    // Execute statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to registerlist.php upon successful insertion
        header('Location: registerlist.php');
        exit;
    } else {
        // Handle errors if execution fails
        echo "Error: " . mysqli_error($conn);
    }

    // Close statement and connection
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
