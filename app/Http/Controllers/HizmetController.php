<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hizmet;
use App\Models\Musteri;
use App\Models\Hosting;
use App\Models\Proje;
use App\Models\Domain;

class HizmetController extends Controller
{
  public function index(){
    $musteriler = Musteri::get();
    $hizmetler = Hizmet::paginate(12);

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



    return view('admin.hizmet', compact('odemegecmishizmet','bildirim_sayisi_hizmet','hizmetbildirim','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','hizmetler','musteriler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain'));

  }

  public function hizmetsuresibitmis(){
    $musteriler = Musteri::get();
    $hizmetler = Hizmet::get();

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



    return view('admin.hizmetsuresibitmis', compact('odemegecmishizmet','bildirim_sayisi_hizmet','hizmetbildirim','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','hizmetler','musteriler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain'));

  }

  public function hizmetekle(){
    $musteriler = Musteri::get();
    $hizmetler = Hizmet::paginate(5);
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
    return view('admin.hizmetekle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','hizmetler'));
  }


  public function hizmeteklepost(Request $request){

    $request -> validate([
      'hizmetad'=>'required',
      'hizmetfiyat'=>'required',
      'hizmetbaslangic'=>'required',
      'hizmetbitis'=>'required'
    ]);

    Hizmet::create([
      'musteriler'=>$request->musteriler,
      'hizmetad'=>$request->hizmetad,
      'hizmetfiyat'=>$request->hizmetfiyat,
      'hizmetbaslangic'=>$request->hizmetbaslangic,
      'hizmetbitis'=>$request->hizmetbitis

    ]);

    return redirect()->route('domain');
  }

  public function hizmetduzenle($id){
    $musteriler = Musteri::get();
    $hizmetler = Hizmet::whereId($id)->first();
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
    return view('admin.hizmetduzenle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','hizmetler'));
  }

  public function hizmetduzenlepost(Request $request, $id){



    Hizmet::whereId($id)->update([
      'musteriler'=>$request->musteriler,
      'hizmetad'=>$request->hizmetad,
      'hizmetfiyat'=>$request->hizmetfiyat,
      'hizmetbaslangic'=>$request->hizmetbaslangic,
      'hizmetbitis'=>$request->hizmetbitis,
      'hizmetstatus'=>$request->hizmetstatus

    ]);

    return redirect()->route('hizmet');
  }

  public function hizmetsil($id){
    $hizmetler = Hizmet::whereId($id)->first();

    if ($hizmetler) {
      $hizmetler = Hizmet::whereId($id)->delete();
    }

    return back();
  }

}
