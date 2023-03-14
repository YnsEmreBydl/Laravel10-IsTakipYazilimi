<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\musteriController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\DomainlerController;
use App\Http\Controllers\ProjeController;
use App\Http\Controllers\OdemeController;
use App\Http\Controllers\GelirGiderController;
use App\Http\Controllers\BildirimController;
use App\Http\Controllers\KasaController;
use App\Http\Controllers\IstatistikController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HizmetController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');
Route::get('/register', [AdminController::class, 'register'])->name('register');
Route::post('/registerpost', [AdminController::class, 'registerpost'])->name('registerpost');
Route::get('/cikis', [AdminController::class, 'cikis'])->name('cikis');
      Route::group(['middleware'=>'auth'], function(){
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/musteri', [musteriController::class, 'index'])->name('musteri');
Route::get('/musteriekle', [musteriController::class, 'ekle'])->name('ekle');
Route::post('/eklePost', [musteriController::class, 'eklePost'])->name('eklePost');
Route::get('/musteridetay/{id}', [musteriController::class, 'musteridetay'])->name('musteridetay');
Route::get('/musteriduzenle/{id}', [musteriController::class, 'musteriduzenle'])->name('musteriduzenle');
Route::post('/musteriduzenlepost/{id}', [musteriController::class, 'musteriduzenlepost'])->name('musteriduzenlepost');
Route::get('/musterisil/{id}', [musteriController::class, 'musterisil'])->name('musterisil');
Route::get('/hosting', [HostingController::class, 'index'])->name('hosting');
Route::get('/hostingsuresibitmis',  [HostingController::class, 'hostingsuresibitmis'])->name('hostingsuresibitmis');
Route::get('/hostingekle', [HostingController::class, 'hostingekle'])->name('hostingekle');
Route::post('/hostingEklePost', [HostingController::class, 'hostingEklePost'])->name('hostingEklePost');
Route::get('/hostingduzenle/{id}', [HostingController::class, 'hostingduzenle'])->name('hostingduzenle');
Route::post('/hostingduzenlepost/{id}', [HostingController::class, 'hostingduzenlepost'])->name('hostingduzenlepost');
Route::get('/hostingsil/{id}', [HostingController::class, 'hostingsil'])->name('hostingsil');
Route::get('/proje', [ProjeController::class, 'index'])->name('proje');
Route::get('/bekleyenprojeler', [ProjeController::class, 'bekleyenprojeler'])->name('bekleyenprojeler');
Route::get('/projeekle', [ProjeController::class, 'projeekle'])->name('projeekle');
Route::post('/projeEklePost', [ProjeController::class, 'projeEklePost'])->name('projeEklePost');
Route::get('/projeduzenle/{id}', [ProjeController::class, 'projeduzenle'])->name('projeduzenle');
Route::post('/projeduzenlepost/{id}', [ProjeController::class, 'projeduzenlepost'])->name('projeduzenlepost');
Route::get('/projesil/{id}', [ProjeController::class, 'projesil'])->name('projesil');
Route::get('/domain',  [DomainlerController::class, 'index'])->name('domain');
Route::get('/domainsuresibitmis',  [DomainlerController::class, 'domainsuresibitmis'])->name('domainsuresibitmis');
Route::get('/domainekle', [DomainlerController::class, 'domainekle'])->name('domainekle');
Route::post('/domaineklepost', [DomainlerController::class, 'domaineklepost'])->name('domaineklepost');
Route::get('/domainduzenle/{id}', [DomainlerController::class, 'domainduzenle'])->name('domainduzenle');
Route::post('/domainduzenlepost/{id}', [DomainlerController::class, 'domainduzenlepost'])->name('domainduzenlepost');
Route::get('/domainsil/{id}', [DomainlerController::class, 'domainsil'])->name('domainsil');
Route::get('/domainyenile/{id}', [DomainlerController::class, 'domainyenile'])->name('domainyenile');
Route::post('/domainyenilepost/{id}', [DomainlerController::class, 'domainyenilepost'])->name('domainyenilepost');
Route::get('/hizmet',  [HizmetController::class, 'index'])->name('hizmet');
Route::get('/hizmetsuresibitmis',  [HizmetController::class, 'hizmetsuresibitmis'])->name('hizmetsuresibitmis');
Route::get('/hizmetekle', [HizmetController::class, 'hizmetekle'])->name('hizmetekle');
Route::post('/hizmeteklepost', [HizmetController::class, 'hizmeteklepost'])->name('hizmeteklepost');
Route::get('/hizmetduzenle/{id}', [HizmetController::class, 'hizmetduzenle'])->name('hizmetduzenle');
Route::post('/hizmetduzenlepost/{id}', [HizmetController::class, 'hizmetduzenlepost'])->name('hizmetduzenlepost');
Route::get('/hizmetsil/{id}', [HizmetController::class, 'hizmetsil'])->name('hizmetsil');
Route::get('/odeme',  [OdemeController::class, 'index'])->name('odeme');
Route::get('/odenmemis',  [OdemeController::class, 'odenmemis'])->name('odenmemis');
Route::get('/odemeekle', [OdemeController::class, 'odemeekle'])->name('odemeekle');
Route::post('/odemeeklepost', [OdemeController::class, 'odemeeklepost'])->name('odemeeklepost');
Route::get('/odemeduzenle/{id}', [OdemeController::class, 'odemeduzenle'])->name('odemeduzenle');
Route::post('/odemeduzenlepost/{id}', [OdemeController::class, 'odemeduzenlepost'])->name('odemeduzenlepost');
Route::get('/odemesil/{id}', [OdemeController::class, 'odemesil'])->name('odemesil');
Route::get('/gelirgiderler', [GelirGiderController::class, 'index'])->name('gelirgiderler');
Route::get('/kasa', [KasaController::class, 'index'])->name('kasa');
Route::get('/bildirim', [BildirimController::class, 'index'])->name('bildirim');
Route::get('/istatistik', [IstatistikController::class, 'istatistik'])->name('istatistik');


});
