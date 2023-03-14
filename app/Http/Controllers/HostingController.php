<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hosting;
use App\Models\Musteri;
use App\Models\Domain;
use App\Models\Proje;
use App\Models\Hizmet;
class HostingController extends Controller
{
  public function index(){
   $musteriler = Musteri::get();
   $hostingler = Hosting::get();

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


 return view('admin.hosting', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','hostingler','bildirim_sayisi_host','bildirim_sayisi_proje','odemegecmisdomain','bildirim_sayisi','musteriler'));
}

public function hostingsuresibitmis(){
  $musteriler = Musteri::get();
  $hostingler = Hosting::get();
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



  return view('admin.hostingsuresibitmis', compact('odemegecmishizmet,','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','hostingler','musteriler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain'));

}

   public function hostingekle(){
     $musteriler = Musteri::get();
     $hostingler = Hosting::get();
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
   return view('admin.hostingekle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','hostingler','bildirim_sayisi_host','bildirim_sayisi_proje','odemegecmisdomain','bildirim_sayisi','musteriler'));
  }

  public function hostingEklePost(Request $request){
    $request ->validate([

      'hostingad'=>'required',
      'hostingfiyat'=>'required',
      'hostingbaslangic'=>'required',
      'hostingbitis'=>'required'


    ]);

    Hosting::create([
      'musteriler'=>$request->musteriler,
      'hostingad'=>$request->hostingad,
      'hostingfiyat'=>$request->hostingfiyat,
      'hostingbaslangic'=>$request->hostingbaslangic,
      'hostingbitis'=>$request->hostingbitis

    ]);

    return redirect()->route('hosting');
  }

  public function hostingduzenle($id){
    $musteriler = Musteri::get();
    $hostingler = Hosting::whereId($id)->first();
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
    return view('admin.hostingduzenle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','hostingler'));
  }

  public function hostingduzenlepost(Request $request, $id){



    Hosting::whereId($id)->update([
      'musteriler'=>$request->musteriler,
      'hostingad'=>$request->hostingad,
      'hostingfiyat'=>$request->hostingfiyat,
      'hostingbaslangic'=>$request->hostingbaslangic,
      'hostingbitis'=>$request->hostingbitis,
      'hostingstatus'=>$request->hostingstatus

    ]);

    return redirect()->route('hosting');
  }

  public function hostingsil($id){
    $hostingler = Hosting::whereId($id)->first();

    if ($hostingler) {
      $hostinglerHos = Hosting::whereId($id)->delete();
    }

    return back();
  }
}
