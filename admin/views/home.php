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
          <h1 style="font-family: 'Playfair Display', serif; color: #FFD700; font-weight: bold;">
            Báo cáo thống kê
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#" style="color: #FFD700;">Trang chủ</a></li>
            <li class="breadcrumb-item active" style="color: #999;">Thống kê</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Filters -->
        <div class="col-12">
          <div class="card">
            <div class="card-header" style="background-color: #1c1c1c; color: #FFD700;">
              <h3 class="card-title" style="font-family: 'Playfair Display', serif; font-weight: bold;">Chọn thời gian</h3>
            </div>
            <div class="card-body">
              <form id="report-filter-form">
                <div class="row">
                  <div class="col-md-4">
                    <label for="filter-date" style="color: #333; font-weight: bold;">Ngày</label>
                    <input type="date" id="filter-date" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="filter-week" style="color: #333; font-weight: bold;">Tuần</label>
                    <input type="week" id="filter-week" class="form-control">
                  </div>
                  <div class="col-md-4">
                    <label for="filter-month" style="color: #333; font-weight: bold;">Tháng</label>
                    <input type="month" id="filter-month" class="form-control">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Chart Section -->
        <div class="col-12">
          <div class="card">
            <div class="card-header" style="background-color: #1c1c1c; color: #FFD700;">
              <h3 class="card-title" style="font-family: 'Playfair Display', serif; font-weight: bold;">Thống kê doanh thu</h3>
            </div>
            <div class="card-body">
              <canvas id="luxuryChart" style="width: 100%; height: 400px;"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  <!-- /.content-wrapper -->
 <?php include './views/layout/footer.php' ?>
<!-- Page specific script -->
<!-- Code injected by live-server -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('luxuryChart').getContext('2d');

    const luxuryChart = new Chart(ctx, {
      type: 'bar', // Biểu đồ dạng cột
      data: {
        labels: ['Ngày 1', 'Ngày 2', 'Ngày 3', 'Ngày 4', 'Ngày 5', 'Ngày 6', 'Ngày 7'],
        datasets: [{
          label: 'Doanh thu (VNĐ)',
          data: [1200000, 1500000, 1800000, 2000000, 1300000, 2200000, 2500000],
          backgroundColor: [
            'rgba(255, 215, 0, 0.8)', // Gold
            'rgba(255, 215, 0, 0.8)',
            'rgba(255, 215, 0, 0.8)',
            'rgba(255, 215, 0, 0.8)',
            'rgba(255, 215, 0, 0.8)',
            'rgba(255, 215, 0, 0.8)',
            'rgba(255, 215, 0, 0.8)'
          ],
          borderColor: [
            'rgba(0, 0, 0, 0.8)',
            'rgba(0, 0, 0, 0.8)',
            'rgba(0, 0, 0, 0.8)',
            'rgba(0, 0, 0, 0.8)',
            'rgba(0, 0, 0, 0.8)',
            'rgba(0, 0, 0, 0.8)',
            'rgba(0, 0, 0, 0.8)'
          ],
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            display: true,
            labels: {
              color: '#FFD700', // Gold for legend text
              font: {
                family: "'Playfair Display', serif",
                weight: 'bold'
              }
            }
          },
          tooltip: {
            backgroundColor: '#333',
            titleColor: '#FFD700',
            bodyColor: '#FFD700',
            borderColor: '#FFD700',
            borderWidth: 1
          }
        },
        scales: {
          x: {
            ticks: {
              color: '#FFD700',
              font: {
                family: "'Playfair Display', serif",
                weight: 'bold'
              }
            }
          },
          y: {
            ticks: {
              color: '#FFD700',
              font: {
                family: "'Playfair Display', serif",
                weight: 'bold'
              }
            }
          }
        }
      }
    });
  });
</script>

</body>
</html>