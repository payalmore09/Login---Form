<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update Form</title>
    <link rel="stylesheet" href="updatestyle.css">
</head>
<body>
    <div class="container">
        <div class="content-container" style="text-align:center">
            <h1>Update User</h1>
            <p>Update user information below.</p>
        </div>
        <div class="form-container">
            <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbtest";
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $userid = $_POST["userid"];
                $username = $_POST["username"];
                $userpass = $_POST["userpass"];

                $sql = "UPDATE register SET username='$username', userpass='$userpass' WHERE userid='$userid'";

                if (mysqli_query($conn, $sql)) {
                    echo '<div class="message">Record updated successfully</div>';
                } else {
                    echo '<div class="error">Error updating record: ' . mysqli_error($conn) . '</div>';
                }
            }

            // Retrieve user data
            $sql = "SELECT userid, username, userpass FROM register";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <form method="post" class="update-form">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="userpass">Password:</label>
                            <input type="password" id="userpass" name="userpass" value="<?php echo $row['userpass']; ?>" required>
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                        <input type="submit" name="update" value="Update" class="submit-button">
                    </form>
                    <?php
                }
            } else {
                echo '<div class="error">No user data found</div>';
            }

            mysqli_close($conn);
            ?>
        </div>
    </div>
    <a class="back-link" href="registerlist.php">Back to List</a>
</body>
</html>
