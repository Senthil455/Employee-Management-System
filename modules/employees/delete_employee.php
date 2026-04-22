<?php
include __DIR__ . '/../../db_config.php';
include __DIR__ . '/employee_crud.php';
checkLogin();

$empid = $_GET['id'] ?? null;

if ($empid) {
    if (deleteEmployee($empid)) {
        header('Location: view_employees.php?msg=deleted');
        exit;
    } else {
        echo '<div class="main-content card"><p class="error-msg">❌ Error deleting employee.</p></div>';
    }
} else {
    echo '<div class="main-content card"><p class="error-msg">⚠️ Invalid employee ID.</p></div>';
}
?>
<style>
.error-msg {
    color: #dc3545;
    font-weight: 600;
    margin: 20px 0;
    text-align: center;
}
.main-content {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
}
</style>
