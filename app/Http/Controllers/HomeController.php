<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Proje;
use App\Models\Hosting;
use App\Models\Domain;
use App\Models\Hizmet;
class HomeController extends Controller
{
    public function index(){
      $musteriler = Musteri::all();
      $domainler = Domain::get();
      $bekleyenprojeler = Proje::where('status',1)->get();
      $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
      $odemegecmisdomain = Domain::where('domainstatus',1)->get();
      $suresigecmishosting = Hosting::where('hostingstatus',2)->get();
      $suresigecmissdomain = Domain::where('domainstatus',2)->get();
      $odemegecmishizmet = Hizmet::where('hizmetstatus',1)->get();
      $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
      $hostingbildirim = Hosting::where('hostingstatus',1)->paginate(5);
      $projebildirim = Proje::where('status',1)->paginate(5);
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




      return view('admin.home',compact('odemegecmishizmet','bildirim_sayisi_hizmet','hizmetbildirim','domainbildirim','hostingbildirim','projebildirim','suresigecmishosting','suresigecmissdomain','bildirim_sayisi_proje','bildirim_sayisi_host','musteriler','domainler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain','bildirim_sayisi'));
    }
}
