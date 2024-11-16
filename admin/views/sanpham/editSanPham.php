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
        <div class="col-sm-11">
          <h1> Sửa thông tin sản phẩm : <?= $sanPham['ten_san_pham'] ?></h1>
        </div>
       
      <div class="col-sm-1">
        <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="btn btn-secondary">Quay lại</a>
       
      </div>
   
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
                <?php  } ?>
              </div>
              <div class="form-group">
                <label for="gia_san_pham">Giá sản phẩm</label>
                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
                <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
                <?php  } ?>
              </div>
              <div class="form-group">
                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                <input type="number" id="gia_khuyen_mai" name=" gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
                <?php  } ?>
              </div>
              <div class="form-group">
                <label for="hinh_anh">Hình ảnh</label>
                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
                <?php  } ?>
              </div>
              <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
                <?php if (isset($_SESSION['error']['so_luong'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
                <?php  } ?>
              </div>

              <div class="form-group">
                <label>Ngày nhập</label>
                <input type="date" class="form-control" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>" placeholder=" Nhập ngày sản phẩm">
                <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
                <?php  } ?>
              </div>


              <div class="form-group">
                <label for="inputStatus">Danh mục sản phẩm</label>
                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc) : ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id']; ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                  <?php endforeach ?>
                </select>
                <?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
                <?php  } ?>
              </div>
              <div class="form-group">
                <label>Trạng thái </label>
                <select class="form-control custom-select" name="trang_thai" id="trang_thai">
                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán </option>
                  <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán </option>

                </select>
                <?php if (isset($_SESSION['error']['trang_thai'])) { ?>
                  <p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
                <?php  } ?>
              </div>

              <div class="form-group">
                <label for="mo_ta">Mô tả sản phẩm</label>
<textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"> <?= $sanPham['mo_ta'] ?></textarea>
              </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer text-center ">
              <button type="submit" class="btn btn-primary">Sửa thông tin </button>
            </div>
        </div>
        <!-- /.card -->
        </form>
      </div>
      <div class="col-md-4">

        <!-- /.card -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album Ảnh Sản Phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
          <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="POST"  enctype="multipart/form-data">

            <div class="table-responsive">
              <table id="faqs" class="table table-hover">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>File</th>
                    <th>
                      <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i>Thêm</button></div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                    <input type="hidden" id="img_delete" name="img_delete">
                    <?php foreach ($listAnhSanPham as $key=> $value) : ?>
                  <tr id="faqs-row-<?= $key ?>">
                    <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                    <td><img src="<?= BASE_URL  . $value['link_hinh_anh'] ?>" width="50px" height="50px" alt=""></td>
                  
                    <td><input type="file"name="img_array[]" class="form-control" ></td>
                    <td class="mt-10"><button  class="badge badge-danger"type="button" onclick="removeRow(<?= $key ?>,<?= $value['id'] ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
               <div class="card-footer text-center ">
              <button type="submit" class="btn btn-primary">Sửa thông tin </button>
            </div>
           </form>
          </div>
          <!-- /.card-body -->
          
        </div>
           <!-- /.card -->  
      </div>
    </div>

  </section>
  <!-- /.content -->
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include './views/layout/footer.php' ?>


</body>
<script>
  var faqs_row = <?= count($listAnhSanPham)?>;

  function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td><img src="https://mekoong.com/wp-content/uploads/2022/11/7152396016698887451-10.jpg" width="50px" height="50px" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    // html += '<td class="text-danger mt-10"> 18.76% <i class="fa fa-arrow-down"></i></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ',null)"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }
  function removeRow(rowId,imgId) {
  
    $('#faqs-row-' + rowId).remove();
    if(imgId !== null){
      var imgDeleteInput = document.getElementById('img_delete')
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
    }
  }
</script>

</html>