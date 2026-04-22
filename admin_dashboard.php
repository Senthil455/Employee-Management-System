<?php
include __DIR__ . '/db_config.php';
checkLogin();
include __DIR__ . '/includes/header.php';
?>

<div class="dashboard-container card">
  <h2 class="text-center mt-2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
  <p class="text-center mt-2">Select an option to manage your organization:</p>

  <div class="menu-options mt-3">
    <a href="modules/employees/view_employees.php" class="menu-item">👨‍💼 Manage Employees</a>
    <a href="modules/attendance/manage_attendance.php" class="menu-item">🕓 Manage Attendance</a>
    <a href="modules/payroll/calculate_payroll.php" class="menu-item">💰 Payroll Processing</a>
    <a href="modules/reports/generate_reports.php" class="menu-item">📊 Generate Reports</a>
  </div>
</div>

<style>
.dashboard-container h2 {
  font-size: 1.8rem;
  font-weight: 600;
  color: var(--primary-dark);
}
.dashboard-container p {
  font-size: 1rem;
  color: var(--muted);
}
.menu-item {
  font-size: 1.1rem;
  padding: 20px;
  border-radius: 12px;
  text-decoration: none;
  transition: all 0.3s;
}
.menu-item:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow);
}
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>
