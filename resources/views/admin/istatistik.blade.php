
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>İş Takip Yazılımı</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">İş Takip Yazılımı</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



  @include('partials.navbar')

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
@include('partials.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>İstatistikler</h1>
      <nav>

      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">



        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">En Pahalı 5 Domain</h5>

              <!-- Pie Chart -->
              <canvas id="pieChart" style="max-height: 400px;"></canvas>
              <script>
              @php
                $labels = "";
                $data = "";

               foreach($bestdomain as $rapor){
                $labels .= "\"$rapor->domainad\", ";
                $data .= "$rapor->domainfiyat, ";
              }
              @endphp
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#pieChart'), {
                    type: 'pie',
                    data: {
                      labels: [
                      {!! $labels !!}
                      ],
                      datasets: [{
                        label: 'Fiyat: ',
                        data: [{!! $data !!}],
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)',
                          'rgb(180, 300,26)',
                          'blueviolet'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Pie CHart -->

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">En Pahalı 5 Hosting</h5>

              <!-- Doughnut Chart -->
              <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
              <script>
              @php
                $labels = "";
                $data = "";

               foreach($besthosting as $rapor){
                $labels .= "\"$rapor->hostingad\", ";
                $data .= "$rapor->hostingfiyat, ";
              }
              @endphp
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels: [
                        {!! $labels !!}
                      ],
                      datasets: [{
                        label: 'Fiyat: ',
                        data: [  {!! $data !!}],
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)',
                          'rgb(180, 300,26)',
                          'blueviolet'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Doughnut CHart -->

            </div>
          </div>
        </div>



<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">En Pahalı 5 Proje</h5>

      <!-- Polar Area Chart -->
      <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
      <script>
      @php
        $labels = "";
        $data = "";

       foreach($bestproje as $rapor){
        $labels .= "\"$rapor->ad\", ";
        $data .= "$rapor->fiyat, ";
      }
      @endphp
        document.addEventListener("DOMContentLoaded", () => {
          new Chart(document.querySelector('#polarAreaChart'), {
            type: 'polarArea',
            data: {
              labels: [
            {!! $labels !!}
              ],
              datasets: [{
                label: 'Fiyat: ',
                data: [{!! $data !!}],
                backgroundColor: [
                  'rgb(255, 99, 132)',
                  'rgb(54, 162, 235)',
                  'rgb(255, 205, 86)',
                  'rgb(180, 300,26)',
                    'blueviolet'
                ]
              }]
            }
          });
        });
      </script>
      <!-- End Polar Area Chart -->

    </div>
  </div>
</div>
<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">En Çok Para Harcayan 5 Müşteri</h5>

      <!-- Donut Chart -->
      <div id="donutChart" style="height: 400px;"></div>

      <script>
      @php
        $labels = "";
        $data = "";

       foreach($bestmusteri as $rapor){
        $labels .= "\"$rapor->adsoyad\", ";
        $data .= "$rapor->domainfiyat, ";
      }
      @endphp
        document.addEventListener("DOMContentLoaded", () => {
          new ApexCharts(document.querySelector("#donutChart"), {
            series: [{!! $data !!}],
            chart: {
              height: 350,
              type: 'donut',
              toolbar: {
                show: true
              }
            },
            labels: [{!! $labels !!}],
          }).render();
        });
      </script>
      <!-- End Donut Chart -->

    </div>
  </div>
</div>

      </div>
    </section>

  </main><!-- End #main -->

@include('partials.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
