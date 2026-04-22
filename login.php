<?php include __DIR__ . '/includes/header.php'; ?>

<div class="login-container card mt-5">
  <h2 class="text-center mt-2">Login</h2>
  <form action="login_process.php" method="POST" class="form-container mt-3">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required autofocus>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button type="submit" class="btn btn-primary">Login</button>
  </form>

  <?php if (isset($_GET['error'])): ?>
    <p class="text-center mt-2" style="color:#dc3545;"><?php echo htmlspecialchars($_GET['error']); ?></p>
  <?php endif; ?>
</div>

<style>
.login-container {
  max-width: 400px;
  margin: 80px auto;
  padding: 30px;
  border-radius: 12px;
  box-shadow: var(--shadow);
  background: var(--card);
  transition: background var(--transition), box-shadow var(--transition);
}
body.dark .login-container {
  background: var(--card-dark);
  box-shadow: var(--shadow-dark);
}
.login-container h2 {
  font-size: 1.6rem;
  color: var(--primary-dark);
}
.login-container input {
  margin-bottom: 15px;
}
.login-container button {
  width: 100%;
  padding: 10px;
  font-size: 1rem;
}
</style>

<?php include __DIR__ . '/includes/footer.php'; ?>
