
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
                                        <th>Mã đơn hàng </th>
                                        <th >Ngày đặt </th>
                                        <th >Tổng tiền </th>
                                        <th >Phương thức thanh toán </th>
                                        <th >Trạng thái đơn hàng</th>
                                        <th >Thao tác</th>
                                    </tr>
                                </thead>

                                <tbody>
                                   <?php foreach($donHangs as  $donHang) : 
                                    
                                    ?>

                                    <tr>
                                        <th class="pro-title text-center"><?= $donHang['ma_don_hang'] ?></th>
                                        <td><?= $donHang['ngay_dat']  ?></td>
                                        <td><?= formatPrice($donHang['tong_tien']). 'đ' ?></td>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']]  ?></td>
                                        <td><?= $trangThaiDonHang [$donHang['trang_thai_id']]  ?></td>
                                        <td>
                                        <?php if($donHang['trang_thai_id'] == 1) : ?>
                                            <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class=" btn btn-sqr" onclick="return confirm('Bạn có muốn hủy đơn hàng không ?')">Delete</a>
                                            
                                            <?php endif ; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach ; ?>
                                </tbody>

                            </table>
                            <!-- <script>
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

                            </script>     -->
                        </div>
                        <!-- Cart Update Option -->
                     
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>


<?php require_once './views/layout/miniCart.php'; ?>

<?php require_once './views/layout/footer.php'; ?>