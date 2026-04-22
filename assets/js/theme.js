// FILE: assets/js/theme.js
// Modern Light/Dark Theme Toggle + Small UI Helpers
// --------------------------------------------------
// Handles theme persistence, OS preference detection, and smooth transitions.

(function() {
  const toggle = document.getElementById("theme-toggle");
  const root = document.documentElement;

  // --- 1. Load saved or preferred theme ------------------------------
  const saved = localStorage.getItem("theme");
  if (saved) {
    root.setAttribute("data-theme", saved);
  } else {
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
    root.setAttribute("data-theme", prefersDark ? "dark" : "light");
  }

  // --- 2. Update toggle button label/icon -----------------------------
  function updateToggleUI() {
    if (!toggle) return;
    const theme = root.getAttribute("data-theme");
    toggle.textContent = theme === "dark" ? "☀️ Light Mode" : "🌙 Dark Mode";
    toggle.setAttribute("aria-label", `Switch to ${theme === "dark" ? "light" : "dark"} mode`);
  }

  updateToggleUI();

  // --- 3. Handle toggle click -----------------------------------------
  if (toggle) {
    toggle.addEventListener("click", () => {
      const current = root.getAttribute("data-theme");
      const next = current === "dark" ? "light" : "dark";
      root.setAttribute("data-theme", next);
      localStorage.setItem("theme", next);
      updateToggleUI();

      // Add subtle flash transition
      root.classList.add("theme-transition");
      window.setTimeout(() => root.classList.remove("theme-transition"), 300);
    });
  }

  // --- 4. Enhance tables on small screens -----------------------------
  window.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".table").forEach(tbl => {
      tbl.setAttribute("role", "table");
      tbl.style.overflowX = "auto";
    });
  });
})();
