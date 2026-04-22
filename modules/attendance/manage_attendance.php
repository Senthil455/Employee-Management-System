<?php
include __DIR__ . '/../../db_config.php';
include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../modules/employees/employee_crud.php';
checkLogin();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empid = $_POST['empid'];
    $date = $_POST['date'];
    $status = $_POST['status'];

    $query = "INSERT INTO attendance (empid, date, status) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $query, [$empid, $date, $status]);

    if ($result) {
        $message = '<span class="success-msg">✅ Attendance recorded successfully.</span>';
    } else {
        $message = '<span class="error-msg">❌ Error recording attendance.</span>';
    }
}

$employees = viewAllEmployees();
?>

<div class="main-content card">
  <a href="/admin_dashboard.php" class="btn btn-outline">&larr; Back to Dashboard</a>
  <h2 class="text-center mt-2">Manage Attendance</h2>
  <?php if ($message) echo "<p class='mt-2'>$message</p>"; ?>

  <form action="manage_attendance.php" method="POST" class="form-container mt-3">
    <label for="empid">Employee</label>
    <select name="empid" id="empid" required>
      <option value="">Select Employee</option>
      <?php foreach ($employees as $emp): ?>
        <option value="<?php echo $emp['empid']; ?>"><?php echo htmlspecialchars($emp['empname']); ?></option>
      <?php endforeach; ?>
    </select>

    <label for="date">Date</label>
    <input type="date" name="date" id="date" required>

    <label for="status">Status</label>
    <select name="status" id="status" required>
      <option value="Present">Present</option>
      <option value="Absent">Absent</option>
      <option value="Leave">Leave</option>
    </select>

    <button type="submit" class="btn btn-primary">Record Attendance</button>
  </form>
</div>

<style>
.success-msg {
  color: #28a745;
  font-weight: 600;
}
.error-msg {
  color: #dc3545;
  font-weight: 600;
}
.main-content h2 {
  font-size: 1.6rem;
  font-weight: 600;
  color: var(--primary-dark);
}
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>
