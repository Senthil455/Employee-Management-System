<?php
include __DIR__ . '/db_config.php';

session_unset();
session_destroy();

header('Location: login.php');
exit;
?>
