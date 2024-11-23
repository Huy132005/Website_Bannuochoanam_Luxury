<style>

  /* Default Light Mode */
body {
    background-color: #ffffff;
    color: #000000;
}

/* Dark Mode */
body.dark-mode {
    background-color: #1e1e2f;
    color: #ffffff;
}

.navbar.dark-mode {
    background-color: #333;
}

.btn-light-dark-toggle {
    border: none;
    background: transparent;
    cursor: pointer;
}

</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= BASE_URL ?>" class="nav-link">Website bán nước hoa nam Luxury</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" aria-label="Fullscreen">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!-- Dark/Light Mode Toggle -->
        <li class="nav-item">
            <button class="nav-link btn btn-light-dark-toggle" id="themeToggle" aria-label="Toggle dark/light mode">
                <i id="themeIcon" class="fas fa-moon"></i>
            </button>
        </li>
        <!-- Logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= BASE_URL_ADMIN ?>?act=logout-admin" 
                onclick="return confirm('Bạn có muốn đăng xuất tài khoản không?')" role="button" aria-label="Logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<script>
  // Toggle Dark/Light Mode
document.getElementById("themeToggle").addEventListener("click", function () {
    const body = document.body;
    const themeIcon = document.getElementById("themeIcon");
    body.classList.toggle("dark-mode");
    if (body.classList.contains("dark-mode")) {
        themeIcon.classList.replace("fa-moon", "fa-sun");
    } else {
        themeIcon.classList.replace("fa-sun", "fa-moon");
    }
});

</script>
​
