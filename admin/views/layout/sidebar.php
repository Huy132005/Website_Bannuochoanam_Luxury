<style>
/* Sidebar Background with Elegant Black-Gold Theme */
.sidebar-gold-primary {
    background-color: #1c1c1c !important; /* Elegant dark background */
    color: #FFD700; /* Gold text color */
}

/* Brand Link Styling */
.brand-link {
    background-color: #1c1c1c !important;
    color: #FFD700; /* Gold text */
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    font-family: 'Playfair Display', serif;
    padding: 20px;
}

.brand-link .brand-text {
    font-weight: bold;
    color: #FFD700 !important; /* Gold color */
}

/* Sidebar User Info Section */
.user-panel .info a {
    color: #FFD700 !important;
    font-weight: bold;
    font-size: 14px;
    font-family: 'Playfair Display', serif;
    transition: color 0.3s ease;
}

.user-panel .info a:hover {
    color: #FFF8DC; /* Light gold on hover */
}

/* User Image Border Customization */
.user-panel .image img {
    border: 2px solid #FFD700; /* Gold border */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.user-panel .image img:hover {
    transform: scale(1.1); /* Zoom effect */
    box-shadow: 0 0 10px rgba(255, 215, 0, 0.7); /* Gold glow */
}

/* Sidebar Menu Link Styling */
.nav-sidebar>.nav-item>.nav-link {
    color: #FFD700; /* Gold text */
    font-weight: 500;
    font-family: 'Playfair Display', serif;
    transition: all 0.3s ease;
}

.nav-sidebar>.nav-item>.nav-link:hover {
    background-color: #FFD700; /* Gold hover background */
    color: #1c1c1c; /* Dark text */
    font-weight: bold;
    text-shadow: 0px 0px 5px rgba(255, 215, 0, 0.7); /* Gold glow on hover */
}

</style>
<aside class="main-sidebar sidebar-gold-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= BASE_URL_ADMIN ?>" class="brand-link">
        <span class="brand-text">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./assets/dist/img/logo2.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Nước hoa nam</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>

                <!-- Product Categories -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-muc' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i><p>Danh mục sản phẩm</p>
                    </a>
                </li>

                <!-- Products -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="nav-link">
                        <i class="nav-icon fas fa-wine-bottle"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>

                <!-- Orders -->
                <li class="nav-item">
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>

                <!-- Account Management -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Quản lí tài khoản
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-quan-tri' ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Tài khoản quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Tài khoản khách hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL_ADMIN . '?act=form-sua-thong-tin-ca-nhan-quan-tri' ?>" class="nav-link">
                                <i class="nav-icon far fa-user"></i>
                                <p>Tài khoản cá nhân</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>