
<?php require_once './views/layout/header.php'; ?>
    <!-- Start Header Area -->
 <?php require_once './views/layout/menu.php'; ?>  

 <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap">
    <h5 class="checkout-title">Thông tin người nhận</h5>

    <div class="billing-form-wrap">
        <table class="billing-table">
            <tr>
                <th>Thông tin</th>
                <th>Chi tiết</th>
            </tr>
            <tr>
                <td>Tên người nhận</td>
                <td>
                    <input type="text" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="Tên người nhận" required />
                </td>
            </tr>
            <tr>
                <td>Địa chỉ email</td>
                <td>
                    <input type="email" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Địa chỉ email" required />
                </td>
            </tr>
            <tr>
                <td>Số điện thoại người nhận</td>
                <td>
                    <input type="text" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="Số điện thoại người nhận" required />
                </td>
            </tr>
            <tr>
                <td>Địa chỉ người nhận</td>
                <td>
                    <input type="text" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="Địa chỉ người nhận" required />
                </td>
            </tr>
            <tr>
                <td>Ghi chú</td>
                <td>
                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="Ghi chú đơn hàng của bạn"></textarea>
                </td>
            </tr>
        </table>
    </div>
</div>

                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông tin sản phẩm cần thanh toán</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                         
                                            <?php  
                                            $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $key =>$sanPham): ?>
                                            
                                              <tr>
                                                <td><a href=""><?= $sanPham['ten_san_pham'] ?><strong> × <?= $sanPham['so_luong'] ?></strong></a>
                                                </td>
                                                <td>  <?php
                                              $tongTien=0;
                                              if($sanPham['gia_khuyen_mai']){
                                                 $tongTien = $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'];
                                              }else{
                                                 $tongTien = $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                              }
                                              $tongGioHang += $tongTien;
                                              echo  formatPrice($tongTien) .'đ' ;
                                              ?></td>
                                            </tr>
                                            
                                            
                                        
                                        <?php endforeach ?>
                                      
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Tổng tiền sản phẩm</td>
                                                <td><strong><?= formatPrice($tongGioHang).'đ' ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td class="d-flex justify-content-center">
                                                    <strong>30.000 đ</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tổng đơn hàng</td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 30000 ?>">
                                                <td><strong><?= formatPrice($tongGioHang + 30000) .'đ' ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon"  value="1" name="phuong_thuc_thanh_toan_id" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Khách hàng có thể thanh toán sau khi nhận hàng thành công (cần xác nhận đơn hàng)</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Thanh toán trước khi nhận hàng</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            <p>Khách hàng cần thanh toán online trước khi nhận hàng</p>
                                        </div>
                                    </div>
                                   
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác nhận đặt hàng </label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Tiến hành đặt hàng</button>
                                    </div>
                                </div>
                             </form>

 <?php require_once './views/layout/miniCart.php'; ?>

<?php require_once './views/layout/footer.php'; ?>
