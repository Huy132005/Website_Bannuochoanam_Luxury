<?php require './views/layout/header.php' ?>
  <!-- Navbar -->
  <?php include './views/layout/navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include './views/layout/sidebar.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Quản lí danh sách sản phẩm</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

<!-- Default box -->
<div class="card card-solid">
  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="col-12">
          <img style="width: 500px; height: 500px" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
        </div>
        <div class="col-12 product-image-thumbs">
          <?php foreach($listAnhSanPham as $key => $anhSP): ?>
          <div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
         <?php endforeach ?>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <h3 class="my-3">Tên sản phẩm : <?= $sanPham['ten_san_pham'] ?></h3>

        <hr>
    
        <h4 class="mt-3">Giá tiền : <small><?= $sanPham['gia_san_pham'] ?></small></h4>

        <h4 class="mt-3">Giá khuyến mãi : <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>

        <h4 class="mt-3">Số lượng : <small><?= $sanPham['so_luong'] ?></small></h4>

        <h4 class="mt-3">Lượt xem : <small><?= $sanPham['luot_xem'] ?></small></h4>

        <h4 class="mt-3">Ngày nhập : <small><?= $sanPham['ngay_nhap'] ?></small></h4>

        <h4 class="mt-3">Danh mục : <small><?= $sanPham['ten_danh_muc'] ?></small></h4>

        <h4 class="mt-3">Trạng thái : <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán ' ?></small></h4>

        <h4 class="mt-3">Mô tả : <small><?= $sanPham['mo_ta'] ?></small></h4>



        

  

       


      </div>
    </div>
    <!-- <div class="row mt-4">
      <nav class="w-100">
        <div class="nav nav-tabs" id="product-tab" role="tablist">
          <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="product-desc" aria-selected="true">Bình luận của sản phẩm</a>
          
        </div>
      </nav>
      <div class="tab-content p-3" id="nav-tabContent">
        <div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="product-desc-tab"> 
          <div class="container-fluid">
            
          
          <table class="table  table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Tên người bình luận</th>
                <th>Nội dung bình luận</th>
                <th>Ngày đăng bình luận</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Nguyễn Thanh Tùng</td>
                <td>Meo meo beo beo </td>
                <td>01/01/2022</td>
                <td>
                 <div class="btn-group">
                  <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                  <a href="#"><button class="btn btn-danger">Xóa</button></a>
                 </div>
              </tr>

              <tr>
                <td>2</td>
                <td>Nguyễn Văn Phát</td>
                <td>Meo meo beo beo </td>
                <td>01/01/2024</td>
                <td>
                 <div class="btn-group">
                  <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                  <a href="#"><button class="btn btn-danger">Xóa</button></a>
                 </div>
              </tr>
          </table>
          </div>
      </div>
    </div> -->


    <div class="col-12">
            <h2>Bình luận sản phẩm </h2>
           <div>
           <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Người bình luận </th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>

                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($listBinhLuan as $key => $binhLuan): ?>
                    
                    
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $binhLuan['tai_khoan_id'] ?>" ><?= $binhLuan['ho_ten'] ?></a></td>
                    <td><?= $binhLuan['noi_dung'] ?></td>
                    <td><?= $binhLuan['ngay_dang'] ?></td>
                    <td><?= $binhLuan['trang_thai'] == 1 ? 'Hiện thị' : 'Bị ẩn' ?></td>
                  
                    
                    <td>
                   

                    <form action="<?= BASE_URL_ADMIN . '?act=update-trang-thai-binh-luan&id_binh_luan' ?>" method="POST">
                   <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                   <input type="hidden" name="name_view" value="detail_sanpham">



                   <button onclick="return confirm('Bạn có muốn ẩn bình luận này không ?')" class="btn btn-warning">
                    <?= $binhLuan['trang_thai'] == 1 ? 'Ẩn' : 'Bỏ ẩn' ?>
                   </button>


                    </form>
             
                    </td>
                     
                  </tr>
                 <?php endforeach ?>
                  </tbody>
            
                </table>
           </div>
          </div>    
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include './views/layout/footer.php' ?>
<!-- Page specific script -->
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
<!-- Code injected by live-server -->

</body>
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>
</html>
