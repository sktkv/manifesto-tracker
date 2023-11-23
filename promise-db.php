<!-- This is common across all pages that uses db.php -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manifeso";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>