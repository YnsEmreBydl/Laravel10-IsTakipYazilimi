
<!DOCTYPE html>
<html lang="tr">

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
    </div>


    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

  @include('partials.navbar')

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('partials.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Gider Tablosu</h1><br>
      <nav>
        <ol class="breadcrumb">
          <td ><a href="{{route('odeme')}}"> <button style="margin-left:10px" type="submit" class="btn btn-success btn-sm">Ödemesi Yapılmış</button> </a></td>

          <td><a href="{{route('odenmemis')}}"> <button type="submit" style="margin-left:10px" class="btn btn-warning btn-sm">Ödenmemiş</button> </a></td>
          <td ><a href="{{route('odemeekle')}}"> <button style="margin-left:10px" type="submit" class="btn btn-primary btn-sm">Ödeme Yap</button> </a></td>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <table class="table table-striped table-responsive">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Açıklama</th>
              <th>Tutar</th>
              <th>Ödenecek Zaman</th>
              <th>Ödeme Durumu</th>
              <th>Düzenle</th>
              <th>Sil</th>
            </tr>
          </thead>
          <tbody>
            @foreach($odemeler as $odeme)
            @if($odeme->odemedurum == 2)
            <tr>
              <td>{{$odeme->id}}</td>
              <td>{{$odeme->aciklama}}</td>
              <td>{{$odeme->tutar}} ₺</td>
              <td>{{$odeme->zaman}}</td>

               <td>  @if($odeme->odemedurum ==1)
                 <button style="width:150px" class="btn btn-danger btn-sm">Ödenmedi</button>
                 @elseif($odeme->odemedurum ==2)
                 <button style="width:150px" class="btn btn-success btn-sm">Ödendi</button>
                 @endif</td>
              <td><a href="{{route('odemeduzenle', $odeme->id)}}" class="btn btn-outline-warning btn-sm">Düzenle</a></td>
              <td><a href="{{route('odemesil', $odeme->id)}}" class="btn btn-outline-danger btn-sm">Sil</a></td>

            </tr>
            @endif
            @endforeach

          </tbody>
        </table>


      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
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
