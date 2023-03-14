<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musteri;
use App\Models\Hosting;
use App\Models\Domain;
use App\Models\Proje;
use App\Models\Hizmet;

class musteriController extends Controller
{
   public function index(){

     $musteriler = Musteri::paginate(6);
     $domainler = Domain::paginate(5);



     $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
     $odemegecmisdomain = Domain::where('domainstatus',1)->get();
     $bekleyenprojeler = Proje::where('status',1)->get();
     $odemegecmishizmet = Hizmet::where('hizmetstatus',1)->get();
     $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
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

     return view('admin.musteri', compact('hizmetbildirim','bildirim_sayisi_hizmet','odemegecmishizmet','domainbildirim','hostingbildirim','projebildirim','musteriler','domainler','odemegecmisdomain','odemegecmishosting','bekleyenprojeler','bildirim_sayisi','bildirim_sayisi_host','bildirim_sayisi_proje'));
   }


   public function ekle(){
     $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
     $odemegecmisdomain = Domain::where('domainstatus',1)->get();
     $bekleyenprojeler = Proje::where('status',1)->get();
     $odemegecmishizmet = Hizmet::where('hizmetstatus',1)->get();
     $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
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

    return view('admin.musteriekle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','odemegecmisdomain','odemegecmishosting','bekleyenprojeler','bildirim_sayisi','bildirim_sayisi_host','bildirim_sayisi_proje'));
   }

   public function eklePost(Request $request){
     $request -> validate([
       'adsoyad'=>'required',
       'telefon'=>'required|max:11',
       'mail'=>'email',
       'adres'=>'required',
       'meslek'=>'required|min:3|max:10',
       'adres'=>'required',
       'il'=>'required',
       'ilce'=>'required'
     ]);



     Musteri::create([
       'adsoyad'=>$request->adsoyad,
       'telefon'=>$request->telefon,
       'mail'=>$request->mail,
       'adres'=>$request->adres,
       'meslek'=>$request->meslek,
       'il'=>$request->il,
       'ilce'=>$request->ilce
     ]);

     return redirect()->route('musteri');
   }

   public function musteriduzenle($id){
     $musteriler = Musteri::whereId($id)->first();
     $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
     $odemegecmisdomain = Domain::where('domainstatus',1)->get();
     $bekleyenprojeler = Proje::where('status',1)->get();
     $odemegecmishizmet = Hizmet::where('hizmetstatus',1)->get();
     $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
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

       return view('admin.musteriduzenle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','musteriler','odemegecmisdomain','odemegecmishosting','bekleyenprojeler','bildirim_sayisi','bildirim_sayisi_host','bildirim_sayisi_proje'));


   }

   public function musteriduzenlepost(Request $request, $id){

       $request -> validate([
         'adsoyad'=>'required',
         'telefon'=>'required|max:11',
         'mail'=>'email',
         'adres'=>'required',
         'meslek'=>'required',
         'adres'=>'required',
         'il'=>'required',
         'ilce'=>'required'
       ]);

       Musteri::whereId($id)->update([
         'adsoyad'=>$request->adsoyad,
         'telefon'=>$request->telefon,
         'mail'=>$request->mail,
         'adres'=>$request->adres,
         'meslek'=>$request->meslek,
         'il'=>$request->il,
         'ilce'=>$request->ilce,
         'musteristatus'=>$request->musteristatus
       ]);

       return redirect()->route('musteri')->with('success','Güncelleme işlemi başarılı');

   }

   public function musteridetay($id){

     $musteriler     = Musteri::where('id',$id)->get();
     $musterihosting = Hosting::where('musteriler',$id)->paginate(5);
     $musteriproje   = Proje::where('musteriler',$id)->paginate(5);
     $musteridomain  = Domain::where('musteriler',$id)->paginate(5);
     $domainler = Domain::paginate(5);
     $odemegecmishosting = Hosting::where('hostingstatus',1)->get();
     $odemegecmisdomain = Domain::where('domainstatus',1)->get();
     $bekleyenprojeler = Proje::where('status',1)->get();
     $odemegecmishizmet = Hizmet::where('hizmetstatus',1)->get();
     $domainbildirim = Domain::where('domainstatus',1)->paginate(5);
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


    return view('admin.musteridetay', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','musteridomain','musterihosting','musteriproje','musteriler','domainler','odemegecmisdomain','odemegecmishosting','bekleyenprojeler','bildirim_sayisi','bildirim_sayisi_host','bildirim_sayisi_proje'));
   }

   public function musterisil($id){
     $musteriler = Musteri::whereId($id)->first();

     if ($musteriler) {
       $musteriler = Musteri::whereId($id)->delete();
     }

     return back();
   }
}
