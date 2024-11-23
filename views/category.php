<?php require_once './views/layout/header.php'; ?>
<?php require_once './views/layout/menu.php'; ?>
<style>


</style>
<section class="feature-product section-padding">
<main>
    <div class="product-list-area section-padding display-flex">
        <div class="container1">
            <div class="row display-flex">
                <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
               

<?php foreach ($listProducts as $sanPham): ?>
    <div class="san-pham">
        <h2><?= $sanPham['ten_san_pham'] ?></h2>
        
        <!-- Hiển thị hình ảnh sản phẩm -->
        <div class="cart-hover ">

<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='.$sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?>
    <button  class="btn btn-cart">Xem chi tiết</button></a>
</div>

        <?php if (isset($sanPham['hinh_anh'])): ?>
            <img src="<?= $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>" style="width: 200px; height: auto;"><br>
        <?php else: ?>
            <p>Hình ảnh không có sẵn</p>
        <?php endif; ?>
        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham='.$sanPham['id'] ?>"> 
        <button  class="btn btn-cart">Xem chi tiết</button></a></a>

       
<p style="text-decoration: line-through;">
    Giá sản phẩm: <?= isset($sanPham['gia_san_pham']) ? number_format($sanPham['gia_san_pham']) : 'Chưa cập nhật' ?> VND
</p>

<?php if (isset($sanPham['gia_khuyen_mai']) && $sanPham['gia_khuyen_mai'] > 0): ?>
    <p style="color: red; font-weight: bold;">
        Giá khuyến mãi: <?= number_format($sanPham['gia_khuyen_mai']) ?> VND
    </p>
<?php endif; ?>



        <!-- Hiển thị lượt xem và số lượng sản phẩm -->
        <p>Lượt xem: <?= $sanPham['luot_xem'] ?></p>
        <p>Số lượng còn lại: <?= $sanPham['so_luong'] ?></p>
        
    </div>
<?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    
</main>
</section>

<?php require_once './views/layout/footer.php'; ?>