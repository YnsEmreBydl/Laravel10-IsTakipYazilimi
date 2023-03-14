
<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>İş Takip Yazılımı</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

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


  @include('partials.navbar')

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
@include('partials.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Müşteri Detay Sayfası</h1>
      <nav>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        @foreach($musteriler as $must)
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2>{{$must->adsoyad}}</h2>
              <h3>{{$must->meslek}}</h3>
              <p>{{$must->telefon}} - <span>{{$must->mail}}</span></p>
              <p>{{$must->il}} - <span>{{$must->ilce}}</span></p>
              <p>{{$must->adres}}</p>


              </div>
            </div>
          </div>

        </div>
        @endforeach

        <div class="col-xl-12">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Domainler</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Hostingler</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Projeler</button>
                </li>



              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">DOMAİN BİLGİLERİ</h5>

                  <table style="display:block;" class="table table-striped table-responsive">
                    <thead>

                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Ad Soyad</th>
                        <th>Telefon</th>
                        <th>Domain Adı</th>

                        <th>Fiyat</th>
                        <th>Hizmet Başlangıç</th>
                        <th>Hizmet Bitiş</th>
                        <th>Domain Durumu</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                      </tr>

                    </thead>
                    <tbody>
                      @foreach($musteridomain as  $dom)
                      @foreach($musteriler as  $must)
                      <tr>
                        <td>{{$dom->id}}</td>

                        <td>{{$must->adsoyad}}</td>
                        <td>{{$must->telefon}}</td>
                        <td>{{$dom->domainad}}</td>
                        <td>{{$dom->domainfiyat}} ₺</td>
                        <td>{{$dom->domainbaslangic}}</td>
                        <td><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-danger btn-sm"><?php
                         $tarih1 = strtotime(date('d.m.Y'));
                         $tarih2 = strtotime($dom->domainbitis);
                         $fark = $tarih2 - $tarih1;
                         echo $sonuc = floor($fark / (60 * 60 * 24));
                         ?>  Gün kaldı</button></td>
                      <td>  @if($dom->domainstatus ==2)
                        <button class="btn btn-danger btn-sm">Süresi Bitti</button>
                        @elseif($dom->domainstatus ==1)
                        <button class="btn btn-success btn-sm">Devam Ediyor</button>
                        @endif</td>
                        <td><a href="{{route('domainduzenle', $dom->id)}}" class="btn btn-outline-warning btn-sm">Düzenle</a></td>
                        <td><a href="{{route('domainsil', $dom->id)}}" class="btn btn-outline-danger btn-sm">Sil</a></td>

                      </tr>
                      @endforeach
                      @endforeach

                    </tbody>
                  </table>
                    {{$musteridomain->links()}}
                  <div class="text-center">
                    <button type="submit" class="btn btn-warning">Hatırlatma Maili Gönder</button>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <h5 class="card-title">HOSTİNG BİLGİLERİ</h5>
                  <!-- Profile Edit Form -->
                  <table style="display:block;" class="table table-striped table-responsive">
                    <thead>

                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Ad Soyad</th>
                        <th>Telefon</th>

                        <th>Hosting</th>
                        <th>Fiyat</th>
                        <th>Hosting Başlangıç</th>
                        <th>Hosting Bitiş</th>
                        <th>Hosting Durumu</th>
                        <th>Düzenle</th>
                        <th>Sil</th>
                      </tr>

                    </thead>
                    <tbody>
                      @foreach($musterihosting as  $host)
                      @foreach($musteriler as  $must)
                      <tr>
                        <td>{{$host->id}}</td>
                        <td>{{$must->adsoyad}}</td>
                        <td>{{$must->telefon}}</td>
                        <td>{{$host->hostingad}}</td>
                        <td>{{$host->hostingfiyat}} ₺</td>
                        <td>{{$host->hostingbaslangic}}</td>
                        <td><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-danger btn-sm"><?php
                         $tarih1 = strtotime(date('d.m.Y'));
                         $tarih2 = strtotime($host->hostingbitis);
                         $fark = $tarih2 - $tarih1;
                         echo $sonuc = floor($fark / (60 * 60 * 24));
                         ?>  Gün kaldı</button></td>
                      <td>  @if($host->hostingstatus ==2)
                        <button class="btn btn-danger btn-sm">Süresi Bitti</button>
                        @elseif($host->hostingstatus ==1)
                        <button class="btn btn-success btn-sm">Devam Ediyor</button>
                        @endif</td>

                        <td><a href="{{route('hostingduzenle', $host->id)}}" class="btn btn-outline-warning btn-sm">Düzenle</a></td>
                        <td><a href="{{route('hostingsil', $host->id)}}" class="btn btn-outline-danger btn-sm">Sil</a></td>

                      </tr>
                      @endforeach
                      @endforeach

                    </tbody>
                  </table>
                    {{$musterihosting->appends(["domain"=>old('domain')])->links()}}
                  <div class="text-center">
                    <button type="submit" class="btn btn-warning">Hatırlatma Maili Gönder</button>
                  </div>
                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">
                  <h5 class="card-title">PROJE BİLGİLERİ</h5>
                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-12">
                      <div class="col-md-12 col-lg-12">
                        <section class="section">
                          <div class="row">
                            <table style="display:block" class="table table-striped table-responsive">
                              <thead>

                                <tr>
                                  <th style="width: 10px">#</th>
                                  <th>Ad Soyad</th>
                                  <th>Telefon</th>
                                  <th>Proje Adı</th>

                                  <th>Fiyat</th>
                                  <th>Proje Başlangıç</th>
                                  <th>Kalan Gün Sayısı</th>
                                  <th>Proje Durumu</th>
                                  <th>Düzenle</th>
                                  <th>Sil</th>
                                </tr>

                              </thead>
                              <tbody>
                                @foreach($musteriproje as $proje)
                                @foreach($musteriler as  $must)
                                @if($proje-> status == 1)
                                <tr>
                                  <td>{{$proje->id}}</td>

                                  <td>{{$must->adsoyad}}</td>
                                  <td>{{$must->telefon}}</td>
                                  <td>{{$proje->ad}}</td>
                                  <td>{{$proje->fiyat}} ₺</td>
                                  <td>{{$proje->baslangic}}</td>
                                  <td><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-sm"><?php
                                   $tarih1 = strtotime(date('d.m.Y'));
                                   $tarih2 = strtotime($proje->bitis);
                                   $fark = $tarih2 - $tarih1;
                                   echo $sonuc = floor($fark / (60 * 60 * 24));
                                   ?>  Gün kaldı</button></td>
                                <td>  @if($proje->status ==1)
                                  <button class="btn btn-dark btn-sm">Beklemede</button>
                                  @elseif($proje->status ==2)
                                  <button class="btn btn-success btn-sm">Teslim Edildi</button>
                                  @endif</td>
                                  <td><a href="{{route('projeduzenle', $proje->id)}}" class="btn btn-outline-warning btn-sm">Düzenle</a></td>
                                  <td><a href="{{route('projesil', $proje->id)}}" class="btn btn-outline-danger btn-sm">Sil</a></td>

                                </tr>
                                @endif
                                  @endforeach
                                @endforeach

                              </tbody>
                            </table>
                              {{$musteriproje->links()}}
                          </div>
                        </section>
                      </div>
                    </div>


                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @include('partials.footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
