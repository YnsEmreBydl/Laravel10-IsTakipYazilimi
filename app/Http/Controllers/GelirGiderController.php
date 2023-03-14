<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;

use App\Models\Hosting;
use App\Models\Domain;
use App\Models\Proje;
use App\Models\Hizmet;
class GelirGiderController extends Controller
{
    public function index(){

      $gunlukGelirHost = Hosting::where('hostingstatus',1)->whereDay('hostingbaslangic', '=', date('d'))->get();
      $gunluktoplamhost = $gunlukGelirHost->sum('hostingfiyat');
      $gunlukGelirDom = Domain::where('domainstatus',1)->whereDay('domainbaslangic', '=', date('d'))->get();
      $gunluktoplamdom = $gunlukGelirDom->sum('domainfiyat');
      $gunlukGelirPro = Proje::where('status',2)->whereDay('baslangic', '=', date('d'))->get();
      $gunluktoplamPro = $gunlukGelirPro->sum('fiyat');

      $gunlukGelirToplam = ($gunluktoplamhost) + ($gunluktoplamdom) + ($gunluktoplamPro);

      $aylikGelirHost = Hosting::where('hostingstatus',1)->whereMonth('hostingbaslangic', '=', date('m'))->get();
      $ayliktoplamhost = $aylikGelirHost->sum('hostingfiyat');
      $aylikGelirDom = Domain::where('domainstatus',1)->whereMonth('domainbaslangic', '=', date('m'))->get();
      $ayliktoplamdom = $aylikGelirDom->sum('domainfiyat');
      $aylikGelirPro = Proje::where('status',2)->whereMonth('baslangic', '=', date('m'))->get();
      $ayliktoplamPro = $aylikGelirPro->sum('fiyat');

      $aylikGelirToplam = ($ayliktoplamhost) + ($ayliktoplamdom) + ($ayliktoplamPro);

      $yillikGelirHost = Hosting::where('hostingstatus',1)->whereYear('hostingbaslangic', '=', date('Y'))->get();
      $yilliktoplamhost = $yillikGelirHost->sum('hostingfiyat');
      $yillikGelirDom = Domain::where('domainstatus',1)->whereYear('domainbaslangic', '=', date('Y'))->get();
      $yilliktoplamdom = $yillikGelirDom->sum('domainfiyat');
      $yillikGelirPro = Proje::where('status',2)->whereYear('baslangic', '=', date('Y'))->get();
      $yilliktoplamPro = $yillikGelirPro->sum('fiyat');

      $yillikGelirToplam =  ($yilliktoplamhost) + ($yilliktoplamdom) + ($yilliktoplamPro);

      $gunlukGider = Odeme::where('odemedurum',2)->whereDay('zaman', '=', date('d'))->get();

      $gunlukToplam = $gunlukGider->sum('tutar');

      $aylikGider = Odeme::where('odemedurum',2)->whereMonth('zaman', '=', date('m'))->get();

      $ayliktoplam = $aylikGider->sum('tutar');

      $yillikGider = Odeme::where('odemedurum',2)->whereYear('zaman', '=', date('Y'))->get();

      $yilliktoplam = $yillikGider->sum('tutar');













      $domainler = Domain::paginate(5);


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


      return view('admin.gelirgider',compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','domainler','odemegecmishosting','odemegecmisdomain','gunlukGelirToplam','aylikGelirToplam','yillikGelirToplam','gunlukToplam','ayliktoplam','yilliktoplam'));
    }
}
