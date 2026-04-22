<?php
include __DIR__ . '/../../db_config.php';
include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/employee_crud.php';
checkLogin();

$message = '';
$empid = $_GET['id'] ?? null;
if (!$empid) {
    header('Location: view_employees.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['empname'];
    $deptid = $_POST['deptid'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    if (updateEmployee($empid, $name, $deptid, $designation, $salary)) {
        $message = '<span class="success-msg">✅ Employee updated successfully!</span>';
    } else {
        $message = '<span class="error-msg">❌ Error updating employee.</span>';
    }
}

$employee = getEmployeeById($empid);
$departments_query = "SELECT deptid, deptname FROM department ORDER BY deptname";
$departments = pg_query($conn, $departments_query);
?>

<div class="main-content card">
  <a href="/admin_dashboard.php" class="btn btn-outline">&larr; Back to Dashboard</a>
  
  <h2 class="text-center mt-2">Edit Employee</h2>
  <?php if ($message) echo "<p class='mt-2'>$message</p>"; ?>

  <form action="edit_employee.php?id=<?php echo $empid; ?>" method="POST" class="form-container mt-3">
    <label for="empname">Name</label>
    <input type="text" id="empname" name="empname" value="<?php echo htmlspecialchars($employee['empname']); ?>" required>

    <label for="deptid">Department</label>
    <select id="deptid" name="deptid" required>
      <?php while ($row = pg_fetch_assoc($departments)): ?>
        <option value="<?php echo $row['deptid']; ?>" <?php echo ($row['deptid'] == $employee['deptid']) ? 'selected' : ''; ?>>
          <?php echo htmlspecialchars($row['deptname']); ?>
        </option>
      <?php endwhile; ?>
    </select>

    <label for="designation">Designation</label>
    <input type="text" id="designation" name="designation" value="<?php echo htmlspecialchars($employee['designation']); ?>" required>

    <label for="salary">Salary</label>
    <input type="number" id="salary" name="salary" step="0.01" value="<?php echo htmlspecialchars($employee['salary']); ?>" required>

    <button type="submit" class="btn btn-primary">Update Employee</button>
  </form>

  <a href="view_employees.php" class="btn btn-outline mt-3">&larr; Back to Employee List</a>
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

<?php include __DIR__ . '/../../includes/footer.php'; ?>
