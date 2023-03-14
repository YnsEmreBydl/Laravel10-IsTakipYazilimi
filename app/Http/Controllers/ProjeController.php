<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proje;
use App\Models\Musteri;
use App\Models\Domain;
use App\Models\Hosting;
use App\Models\Hizmet;
class ProjeController extends Controller
{
   public function index(){
     $musteriler = Musteri::get();
     $projeler = Proje::get();
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
      return view('admin.proje',compact('odemegecmishizmet','bildirim_sayisi_hizmet','hizmetbildirim','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','projeler','odemegecmishosting','odemegecmisdomain','bekleyenprojeler','domainler'));
   }
   public function bekleyenprojeler(){
     $musteriler = Musteri::get();
     $projeler = Proje::get();

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



     return view('admin.bekleyenprojeler', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','projeler','musteriler','bekleyenprojeler','odemegecmishosting','odemegecmisdomain'));

   }
   public function projeekle(){
     $musteriler = Musteri::all();
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
     return view('admin.projeekle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bildirim_sayisi_host','bildirim_sayisi_proje','odemegecmishosting','bekleyenprojeler','odemegecmisdomain','bildirim_sayisi','musteriler'));
   }

   public function projeEklePost(Request $request){
        $request->validate([
          'ad'=>'required',
          'fiyat'=>'required',
          'baslangic'=>'required',
          'bitis'=>'required'
        ]);
        Proje::create([
          'musteriler'=>$request->musteriler,
          'ad'=>$request->ad,
          'fiyat'=>$request->fiyat,
          'aciklama'=>$request->aciklama,
          'baslangic'=>$request->baslangic,
          'bitis'=>$request->bitis

        ]);


        return redirect()->route('proje');

   }
   public function projeduzenle($id){
     $musteriler = Musteri::get();
     $projeler = Proje::whereId($id)->first();
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
     return view('admin.projeduzenle', compact('odemegecmishizmet','hizmetbildirim','bildirim_sayisi_hizmet','domainbildirim','hostingbildirim','projebildirim','bekleyenprojeler','bildirim_sayisi_host','bildirim_sayisi_proje','bildirim_sayisi','musteriler','odemegecmishosting','odemegecmisdomain','projeler'));
   }

   public function projeduzenlepost(Request $request, $id){



     Proje::whereId($id)->update([
       'musteriler'=>$request->musteriler,
       'ad'=>$request->ad,
       'fiyat'=>$request->fiyat,
       'aciklama'=>$request->aciklama,
       'baslangic'=>$request->baslangic,
       'bitis'=>$request->bitis,
       'status'=>$request->status

     ]);

     return redirect()->route('proje');
   }

   public function projesil($id){
     $projeler = Proje::whereId($id)->first();

     if ($projeler) {
       $projeler = Proje::whereId($id)->delete();
     }

     return back();
   }
}
