<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Domain;
use App\Models\Proje;
use App\Models\Hosting;
use App\Models\Hizmet;
use DB;
class IstatistikController extends Controller
{
    public function istatistik(){
      $bestdomain = DB::select("
      SELECT domainad, sum(domainfiyat) domainfiyat
      from domain inner join musteri on musteri.id=domain.musteriler GROUP BY domainad order by sum(domainfiyat) desc limit 5




      ");

      $besthosting = DB::select("
      SELECT hostingad, sum(hostingfiyat) hostingfiyat
      from hosting inner join musteri on musteri.id=hosting.musteriler GROUP BY hostingad order by sum(hostingfiyat) desc limit 5




      ");

      $bestproje = DB::select("
      SELECT ad, sum(fiyat) fiyat
      from proje inner join musteri on musteri.id=proje.musteriler GROUP BY ad order by sum(fiyat) desc limit 5




      ");

      $bestmusteri = DB::select("
      SELECT adsoyad, sum(domainfiyat) domainfiyat
      from domain inner join musteri on musteri.id=domain.musteriler GROUP BY adsoyad order by sum(domainfiyat) desc limit 5




      ");

      $musteriler = Musteri::all();
      $domainler = Domain::paginate(5);
      $bekleyenprojeler = Proje::where('status',1)->get();
      $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
      $odemegecmisdomain = Domain::where('domainstatus',1)->get();
      $odemegecmishizmet = Hizmet::where('hizmetstatus',1)->get();
      $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
      $hostingbildirim = Hosting::where('hostingstatus',1)->paginate(7);
      $projebildirim = Proje::where('status',1)->paginate(7);
      $hizmetbildirim = Hizmet::where('hizmetstatus',1)->paginate(5);

      $bildirim_sayisi = [];
      $bildirim_sayisi_host= [];
      $bildirim_sayisi_proje = [];
      $bildirim_sayisi_hizmet = [];
      foreach ($odemegecmisdomain as $dom) {

        $tarih1 = strtotime($dom->domainbaslangic);
        $tarih2 = strtotime($dom->domainbitis);
        $fark = $tarih2 - $tarih1;
        $sonuc = floor($fark / (60 * 60 * 24));
      if($sonuc<15){
        $bildirim_sayisi[]=$dom;
      }
    }

    foreach ($odemegecmishosting as $host) {

      $tarih1 = strtotime($host->hostingbaslangic);
      $tarih2 = strtotime($host->hostingbitis);
      $fark = $tarih2 - $tarih1;
      $sonuc = floor($fark / (60 * 60 * 24));
    if($sonuc<15){
      $bildirim_sayisi_host[]=$host;
    }
  }

  foreach ($bekleyenprojeler as $proje) {

    $tarih1 = strtotime($proje->baslangic);
    $tarih2 = strtotime($proje->bitis);
    $fark = $tarih2 - $tarih1;
    $sonuc = floor($fark / (60 * 60 * 24));
  if($sonuc<15){
    $bildirim_sayisi_proje[]=$proje;
  }
  }

  foreach ($odemegecmishizmet as $proje) {

    $tarih1 = strtotime($proje->baslangic);
    $tarih2 = strtotime($proje->bitis);
    $fark = $tarih2 - $tarih1;
    $sonuc = floor($fark / (60 * 60 * 24));
  if($sonuc<15){
    $bildirim_sayisi_hizmet[]=$proje;
  }
  }


      return view('admin.istatistik',compact('odemegecmishizmet','bildirim_sayisi_hizmet','hizmetbildirim','domainbildirim','hostingbildirim','projebildirim','bestmusteri','bestproje','besthosting','bestdomain','bildirim_sayisi_proje','bildirim_sayisi_host','musteriler','domainler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain','bildirim_sayisi'));

    }
}
