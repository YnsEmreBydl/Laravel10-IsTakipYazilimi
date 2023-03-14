<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Domain;
use App\Models\Proje;
use App\Models\Hosting;
use App\Models\Hizmet;
class OdemeController extends Controller
{

    public function index()
    {

          $odemeler = Odeme::all();
          $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
          $odemegecmisdomain = Domain::where('domainstatus',1)->get();
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
          return view('admin.odeme', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','odemeler','odemegecmisdomain','odemegecmishosting','bekleyenprojeler'));
    }

    public function odenmemis(){
      $odemeler = Odeme::get();

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


      return view('admin.odenmemis', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','odemeler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain'));

    }


    public function odemeekle()
    {
      $odemeler = Odeme::all();
      $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
      $odemegecmisdomain = Domain::where('domainstatus',1)->get();
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
          return view('admin.odemeekle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','odemegecmishosting','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','odemeler','odemegecmisdomain'));
    }


    public function odemeeklepost(Request $request){
      $request -> validate([
        'aciklama'=>'required',
        'tutar'=>'required',
        'zaman'=>'required'
      ]);




      Odeme::create([
        'aciklama'=>$request->aciklama,
        'tutar'=>$request->tutar,
        'zaman'=>$request->zaman,
        'odemedurum'=>$request->odemedurum
      ]);

      return redirect()->route('odeme');
    }

    public function odemeduzenle($id){

      $odemeler = Odeme::whereId($id)->first();
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
      return view('admin.odemeduzenle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','odemegecmishosting','odemegecmisdomain','odemeler'));
    }

    public function odemeduzenlepost(Request $request, $id){



      Odeme::whereId($id)->update([
        'aciklama'=>$request->aciklama,
        'tutar'=>$request->tutar,
        'zaman'=>$request->zaman,
        'odemedurum'=>$request->odemedurum
      ]);

      return redirect()->route('odeme');
    }

    public function odemesil($id){
      $odemeler = Odeme::whereId($id)->first();

      if ($odemeler) {
        $odemeler = Odeme::whereId($id)->delete();
      }

      return back();
    }
}
