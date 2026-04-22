// FILE: assets/js/scripts.js
// Centralized JavaScript for EMS Application (Employee Management System)
// Handles global UI features, dark/light theme, and small interactions.

document.addEventListener("DOMContentLoaded", () => {
    console.log("EMS Application scripts loaded.");

    /* ------------------------------------------------------------------
     * 1. Confirm before delete (Safety Layer)
     * ------------------------------------------------------------------ */
    const deleteLinks = document.querySelectorAll('a[href*="delete_employee.php"]');
    deleteLinks.forEach(link => {
        link.addEventListener("click", event => {
            if (!confirm("⚠️ Are you sure you want to delete this employee? This action cannot be undone.")) {
                event.preventDefault();
            }
        });
    });

    /* ------------------------------------------------------------------
     * 2. Autofocus on login/username fields
     * ------------------------------------------------------------------ */
    const usernameInput = document.getElementById("username");
    if (usernameInput) {
        usernameInput.focus();
    }

    /* ------------------------------------------------------------------
     * 3. Light / Dark Mode Toggle System
     * ------------------------------------------------------------------ */
    const themeToggle = document.getElementById("theme-toggle");
    const currentTheme = localStorage.getItem("theme");
    const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

    if (currentTheme === "dark" || (!currentTheme && prefersDark)) {
        document.body.classList.add("dark-mode");
    }

    if (themeToggle) {
        themeToggle.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
            const theme = document.body.classList.contains("dark-mode") ? "dark" : "light";
            localStorage.setItem("theme", theme);

            // Toggle button text/icon
            themeToggle.innerHTML = theme === "dark" ? "☀️ Light Mode" : "🌙 Dark Mode";
        });
    }

    /* ------------------------------------------------------------------
     * 4. Small UI Enhancements
     * ------------------------------------------------------------------ */

    // Smooth fade for cards, buttons
    const menuItems = document.querySelectorAll(".menu-item");
    menuItems.forEach(item => {
        item.addEventListener("mouseenter", () => item.classList.add("hovering"));
        item.addEventListener("mouseleave", () => item.classList.remove("hovering"));
    });

    // Fade-in on page load
    document.body.style.opacity = "0";
    setTimeout(() => {
        document.body.style.transition = "opacity 0.6s ease";
        document.body.style.opacity = "1";
    }, 100);
});
