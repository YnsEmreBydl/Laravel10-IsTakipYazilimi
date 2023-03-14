<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Musteri;
use App\Models\Hosting;
use App\Models\Proje;
use App\Models\Hizmet;
class DomainlerController extends Controller
{
  public function index(){
    $musteriler = Musteri::get();
    $domainler = Domain::orderBy('domainbitis','asc')->paginate(10);

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


    return view('admin.domain', compact('bildirim_sayisi_hizmet','hizmetbildirim','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','domainler','musteriler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain','odemegecmishizmet'));

  }

  public function domainsuresibitmis(){
    $musteriler = Musteri::get();
    $domainler = Domain::get();

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



    return view('admin.domainsuresibitmis', compact('hizmetbildirim','odemegecmishizmet','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','domainler','musteriler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain'));

  }

  public function domainekle(){
    $musteriler = Musteri::get();
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
    return view('admin.domainekle', compact('hizmetbildirim','odemegecmishizmet','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','domainler'));
  }


  public function domaineklepost(Request $request){

    $request -> validate([
      'domainad'=>'required',
      'domainfiyat'=>'required',
      'domainbaslangic'=>'required',
      'domainbitis'=>'required'
    ]);

    Domain::create([
      'musteriler'=>$request->musteriler,
      'domainad'=>$request->domainad,
      'domainfiyat'=>$request->domainfiyat,
      'domainbaslangic'=>$request->domainbaslangic,
      'domainbitis'=>$request->domainbitis

    ]);

    return redirect()->route('domain');
  }

  public function domainyenile($id){
    $musteriler = Musteri::get();
    $domainler = Domain::whereId($id)->first();
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
    return view('admin.domainyenile', compact('hizmetbildirim','odemegecmishizmet','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','domainler'));
  }

  public function domainduzenle($id){
    $musteriler = Musteri::get();
    $domainler = Domain::whereId($id)->first();
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
    return view('admin.domainduzenle', compact('hizmetbildirim','odemegecmishizmet','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','domainler'));
  }

  public function domainduzenlepost(Request $request, $id){



    Domain::whereId($id)->update([
      'musteriler'=>$request->musteriler,
      'domainad'=>$request->domainad,
      'domainfiyat'=>$request->domainfiyat,
      'domainbaslangic'=>$request->domainbaslangic,
      'domainbitis'=>$request->domainbitis,
      'domainstatus'=>$request->domainstatus

    ]);

    return redirect()->route('domain');
  }

  public function domainyenilepost(Request $request, $id){




    Domain::whereId($id)->update([

      'domainfiyat'=>$request->domainfiyat,

      'domainbitis'=>$request->domainbitis


    ]);

    return redirect()->route('domain');
  }


  public function domainsil($id){
    $domainler = Domain::whereId($id)->first();

    if ($domainler) {
      $domainler = Domain::whereId($id)->delete();
    }

    return back();
  }

}
