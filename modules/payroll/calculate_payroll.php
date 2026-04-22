<?php
include __DIR__ . '/../../db_config.php';
include __DIR__ . '/../../includes/header.php';
include __DIR__ . '/../../modules/employees/employee_crud.php';
checkLogin();

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $empid = $_POST['empid'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    $start_date = date("$year-$month-01");
    $end_date = date("Y-m-t", strtotime($start_date));

    $query_days = "SELECT COUNT(*) AS present_days FROM attendance WHERE empid = $1 AND date >= $2 AND date <= $3 AND status = 'Present'";
    $res = pg_query_params($conn, $query_days, [$empid, $start_date, $end_date]);
    $row = pg_fetch_assoc($res);
    $days_present = $row['present_days'] ?? 0;

    $emp = getEmployeeById($empid);
    $basic_salary = $emp['salary'] ?? 0;
    $total_pay = $basic_salary * ($days_present / 30);

    $insert_query = "INSERT INTO payroll (empid, month, year, basic_salary, days_present, total_pay) VALUES ($1,$2,$3,$4,$5,$6)";
    pg_query_params($conn, $insert_query, [$empid, $month, $year, $basic_salary, $days_present, $total_pay]);

    $message = '<span class="success-msg">✅ Payroll calculated. Total Pay: ' . number_format($total_pay, 2) . '</span>';
}

$employees = viewAllEmployees() ?: [];
?>

<div class="main-content card">
  <a href="/admin_dashboard.php" class="btn btn-outline">&larr; Back to Dashboard</a>
  <h2 class="text-center mt-2">Calculate Payroll</h2>
  <?php if ($message) echo "<p class='mt-2'>$message</p>"; ?>

  <form action="calculate_payroll.php" method="POST" class="form-container mt-3">
    <label for="empid">Employee</label>
    <select name="empid" id="empid" required>
      <option value="">Select Employee</option>
      <?php foreach ($employees as $emp): ?>
        <option value="<?php echo $emp['empid']; ?>"><?php echo htmlspecialchars($emp['empname']); ?></option>
      <?php endforeach; ?>
    </select>

    <label for="month">Month (MM)</label>
    <input type="text" name="month" id="month" placeholder="e.g. 10 for October" maxlength="2" pattern="\d{1,2}" required>

    <label for="year">Year (YYYY)</label>
    <input type="text" name="year" id="year" placeholder="e.g. 2025" maxlength="4" pattern="\d{4}" required>

    <button type="submit" class="btn btn-primary">Calculate</button>
  </form>
</div>

<style>
.success-msg {
    color: #28a745;
    font-weight: 600;
}
.main-content h2 {
    font-size: 1.6rem;
    font-weight: 600;
    color: var(--primary-dark);
}
</style>

<?php include __DIR__ . '/../includes/footer.php'; ?>
