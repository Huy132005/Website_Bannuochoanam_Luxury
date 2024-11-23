<header class="header-area header-wide">
        <!-- main header start -->
        <div class="main-header d-none d-lg-block">

            <!-- header middle area start -->
            <div class="header-main-area sticky">
                <div class="container">
                    <div class="row align-items-center position-relative">

                        <!-- start logo area -->
                        <div class="col-lg-2">
                            <div class="logo">
                                <a href="<?= BASE_URL ?>">
                                    <img src="assets/img/logo/logo2.jpg" alt="Brand Logo" width="80px">
                                </a>
                            </div>
                        </div>
                        <!-- start logo area -->

                        <!-- main menu area start -->
                        <div class="col-lg-6 position-static">
                            <div class="main-menu-area">
                                <div class="main-menu">
                                    <!-- main menu navbar start -->
                                    <nav class="desktop-menu">
                                        <ul>
                                            <li ><a href="<?= BASE_URL ?>">Trang chủ </a>
                                                
                                            </li>
                                           
                                            <li><a href="#">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                                <ul class="dropdown">
                                                <?php foreach($this->listCategory as $value): ?>
                                                     <li><a href="?act=show-product-category&id=<?= $value['id'] ?>"><?= $value['ten_danh_muc'] ?></a></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </li>
                                            <li><a href="<?= BASE_URL . '?act=gioi-thieu'  ?>">  Giới thiệu</a></li>
                                            <li><a href="<?= BASE_URL . '?act=lien-he'  ?>">  Liên hệ</a></li>

                                        </ul>
                                    </nav>
                                    <!-- main menu navbar end -->
                                </div>
                            </div>
                        </div>
                        <!-- main menu area end -->

                        <!-- mini cart area start -->
                        <div class="col-lg-4">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                            <div class="header-search-container">
    <button class="search-trigger d-xl-none d-lg-block">
        <i class="pe-7s-search"></i>
    </button>
    <form class="header-search-box d-lg-none d-xl-block">
        <input id="searchInput" 
               type="text" 
               placeholder="Nhập tên sản phẩm" 
               class="header-search-field">
        <button type="button" id="searchButton" class="header-search-btn">
            <i class="pe-7s-search"></i>
        </button>
    </form>
</div>


<div id="searchResults" style="margin-top: 20px; display: none;">
    <ul id="resultsList" style="list-style: none; padding: 0;"></ul>
</div>


      

                                <div class="header-configure-area ">
                                    <ul class="nav justify-content-end align-items-center sticky">
                                        <label for=""><?php 
                                        
                                        if(isset($_SESSION['user_client'])) {
                                            echo $_SESSION['user_client'];
                                        }
                                        
                                        ?></label>
                                        <li class="user-hover left">
                                            <a href="#">
                                                <i class="pe-7s-user"></i>
                                            </a>
                                            <ul class="dropdown-list left">
                                            <?php  
                                        
                                        if( !isset($_SESSION['user_client'])) {?>
                                <li><a href="<?= BASE_URL .'?act=login' ?>">Đăng nhập </a></li>

                                        <?php } else {?>
                                        <li><a href="<?= BASE_URL . '?act=from-sua-khach-hang1' ?>    ">Tài khoản</a></li>

                                        <li><a class="nav-link"  href="<?= BASE_URL ?>?act=login" onclick="return confirm('Bạn có muốn đăng xuất tài khoản không ?')" role="button">Đăng xuất</a></li>
                                        
                                           <li> <a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">Đơn hàng</a></li>    
                                         
                                       <?php } ?>
                                                 <li><a href="<?= BASE_URL .'?act=register' ?>">Đăng ký </a></li> 
                                            </ul> 
                                        </li>
                                    
                                        <li class="minicart-wrap">
                                            <a href="#" class="minicart-btn ">
                                                <i class="pe-7s-shopbag"></i>
                                                <div class="notification">1</div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- mini cart area end -->

                    </div>
                </div>
            </div>
            <!-- header middle area end -->
        </div>
        <!-- main header start -->

       
    </header>
    <!-- end Header Area -->
