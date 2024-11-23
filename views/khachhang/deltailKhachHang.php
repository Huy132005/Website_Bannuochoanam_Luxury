
<?php require_once './views/layout/header.php'; ?>
    <!-- Start Header Area -->
 <?php require_once './views/layout/menu.php'; ?>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Quản lí tải khoản khách hàng </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-6">
          <img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width: 70% " alt="" onerror="this.onerror=null;this.src='https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg '">

            
            <!-- /.card -->
            
           
          </div>
          <div class="col-6">
            <div class="container">
                  <table class="table table-borderless ">
                    <tbody style="font-size: large">
                <tr>
                <th>Họ tên :</th>
                <td><?= $khachHang['ho_ten'] ?? '' ?></td>
             </tr>
             <tr>

                <th>Ngày sinh :</th>  
                <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>

             </tr>
             

             <tr>
                <th>Email :</th>
                <td><?= $khachHang['email'] ?? '' ?></td>
             </tr>
             <tr>
                <th>Số điện thoại :</th>
                <td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
             </tr>
             <tr>

                <th>Giới tính :</th>
                <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
             </tr>
             <tr>

                <th>Địa chỉ :</th>
                <td><?= $khachHang['dia_chi']  ?? ''?></td>
             </tr>
             <tr>

                <th>Trạng thái :</th>  
                <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>

             </tr>



                    </tbody>
             
            </table>
            </div>
        

          </div>
          <div class="col-12">
            <h2>Lịch sử mua hàng</h2>
           <div>
           <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng </th>
                    <th>Tên người nhận</th>
                    <th>Số điện thoại</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền </th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listDonHang as $key => $donHang): ?>
                    
                    
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $donHang['ma_don_hang'] ?></td>
                    <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                    <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                    <td><?= $donHang['ngay_dat'] ?></td>
                    <td><?= $donHang['tong_tien'] ?></td>
                    <td><?= $donHang['ten_trang_thai'] ?></td>
                  
                    
                    <td>
                     
                    
             
                    </td>
                     
                  </tr>
                 <?php endforeach ?>
                  </tbody>
            
                </table>
           </div>
          </div>
          <!-- /.col -->
          
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include './views/layout/footer.php' ?>


</body>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "responsive": true,
       "lengthChange": false,
        "autoWidth": false,
    });
  });
</script>
</html>