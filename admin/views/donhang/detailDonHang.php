
  <!-- Main Sidebar Container -->
  <?php include "./views/layout/header.php"; ?>
 <?php include "./views/layout/navbar.php"; ?>
<?php include "./views/layout/sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Quản lý Don hang -don hang:<?= $donHang['ma_don_hang'] ?></h1>
          </div>
         <div class="col-sm-2">
          <form action="POST" method="post">
            <select name="" id="">
            <?php foreach($listTrangThaiDonHang as $key =>$trangThai):?>

              <option <?=$trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : ''?>
                <?=$trangThai['id'] < $donHang['trang_thai_id'] ? 'disabled' : ''?>
                value="<?=$trangThai['id']?>">
                
              <?=$trangThai['ten_trang_thai']?></option>

              <?php endforeach ?>
            </select>
          </form>
         </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <?php 
            //trạng thái đơn hàng theo bang DB 1= chua xu ly, 2= dang xu ly, 10= hoan thanh
            if ($donHang['trang_thai_id'] == 1) {
                $color = "primary";
            }elseif($donHang['trang_thai_id'] >= 2 && $donHang['trang_thai_id'] <= 9){
                $color = "warning";

            }elseif($donHang['trang_thai_id'] == 10){
                $color = "success";
            }else{
                $color = "danger";
            }
            ?>
            <div class="alert alert-<?=$color;?>" role="alert">
             Đơn hàng: <?= $donHang['ten_trang_thai'] ?>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Shop nước hoa luxury
                    <small class="float-right">Ngày đặt:  <?php
                    $originalDate = $donHang['ngay_dat'];
                    echo $newDate = date("d-m-Y", strtotime($originalDate));
                     
                    ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Thông tin người đặt
                  <address>
                    <strong><?= $donHang['ho_ten'] ?></strong><br>
                    Email: <?= $donHang['email'] ?><br>
                    So dien thoai: <?= $donHang['so_dien_thoai'] ?><br>     
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Thong tin nguoi nha
                  <address>
                    <strong><?= $donHang['ten_nguoi_nhan']?><br></strong>
                    Dia chi: <?= $donHang['dia_chi_nguoi_nhan']?><br>
                    Email: <?= $donHang['email_nguoi_nhan']?><br>
                    So dien thoai: <?= $donHang['sdt_nguoi_nhan']?><br>
                  
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  Thong tin
                  <address>
                  <strong><?= $donHang['ma_don_hang']?><br></strong>
                    Tong tien: <?= $donHang['tong_tien']?><br>
                    Ghi chu: <?= $donHang['ghi_chu']?><br>
                    Thanh toan: <?= $donHang['ten_phuong_thuc']?><br>
                  
                  </address>
                  
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>STT</th>
                      <th>Ten san pham</th>
                      <th>Don gia</th>
                      <th>So luong</th>
                      <th>Thanh tien</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $tong_tien = 0;?>
                      <?php foreach($sanPhamDonHang as $key => $sanPham): ?>
                    <tr>
                      <td><?= $key + 1 ?></td>
                      <td><?= $sanPham['ten_san_pham'] ?></td>
                      <td><?= $sanPham['don_gia'] ?></td>
                      <td><?= $sanPham['so_luong'] ?></td>
                      <td><?=$sanPham['thanh_tien'] ?></td>
                    </tr>
                    <?php $tong_tien += $sanPham['thanh_tien']?>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

             
                <!-- /.col -->
                <div class="col-6">
                <small class="float-left" style="font-size: 24px; font-weight: bold;">Ngày đặt:  <?php
                    $originalDate = $donHang['ngay_dat'];
                    echo $newDate = date("d-m-Y", strtotime($originalDate));
                     
                    ?></small>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">thanh tien:</th>
                        <td>
                          <?= $tong_tien ?>
                        </td>
                      </tr>
                     
                      <tr>
                        <th>Van chuyen:</th>
                        <td>30</td>
                      </tr>
                      <tr>
                        <th>Tong tien:</th>
                        <td><?= $tong_tien + 30?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
    
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

  <!-- /.content-wrapper -->
 <?php include './views/layout/footer.php'; ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
