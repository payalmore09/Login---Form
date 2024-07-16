<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbtest";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "DELETE FROM register WHERE userid=" . $_GET['sid'];
mysqli_query($conn, $sql);
header('location:registerlist.php');
?>