<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bildirim;
use App\Models\Domain;
use App\Models\Musteri;
use App\Models\Hosting;
use App\Models\Proje;
use App\Models\Hizmet;
class BildirimController extends Controller
{
  public function index(){
    $musteriler = Musteri::all();
    $domainler = Domain::paginate(5);
    $hostingler = Hosting::paginate(5);
    $bildirimler=Bildirim::get();
    $bildirimProje = Proje::where('status',1)->get();
    $bildirimHosting = Hosting::where('hostingstatus',1)->get();
    $bildirimDomain = Domain::where('domainstatus',1)->get();
    $bildirimhizmet = Hizmet::where('hizmetstatus',1)->get();

    $hizmetbildirim = Hizmet::where('hizmetstatus',1)->paginate(5);
    $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
    $hostingbildirim = Hosting::where('hostingstatus',1)->paginate(7);
    $projebildirim = Proje::where('status',1)->paginate(7);
    $bildirim_sayisi = [];
    $bildirim_sayisi_host= [];
    $bildirim_sayisi_proje = [];
    $bildirim_sayisi_hizmet = [];

    foreach ($bildirimDomain as $dom) {

      $tarih1 = strtotime($dom->domainbaslangic);
      $tarih2 = strtotime($dom->domainbitis);
      $fark = $tarih2 - $tarih1;
      $sonuc = floor($fark / (60 * 60 * 24));
    if($sonuc<15){
      $bildirim_sayisi[]=$dom;
    }
  }

  foreach ($bildirimHosting as $host) {

    $tarih1 = strtotime($host->hostingbaslangic);
    $tarih2 = strtotime($host->hostingbitis);
    $fark = $tarih2 - $tarih1;
    $sonuc = floor($fark / (60 * 60 * 24));
  if($sonuc<15){
    $bildirim_sayisi_host[]=$host;
  }
}

foreach ($bildirimProje as $proje) {

  $tarih1 = strtotime($proje->baslangic);
  $tarih2 = strtotime($proje->bitis);
  $fark = $tarih2 - $tarih1;
  $sonuc = floor($fark / (60 * 60 * 24));
if($sonuc<15){
  $bildirim_sayisi_proje[]=$proje;
}
}
foreach ($bildirimhizmet as $proje) {

  $tarih1 = strtotime($proje->baslangic);
  $tarih2 = strtotime($proje->bitis);
  $fark = $tarih2 - $tarih1;
  $sonuc = floor($fark / (60 * 60 * 24));
if($sonuc<15){
  $bildirim_sayisi_hizmet[]=$proje;
}
}

    return view('admin.bildirim', compact('bildirimhizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_proje','bildirim_sayisi_host','bildirim_sayisi','hostingler','domainler','musteriler','bildirimProje','bildirimHosting','bildirimDomain','bildirimler'));
  }


}
