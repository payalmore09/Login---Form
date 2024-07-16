<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration List</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table-container {
            width: 80%;
            margin: 20px auto;
            background: #333;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #555;
            text-align: center;
        }
        th {
            background-color: #444;
        }
        td {
            background-color: #555;
            color: #fff;
        }
        a {
            text-decoration: none;
            color: #337ab7;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #4CAF50;
            color: #fff;
        }
        .add-form-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            background: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }
        .add-form-link:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h1 style="text-align:center">User Registration List</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbtest";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $rs = mysqli_query($conn, "SELECT * FROM register");
        ?>
        <table>
            <tr> 
                <th>USER ID</th> 
                <th>USER NAME</th> 
                <th>USER PASSWORD</th> 
                <th colspan="2">Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($rs)) { ?>
                <tr>
                    <td><?php echo $row['userid']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['userpass']; ?></td>
                    <td><a href='registerdel.php?sid=<?php echo $row['userid']; ?>'>Delete</a></td>
                    <td><a href='registerupdate.php?sid=<?php echo $row['userid']; ?>'>Update</a></td>
                </tr>
            <?php } ?>
        </table>
        <a class="add-form-link" href="register.php">ADD FORM</a>
    </div>
</body>
</html>
