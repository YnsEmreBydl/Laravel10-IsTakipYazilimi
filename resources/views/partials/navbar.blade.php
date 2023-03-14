<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-globe"></i>



        <span class="badge bg-warning badge-number">{{count($bildirim_sayisi)}}</span>



      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          YAKLAŞAN DOMAİNLER
          <a href="{{route('bildirim')}}"><span class="badge rounded-pill bg-warning p-2 ms-2">Tümünü Görüntüle</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
  @foreach($domainbildirim as $dom)
  <?php
  $tarih1 = strtotime($dom->domainbaslangic);
  $tarih2 = strtotime($dom->domainbitis);
  $fark = $tarih2 - $tarih1;
  $sonuc = floor($fark / (60 * 60 * 24));
?>
        @if($sonuc < 15)
        <li class="notification-item">
          <i class="bi bi-globe text-warning"></i>
          <div>
            <h4>{{$dom->domainad}}</h4>

            <p><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-sm">
            {{$sonuc}}
           Gün kaldı</button></p>

          </div>
        </li>
        @endif
    @endforeach
        <li>
          <hr class="dropdown-divider">
        </li>



      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->
    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-menu-button-wide"></i>


        <span class="badge bg-success badge-number">{{count($bildirim_sayisi_host)}}  </span>

      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          YAKLAŞAN HOSTİNGLER
          <a href="{{route('bildirim')}}"><span class="badge rounded-pill bg-success p-2 ms-2">Tümünü Görüntüle</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
  @foreach($hostingbildirim as $host)
  <?php
  $tarih1 = strtotime($host->hostingbaslangic);
  $tarih2 = strtotime($host->hostingbitis);
  $fark = $tarih2 - $tarih1;
  $sonuc = floor($fark / (60 * 60 * 24));
?>
        @if($sonuc < 15)
        <li class="notification-item">
          <i class="bi bi-menu-button-wide text-success"></i>
          <div>
            <h4>{{$host->hostingad}}</h4>

            <p><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-sm">
            {{$sonuc}}
           Gün kaldı</button></p>

          </div>
        </li>
        @endif
    @endforeach
        <li>
          <hr class="dropdown-divider">
        </li>



      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-laptop"></i>


        <span class="badge bg-primary badge-number">{{count($bildirim_sayisi_proje)}}  </span>

      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          BEKLEYEN PROJELER
          <a href="{{route('bildirim')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Tümünü Görüntüle</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
  @foreach($projebildirim as $por)
  <?php
  $tarih1 = strtotime($por->baslangic);
  $tarih2 = strtotime($por->bitis);
  $fark = $tarih2 - $tarih1;
  $sonuc = floor($fark / (60 * 60 * 24));
?>
        @if($sonuc < 15)
        <li class="notification-item">
          <i class="bi bi-laptop text-primary"></i>
          <div>
            <h4>{{$por->ad}}</h4>

            <p><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-sm">
            {{$sonuc}}
           Gün kaldı</button></p>

          </div>
        </li>
        @endif
    @endforeach
        <li>
          <hr class="dropdown-divider">
        </li>



      </ul><!-- End Notification Dropdown Items -->

    </li>


        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-trophy"></i>


            <span class="badge bg-info badge-number">{{count($bildirim_sayisi_hizmet)}}  </span>

          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
            YAKLAŞAN HİZMETLER
              <a href="{{route('bildirim')}}"><span class="badge rounded-pill bg-primary p-2 ms-2">Tümünü Görüntüle</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
      @foreach($hizmetbildirim as $por)
      <?php
      $tarih1 = strtotime($por->hizmetbaslangic);
      $tarih2 = strtotime($por->hizmetbitis);
      $fark = $tarih2 - $tarih1;
      $sonuc = floor($fark / (60 * 60 * 24));
    ?>
            @if($sonuc < 15)
            <li class="notification-item">
              <i class="bi bi-trophy text-info"></i>
              <div>
                <h4>{{$por->hizmetad}}</h4>

                <p><button style="background:darkblue; width:150px; border: none; color:white;" class="btn btn-sm">
                {{$sonuc}}
               Gün kaldı</button></p>

              </div>
            </li>
            @endif
        @endforeach
            <li>
              <hr class="dropdown-divider">
            </li>



          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">

        <span class="d-none d-md-block dropdown-toggle ps-2">isim gelecek</span>

      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Kevin Anderson</h6>
          <span>Web Designer</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->
