<?php

use Illuminate\Support\Facades\Route;
use App\Models\danhmuc;
use App\Models\phim;

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
Route::get('admintrator/login', [App\Http\Controllers\adminController::class, 'login'])->name('adminlogin');

Route::group(['prefix' => 'admintrator','middleware'=>['checkAdmin','auth']], function(){
    Route::get('/', [App\Http\Controllers\adminController::class, 'index'])->name('admin.dashboard');
    Route::get('/them-tap-phim/{slug}', [App\Http\Controllers\tapphimController::class, 'themphim'])->name('themtapphim');
    Route::get('/caidat/meta-seo', [App\Http\Controllers\metaallController::class, 'metaseo'])->name('caidat.metaseo');
    Route::get('/caidat/ql-cauhinh', [App\Http\Controllers\metaallController::class, 'qlcauhinh'])->name('caidat.qlcauhinh');
    Route::get('/caidat/ql-quang-cao', [App\Http\Controllers\quangcaoController::class, 'index'])->name('caidat.quangcao');
    Route::get('/caidat/show-quang-cao', [App\Http\Controllers\quangcaoController::class, 'showquangcao'])->name('caidat.showquangcao');
    Route::get('/caidat/show-view-thong-bao', [App\Http\Controllers\metaallController::class, 'viewthongbao'])->name('caidat.viewthongbao');
    // delete quảng cáo
    Route::delete('/caidat/delete-quangcao',[App\Http\Controllers\quangcaoController::class, 'deletequangcao'])->name('caidat.deletequangcao');
    // thêm slider
    Route::post('/them-slider', [App\Http\Controllers\sliderController::class, 'themslider'])->name('themslider');
    // chỉnh sửa thứ tự slider
    Route::post('/sortable-slider', [App\Http\Controllers\sliderController::class, 'sortslider'])->name('sortslider');
    // trạng thái báo lỗi
    Route::post('/update-trangthai', [App\Http\Controllers\baoloiController::class, 'updatetrangthai'])->name('updatetrangthai');
    // crawler phim
    Route::post('/them-tap-phim-tu-dong', [App\Http\Controllers\tapphimController::class, 'themtapphimtudong'])->name('themtapphimtudong');
    Route::resources([
        'danhmuc' => danhmucController::class,
        'phim' => phimController::class,
        'tapphim' => tapphimController::class,
        'slider' => sliderController::class,
        'baoloi' => baoloiController::class,
        'caidat' => metaallController::class,
        'server' => serverController::class,
    ]);
    // file images
    Route::get('/file', [App\Http\Controllers\adminController::class, 'file'])->name('file');
    // quản lý cấu hình cài đặt
    Route::get('/qlcauhinh', [App\Http\Controllers\metaallController::class, 'cauhinhindex'])->name('cauhinhindex');
    Route::put('put-logo-header', [App\Http\Controllers\metaallController::class, 'update_logo_header'])->name('logoheader');
    Route::put('put-logo-footer', [App\Http\Controllers\metaallController::class, 'update_logo_footer'])->name('logofooter');
    Route::put('put-thongtin-footer', [App\Http\Controllers\metaallController::class, 'update_thongtin_footer'])->name('thongtinfooter');
    // quản lý seo
    Route::put('post-seo-home', [App\Http\Controllers\metaallController::class, 'postseohome'])->name('postseohome');
    Route::put('post-seo-danhmuc', [App\Http\Controllers\metaallController::class, 'postseodanhmuc'])->name('postseodanhmuc');
    Route::put('post-seo-search', [App\Http\Controllers\metaallController::class, 'postseosearch'])->name('postseosearch');
    Route::put('post-seo-timanime', [App\Http\Controllers\metaallController::class, 'postseotimanime'])->name('postseotimanime');
    // quản lý quảng cáo
    Route::post('post-quangcao-home', [App\Http\Controllers\quangcaoController::class, 'postadshome'])->name('postadshome');
    Route::post('post-quangcao-danhmuc', [App\Http\Controllers\quangcaoController::class, 'postadsdanhmuc'])->name('postadsdanhmuc');
    Route::post('post-quangcao-timkiem', [App\Http\Controllers\quangcaoController::class, 'postadstimkiem'])->name('postadstimkiem');
    Route::post('post-quangcao-chitiet', [App\Http\Controllers\quangcaoController::class, 'postadschitiet'])->name('postadschitiet');
    Route::post('post-quangcao-video', [App\Http\Controllers\quangcaoController::class, 'postadsvideo'])->name('postadsvideo');
    // post thông báo từ admin
    Route::put('post-thongbao-admin', [App\Http\Controllers\metaallController::class, 'postthongbao'])->name('postthongbao');
    // đổi trạng thái quảng cáo
    Route::post('put-trangthai-quangcao',[App\Http\Controllers\quangcaoController::class, 'puttrangthai'])->name('puttrangthai');
    
    Route::post('tmp-uploads',[App\Http\Controllers\quangcaoController::class, 'tmpupload'])->name('tmpupload');
    // sửa description ajax thông tin phim
    Route::post('post-film-description', [App\Http\Controllers\phimController::class, 'postfilmdescription'])->name('postfilmdescription');
    Route::post('post-film-status', [App\Http\Controllers\phimController::class, 'postfilmstatus'])->name('postfilmstatus');
    Route::post('post-film-images', [App\Http\Controllers\phimController::class, 'postfilmimages'])->name('postfilmimages');
    Route::post('post-film-trailer', [App\Http\Controllers\phimController::class, 'postfilmtrailer'])->name('postfilmtrailer');
    // update analytisc google
    Route::post('put-analytisc-google',[App\Http\Controllers\metaallController::class, 'putanalytisc'])->name('putanalytisc');
    // json
    Route::get('/json-check', [App\Http\Controllers\phimController::class, 'json_index_phim'])->name('jsoncheck');
});


Auth::routes();
Route::post('/return-auto', [App\Http\Controllers\tapphimController::class, 'returnauto'])->name('returnauto');
Route::get('/loc-anime',[App\Http\Controllers\HomeController::class, 'locanime'])->name('locanime');

// web user
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/thong-tin-ca-nhan',[App\Http\Controllers\HomeController::class, 'thongtincanhan'])->name('thongtincanhan');
Route::get('/anime-da-luu',[App\Http\Controllers\HomeController::class, 'animedaluu'])->name('animedaluu');
Route::get('/ajax-anime-luu',[App\Http\Controllers\HomeController::class, 'ajaxanime'])->name('ajaxanime');
Route::get('/the-loai/{slug}', [App\Http\Controllers\HomeController::class, 'theloai'])->name('theloai');
Route::get('/trang-thai/{slug}', [App\Http\Controllers\HomeController::class, 'trangthai'])->name('trangthai');
Route::get('/kieu-anime/{slug}', [App\Http\Controllers\HomeController::class, 'kieuphim'])->name('kieuphim');
Route::get('/anime-hot', [App\Http\Controllers\HomeController::class, 'animehot'])->name('animehot');
Route::get('/anime-xem-nhieu', [App\Http\Controllers\HomeController::class, 'xemnhieu'])->name('xemnhieu');
Route::get('/tim-anime', [App\Http\Controllers\HomeController::class, 'filteranime'])->name('timanime');
Route::get('/tim-kiem-anime', [App\Http\Controllers\HomeController::class, 'timkiemanime'])->name('timkiemanime');
Route::get('/chi-tiet-anime/{slug}', [App\Http\Controllers\HomeController::class, 'chitiet'])->name('chitiet');
Route::get('search',[
    'as'=>'search',
    'uses' => 'HomeController@search'
]);
Route::get('/xem-phim/{slug}', [App\Http\Controllers\HomeController::class, 'xemphim'])->name('xemphim');
Route::post('/bao-loi-tap-phim', [App\Http\Controllers\HomeController::class, 'baoloitapphim'])->name('baoloitapphim');


// sitemap
Route::get('genrate-sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('danhmuc'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

    // get all posts from db
    $categories = danhmuc::all();

    // add every post to the sitemap
    foreach ($categories as $category)
    {
        $sitemap->add(URL::to('the-loai/'.$category->slug), $category->updated_at, '1.0', 'daily');
    }

    $phims = phim::all();
    foreach ($phims as $phim)
    {
        $sitemap->add(URL::to('chi-tiet-anime/'.$phim->slug), $phim->ngaycapnhat, '1.0', 'daily');
    }

    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder

    return redirect(url('sitemap.xml'));
});

