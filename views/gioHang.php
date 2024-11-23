<style>
 
.pro-qty {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 2px; 
    background-color: #fff;
}


.qty-btn {
    

.quantity-input {
    width: 40px; 
    text-align: center; 
    border: none; 
    font-size: 16px;
    outline: none; 
    background-color: transparent; 
}

.qty-btn:hover {
    background-color: #ddd; 
}


.qty-btn.minus {
    margin-left: 3px;
}

.qty-btn.plus {
    margin-right: 3px;
}


</style>
<?php require_once './views/layout/header.php'; ?>
    <!-- Start Header Area -->
 <?php require_once './views/layout/menu.php'; ?>  


 <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-checkbox"></th>
                                            <th class="pro-thumbnail">Ảnh sản phẩm </th>
                                            <th class="pro-title">Tên sản phẩm </th>
                                            <th class="pro-price">Giá tiền </th>
                                            <th class="pro-quantity">Số lượng </th>
                                            <th class="pro-subtotal">Tổng tiền</th>
                                            <th class="pro-remove">Thao tác</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
    <?php  $tongGioHang = 0;
    foreach ($chiTietGioHang as $key => $sanPham): ?> <tr data-id="<?= $sanPham['id'] ?>"> <!-- Add data-id for easier identification in JS -->
        <td class="pro-checkbox">
            <input type="checkbox" class="item-checkbox" checked>
        </td>
        <td class="pro-thumbnail">
            <a href="#"><img class="img-fluid" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" /></a>
        </td>
        <td class="pro-title">
            <a href="#"><?= $sanPham['ten_san_pham'] ?></a>
        </td>
        <td class="pro-price">
            <span style="color: red;">
                <?php if ($sanPham['gia_khuyen_mai']) { ?>
                    <?= formatPrice($sanPham['gia_khuyen_mai']) . 'đ' ?>
                <?php } else { ?>
                    <?= formatPrice($sanPham['gia_san_pham']) . 'đ' ?>
                <?php } ?>
            </span>
        </td>
        <td class="pro-quantity">
            <div class="pro-qty">
                <button class="qty-btn minus"></button>
                <input type="text" class="quantity-input" data-price="<?= $sanPham['gia_khuyen_mai'] ?: $sanPham['gia_san_pham']; ?>" value="<?= $sanPham['so_luong'] ?>" />
                <button class="qty-btn plus"></button>
            </div>
        </td>
        <td class="pro-subtotal">
            <span style="color: red" class="subtotal">
                <?php
                $tongTien = $sanPham['gia_khuyen_mai'] ? $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'] : $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                $tongGioHang += $tongTien;
                echo formatPrice($tongTien) . 'đ';
                ?>
            </span>
        </td>
        <td class="pro-remove">
            <button class="remove-btn"><i class="fa fa-trash-o"></i></button>
        </td>
    </tr>
    <?php endforeach ?>
</tbody>

                                </table>
                            <script>
document.addEventListener('DOMContentLoaded', function () {
    // Function to update the subtotal of a single item
    function updateSubtotal(quantityInput) {
        const quantity = parseInt(quantityInput.value);
        const price = parseFloat(quantityInput.getAttribute('data-price'));
        const subtotalElement = quantityInput.closest('tr').querySelector('.subtotal');
        const newSubtotal = (price * quantity).toLocaleString('vi-VN') + 'đ';

        subtotalElement.textContent = newSubtotal;

        updateTotalAmount();
    }

    function updateTotalAmount() {
        let totalAmount = 0;
        let shippingFee = 30000; 

       
        document.querySelectorAll('.item-checkbox:checked').forEach(function (checkbox) {
            const row = checkbox.closest('tr');
            const subtotalText = row.querySelector('.subtotal').textContent.replace(/[^\d]/g, '');
            totalAmount += parseFloat(subtotalText);
        });

      
        const formattedTotalAmount = totalAmount.toLocaleString('vi-VN') + 'đ';
         const formattedFinalAmount = (totalAmount + shippingFee).toLocaleString('vi-VN') + 'đ';

        document.querySelector('.total-amount').textContent = formattedFinalAmount;
        document.querySelector('.total-product-amount').textContent = formattedTotalAmount;
    }

   
    document.querySelectorAll('.pro-qty').forEach(function (proQty) {
        proQty.addEventListener('click', function (event) {
            const target = event.target;
            const quantityInput = proQty.querySelector('.quantity-input');
            let currentQuantity = parseInt(quantityInput.value);

            
            if (target.classList.contains('plus')) {
                currentQuantity += 1;
            }

            if (target.classList.contains('minus') && currentQuantity > 1) {
                currentQuantity -= 1;
            }

          
            quantityInput.value = currentQuantity;

           
            updateSubtotal(quantityInput);
        });
    });

   
    document.querySelectorAll('.quantity-input').forEach(function (input) {
        input.addEventListener('change', function () {
            const newQuantity = parseInt(input.value);
            if (isNaN(newQuantity) || newQuantity < 1) {
                input.value = 1;
            }

           
            updateSubtotal(input);
        });
    });

    document.querySelectorAll('.remove-btn').forEach(function (removeBtn) {
        removeBtn.addEventListener('click', function () {
            if (confirm('Bạn có chắc chắn muốn xóa mặt hàng này khỏi giỏ hàng?')) {
                const row = removeBtn.closest('tr');
                row.remove();

                updateTotalAmount();
            }
        });
    });

    document.querySelectorAll('.item-checkbox').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateTotalAmount();
        });
    });

    updateTotalAmount();
});

                            </script>    
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-between">
                                <div class="apply-coupon-wrapper">
                                    <form action="#" method="post" class=" d-block d-md-flex">
                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                        <button class="btn btn-sqr">Apply Coupon</button>
                                    </form>
                                </div>
                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row"><div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
    <div class="cart-calculate-items">
        <h6>Tổng đơn hàng</h6>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Tổng tiền sản phẩm</td>
                    <td class="total-product-amount"><?= formatPrice($tongGioHang) .'đ' ?></td>
                </tr>
                <tr>
                    <td>Vận chuyển</td>
                    <td>30.000 đ</td>
                </tr>
                <tr class="total">
                    <td>Tổng thanh toán</td>
                    <td class="total-amount"><?= formatPrice($tongGioHang + 30000) .'đ' ?></td>
                </tr>
            </table>
        </div>
    </div>
    <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Tiến hành đặt hàng</a>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
    

 <?php require_once './views/layout/miniCart.php'; ?>

 <?php require_once './views/layout/footer.php'; ?>