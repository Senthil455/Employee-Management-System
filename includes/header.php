<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EMS Portal</title>
  <link rel="stylesheet" href="/assets/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    .logo-section h1 {
      font-size: 1.8rem;
      font-weight: 600;
      letter-spacing: 0.5px;
      margin: 0;
      color: #fff;
    }

    .nav-bar a, #theme-toggle {
      padding: 8px 14px;
      border-radius: 8px;
      transition: background 0.3s, transform 0.3s;
      text-decoration: none;
      font-weight: 500;
    }

    .nav-bar a:hover, .nav-bar a:focus, #theme-toggle:hover, #theme-toggle:focus {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }

    .nav-bar .logout {
      background: #ff4d4f;
      color: #fff;
    }

    .nav-bar .logout:hover {
      background: #c0392b;
    }

    .nav-bar {
      display: flex;
      gap: 10px;
      align-items: center;
      flex-wrap: wrap;
    }

    @media (max-width: 768px) {
      .main-header {
        flex-direction: column;
        text-align: center;
        gap: 10px;
      }
      .nav-bar {
        flex-direction: column;
        gap: 8px;
      }
    }
  </style>
</head>
<body class="<?php echo (isset($_SESSION['theme']) && $_SESSION['theme'] === 'dark') ? 'dark' : ''; ?>">
<header class="main-header" style="background: linear-gradient(90deg, #004b8d, #007bff); padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
  <div class="logo-section"><h1>Employee Management System</h1></div>
  <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
  <nav class="nav-bar">
    <a href="/admin_dashboard.php">Dashboard</a>
    <a href="/modules/employees/view_employees.php">Employees</a>
    <a href="/modules/attendance/manage_attendance.php">Attendance</a>
    <a href="/modules/payroll/calculate_payroll.php">Payroll</a>
    <a href="/modules/reports/generate_reports.php">Reports</a>
    <a href="/logout.php" class="logout">Logout</a>
    <button id="theme-toggle" aria-label="Toggle Theme">🌙 Dark Mode</button>
  </nav>
  <?php endif; ?>
</header>
<main class="content-wrapper" style="padding: 40px; max-width: 1200px; margin: 0 auto;">

<script>
document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("theme-toggle");
    const body = document.body;

    // Load saved theme from localStorage
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") body.classList.add("dark");

    // Update toggle button text
    function updateToggleText() {
        themeToggle.textContent = body.classList.contains("dark") ? "☀️ Light Mode" : "🌙 Dark Mode";
    }
    updateToggleText();

    // Toggle theme on click
    themeToggle.addEventListener("click", () => {
        body.classList.toggle("dark");
        const theme = body.classList.contains("dark") ? "dark" : "light";
        localStorage.setItem("theme", theme);
        updateToggleText();
    });
});
</script>
