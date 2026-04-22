</main>
<footer class="site-footer">
  <div class="footer-container">
    <p>&copy; <?php echo date("Y"); ?> Employee Management System</p>
    <p>Created by <span class="footer-authors">R. Neethivalavan, V. Sanjithkumar, K. Gokul</span></p>
    <div class="footer-social">
      <a href="#" aria-label="Facebook" class="social-link">🔵</a>
      <a href="#" aria-label="Twitter" class="social-link">🐦</a>
      <a href="#" aria-label="LinkedIn" class="social-link">🔗</a>
    </div>
  </div>
</footer>
<style>
.site-footer {
  background: var(--primary-dark);
  color: #fff;
  padding: 20px 0;
  text-align: center;
  font-size: 14px;
  letter-spacing: 0.3px;
  transition: background var(--transition), color var(--transition);
}

.site-footer p {
  margin: 5px 0;
}

.footer-authors {
  font-weight: 600;
  color: #ffe082;
}

.footer-social {
  margin-top: 10px;
  display: flex;
  justify-content: center;
  gap: 12px;
}

.footer-social .social-link {
  display: inline-block;
  width: 32px;
  height: 32px;
  line-height: 32px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  color: #fff;
  text-align: center;
  transition: background var(--transition), transform var(--transition);
  font-size: 16px;
}

.footer-social .social-link:hover {
  background: var(--primary);
  transform: translateY(-3px);
}

body.dark .site-footer {
  background: var(--card-dark);
  color: var(--text-dark);
}

body.dark .footer-authors {
  color: #ffd700;
}

body.dark .footer-social .social-link {
  background: rgba(255, 255, 255, 0.1);
}
</style>
</body>
</html>
