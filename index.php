<?php
include __DIR__ . '/db_config.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: admin_dashboard.php');
    exit;
} else {
    header('Location: login.php');
    exit;
}
?>
