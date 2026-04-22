<?php
$host = "localhost";
$port = "5432";
$dbname = "gokuldb";
$user = "postgres";
$password = "senthil777";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

session_start();

function checkLogin() {
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
}
?>
