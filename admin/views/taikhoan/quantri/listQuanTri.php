


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
            <h1>Quản lý tai khoan quan tri vien </h1>
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
                <a href="<?= BASE_URL_ADMIN.'?act=form-them-quan-tri'?>">
                  <button class="btn btn-success">Them tai khoan</button>
                 </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Ho ten</th>
                    <th>Email</th>
                    <th>So dien thoai</th>
                    <th>Trang thai</th>
                    <th>Thao tác</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                  <?php 
                   foreach ($listQuanTri as $key => $quanTri): ?>
                  <tr>
                    <td><?=$key+1?></td>
                    <td><?=$quanTri['ho_ten']?></td>
                    <td><?=$quanTri['email']?></td>
                    <td><?=$quanTri['so_dien_thoai']?></td>
                    <td><?=$quanTri['trang_thai'] == 1 ? 'Active' : 'Inactive'?></td>
                    <td>
                      <a href="<?= BASE_URL_ADMIN.'?act=from-sua-quan-tri&id_quan_tri='.$quanTri['id']?>">
                      <button class="btn btn-warning"><i class="fas fa-cog"></i></button>
                      <a href="<?= BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $quanTri['id'] ?>" onclick="return confirm('Bạn có muốn reset password của tài khoản này không ?')"><button class="btn btn-danger"><i class="fas fa-circle-notch"></i></button></a>

                      </a>

                    </td>
                    
                    
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  
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
