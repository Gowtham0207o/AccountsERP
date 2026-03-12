document.addEventListener("DOMContentLoaded", function () {

  const sidebarBtn = document.getElementById("toggleSidebar");
  const sidebar = document.getElementById("sidebar");
  const themeToggle = document.getElementById("themeToggle");

  // Sidebar Toggle
  if (sidebarBtn && sidebar) {
    sidebarBtn.onclick = function () {
      sidebar.classList.toggle("collapsed");
    };
  }
// Active Menu Highlight (handles dashboard outside pages)
const currentPath = window.location.pathname;

const navLinks = document.querySelectorAll("#sidebar a");

navLinks.forEach(link => {
  const linkPath = new URL(link.href).pathname;

  if (linkPath === currentPath) {
    link.classList.add("active");
  } else {
    link.classList.remove("active");
  }
});
  // Theme Toggle
  if (themeToggle) {
    themeToggle.onclick = function () {
      document.body.classList.toggle("light");

      themeToggle.classList.toggle("fa-moon");
      themeToggle.classList.toggle("fa-sun");
    };
  }

});