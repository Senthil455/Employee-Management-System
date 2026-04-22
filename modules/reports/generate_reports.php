<?php
include __DIR__ . '/../../db_config.php';
include __DIR__ . '/../../includes/header.php';
checkLogin();

$query = "SELECT p.payroll_id, e.empname, p.month, p.year, p.basic_salary, p.days_present, p.total_pay 
          FROM payroll p 
          JOIN employee e ON p.empid = e.empid 
          ORDER BY p.year DESC, p.month DESC";
$result = pg_query($conn, $query);
$payrolls = $result ? pg_fetch_all($result) : [];
?>

<div class="main-content card">
  <a href="/admin_dashboard.php" class="btn btn-outline">&larr; Back to Dashboard</a>
  <h2 class="text-center mt-2">Payroll Reports</h2>

  <table class="table mt-3">
    <thead>
      <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Month</th>
        <th>Year</th>
        <th>Basic Salary</th>
        <th>Days Present</th>
        <th>Total Pay</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($payrolls): ?>
        <?php foreach ($payrolls as $row): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['payroll_id']); ?></td>
            <td><?php echo htmlspecialchars($row['empname']); ?></td>
            <td><?php echo htmlspecialchars($row['month']); ?></td>
            <td><?php echo htmlspecialchars($row['year']); ?></td>
            <td><?php echo number_format($row['basic_salary'],2); ?></td>
            <td><?php echo htmlspecialchars($row['days_present']); ?></td>
            <td><?php echo number_format($row['total_pay'],2); ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center">No payroll records found.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<style>
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
