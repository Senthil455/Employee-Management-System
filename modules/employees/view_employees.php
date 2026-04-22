<?php
include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/employee_crud.php';
checkLogin();

$employees = viewAllEmployees() ?: [];
?>

<div class="main-content card">
  <h2 class="text-center mt-2">Employee List</h2>
  <a href="add_employee.php" class="menu-item btn btn-primary mt-2" style="display:inline-block;">+ Add New Employee</a>
  
  <table class="table mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Department</th>
        <th>Salary</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($employees): ?>
        <?php foreach ($employees as $emp): ?>
          <tr>
            <td><?php echo htmlspecialchars($emp['empid']); ?></td>
            <td><?php echo htmlspecialchars($emp['empname']); ?></td>
            <td><?php echo htmlspecialchars($emp['designation']); ?></td>
            <td><?php echo htmlspecialchars($emp['deptname']); ?></td>
            <td><?php echo htmlspecialchars($emp['salary']); ?></td>
            <td>
              <a href="edit_employee.php?id=<?php echo $emp['empid']; ?>" class="btn btn-outline btn-sm">Edit</a>
              <a href="delete_employee.php?id=<?php echo $emp['empid']; ?>" class="btn btn-outline btn-sm" onclick="return confirm('⚠️ Are you sure you want to delete this employee?');">Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center">No employees found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <a href="/admin_dashboard.php" class="btn btn-outline mt-3">&larr; Back to Dashboard</a>
</div>

<style>
.btn-sm {
  padding: 4px 8px;
  font-size: 0.85rem;
  margin-right: 5px;
}
.table th, .table td {
  padding: 12px 15px;
  text-align: left;
}
.table tr:nth-child(even) {
  background: #f8fafc;
}
body.dark .table tr:nth-child(even) {
  background: #1e293b;
}
</style>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
