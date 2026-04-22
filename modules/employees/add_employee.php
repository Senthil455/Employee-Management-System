<?php
include __DIR__ . '/../../db_config.php';
include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/employee_crud.php';
checkLogin();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['empname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $deptid = $_POST['deptid'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    if (addEmployee(null, $name, $gender, $dob, $deptid, $designation, $salary)) {
        $message = '<span class="success-msg">✅ Employee added successfully!</span>';
    } else {
        $message = '<span class="error-msg">❌ Error adding employee!</span>';
    }
}

$departments_query = "SELECT deptid, deptname FROM department ORDER BY deptname";
$departments = pg_query($conn, $departments_query);
?>

<div class="main-content card">
  <h2 class="text-center mt-2">Add Employee</h2>
  <?php if ($message) echo "<p class='mt-2'>$message</p>"; ?>

  <form action="add_employee.php" method="POST" class="form-container mt-3">
    <label for="empname">Name</label>
    <input type="text" id="empname" name="empname" required>

    <label for="gender">Gender</label>
    <select id="gender" name="gender" required>
      <option value="">Select gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>

    <label for="dob">Date of Birth</label>
    <input type="date" id="dob" name="dob" required>

    <label for="deptid">Department</label>
    <select id="deptid" name="deptid" required>
      <option value="">Select department</option>
      <?php while ($row = pg_fetch_assoc($departments)): ?>
        <option value="<?php echo $row['deptid']; ?>"><?php echo htmlspecialchars($row['deptname']); ?></option>
      <?php endwhile; ?>
    </select>

    <label for="designation">Designation</label>
    <input type="text" id="designation" name="designation" required>

    <label for="salary">Salary</label>
    <input type="number" id="salary" name="salary" step="0.01" required>

    <button type="submit" class="btn btn-primary">Add Employee</button>
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
