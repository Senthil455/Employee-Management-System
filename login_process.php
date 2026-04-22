<?php
include __DIR__ . '/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT password FROM admin WHERE username = $1";
    $result = pg_query_params($conn, $query, [$username]);

    if (pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);
        $stored_password = $row['password'];

        if ($password === $stored_password) {  // For production use password_verify with hashed passwords
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: admin_dashboard.php');
            exit;
        } else {
            header('Location: login.php?error=Invalid Password');
            exit;
        }
    } else {
        header('Location: login.php?error=User not found');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>
