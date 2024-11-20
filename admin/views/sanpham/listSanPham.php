


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
          <div class="col-sm-6">
            <h1>Quản lý sản phẩm </h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <a href="<?= BASE_URL_ADMIN.'?act=from-them-san-pham'?>">
                  <button class="btn btn-success">Them san pham</button>
                 </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ten san pham</th>
                    <th>Anh san pham</th>
                    <th>Gia tien</th>
                    <th>So luong</th>
                    <th>Danh muc</th>
                    <th>Ngay tao</th>
                    <th>Trang thai</th>
                    <th>Dung tích </th>
                    <th>Thao tác</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                   foreach ($listSanPham as $key => $sanPham): ?>
                  <tr>
                    <td><?=$key+1?></td>
                    <td><?=$sanPham['ten_san_pham']?></td>
                    <td>
                        <img src="<?= BASE_URL . $sanPham['hinh_anh']?>"  style="width: 100px"alt=""
                        onerror="this.onerror = null; this.src='./assets/dist/img/logo.jpg'">
                    </td>
                    <td><?=$sanPham['gia_san_pham']?></td>
                    <td><?=$sanPham['so_luong']?></td>
                    <td><?=$sanPham['ten_danh_muc']?></td>
                    <td><?=$sanPham['ngay_nhap']?></td>
                    <td><?=$sanPham['trang_thai'] == 1 ? 'Con hang' :'Het hang'?></td>
                    <td><?=
                                                $sanPham['dung_tich'] == 1 ? '10ml' : 
                                                ($sanPham['dung_tich'] == 2 ? '20ml' : 
                                                ($sanPham['dung_tich'] == 3 ? '50ml' : 
                                                ($sanPham['dung_tich'] == 4 ? '100ml' : 'Not specified')))
                                            ?></td>
                    <td>
                    <a href="<?= BASE_URL_ADMIN.'?act=chi-tiet-san-pham&id_san_pham='.$sanPham['id']?>">
                      <button class="btn btn-primary"><i class="fas fa-eye"></i></button>

                      <a href="<?= BASE_URL_ADMIN.'?act=from-sua-san-pham&id_san_pham='.$sanPham['id']?>">
                      <button class="btn btn-warning"><i class="fas fa-cog"></i></button>

                      </a>
                      <a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>" onclick="return confirm('Bạn có muốn xóa không?')"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></a>

                    </td>
                    
                    
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
