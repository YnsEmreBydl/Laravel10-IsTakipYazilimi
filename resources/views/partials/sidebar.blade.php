<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{route('home')}}">
        <i class="bi bi-house-fill"></i>
        <span>Anasayfa</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Müşteriler</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('musteri')}}">
            <i class="bi bi-circle"></i><span>Müşteri Listesi</span>
          </a>
        </li>
        <li>
          <a href="{{route('ekle')}}">
            <i class="bi bi-circle"></i><span>Müşteri Ekle</span>
          </a>
        </li>

      </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-globe"></i><span>Domainler</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('domain')}}">
            <i class="bi bi-circle"></i><span>Domain Listesi</span>
          </a>
        </li>
        <li>
          <a href="{{route('domainekle')}}">
            <i class="bi bi-circle"></i><span>Domain Ekle</span>
          </a>
        </li>

      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Hostingler</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('hosting')}}">
            <i class="bi bi-circle"></i><span>Hosting Listesi</span>
          </a>
        </li>
        <li>
          <a href="{{route('hostingekle')}}">
            <i class="bi bi-circle"></i><span>Hosting Ekle</span>
          </a>
        </li>
      </ul>
    </li><!-- End Tables Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-laptop"></i><span>Projeler</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('proje')}}">
            <i class="bi bi-circle"></i><span>Proje Listesi</span>
          </a>
        </li>
        <li>
          <a href="{{route('projeekle')}}">
            <i class="bi bi-circle"></i><span>Proje Ekle</span>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#charts-nav1" data-bs-toggle="collapse" href="#">
        <i class="bi bi-trophy"></i><span>Hizmetler</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="charts-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{route('hizmet')}}">
            <i class="bi bi-circle"></i><span>Hizmet Listesi</span>
          </a>
        </li>
        <li>
          <a href="{{route('hizmetekle')}}">
            <i class="bi bi-circle"></i><span>Hizmet Ekle</span>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('odeme')}}">
        <i class="bi bi-cash-coin"></i>
        <span>Gelirler</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('odeme')}}">
        <i class="bi bi-cash-coin"></i>
        <span>Giderler</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('gelirgiderler')}}">
        <i class="bi bi-coin"></i>
        <span>Gelir/Gider Tablosu</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('kasa')}}">
        <i class="ri-safe-2-line"></i>
        <span>Kasa</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('bildirim')}}">
        <i class="bi bi-bell"></i>
        <span>Bildirimler  <span class="btn btn-warning btn-sm">{{count($bildirim_sayisi)}}</span><span style="margin-left:5px;" class="btn btn-success btn-sm">{{count($bildirim_sayisi_host)}}</span><span style="margin-left:5px;" class="btn btn-primary btn-sm">{{count($bildirim_sayisi_proje)}}</span><span style="margin-left:5px;" class="btn btn-info btn-sm">{{count($bildirim_sayisi_hizmet)}}</span></span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('istatistik')}}">
        <i class="bi bi-graph-up"></i>
        <span>İstatistikler</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="index.html">
        <i class="bi bi-person-square"></i>
        <span>Profilim</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="index.html">
        <i class="bi bi-gear"></i>
        <span>Ayarlar</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('cikis')}}">
        <i class="bi bi-power"></i>
        <span>Çıkış</span>
      </a>
    </li>

  </ul>

</aside><!-- End Sidebar-->
